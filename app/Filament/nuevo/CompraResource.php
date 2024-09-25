<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CompraResource\Pages;
use App\Filament\Resources\CompraResource\RelationManagers;
use App\Models\Compra;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Support\Carbon;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Blade;
use Illuminate\View\View;

use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;
use pxlrbt\FilamentExcel\Actions\Tables\ExportAction;
use pxlrbt\FilamentExcel\Exports\ExcelExport;
use Filament\Forms\Components\Tabs;
use Icetalker\FilamentTableRepeater\Forms\Components\TableRepeater;

class CompraResource extends Resource
{
    protected static ?string $model = Compra::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';

    protected static ?string $navigationGroup = 'Administrar inventario';

    //protected static ?string $navigationLabel = 'Usuario';

    protected static ?int $navigationSort = 2;

    protected static bool $shouldRegisterNavigation = false;

    public static function form(Form $form): Form
    {
        $products = Product::get();
        return $form
            ->schema([
                Tabs::make('Tabs')->tabs([
                    Tabs\Tab::make('Detalles de la compra')
                        ->schema([
                            Forms\Components\Select::make('proveedor_id')
                                ->relationship('proveedor', 'nombre')
                                ->createOptionForm([
                                    Forms\Components\TextInput::make('nombre')
                                        ->maxLength(100)
                                        ->default(null),
                                    Forms\Components\TextInput::make('direccion')
                                        ->maxLength(255)
                                        ->default(null),
                                    Forms\Components\TextInput::make('telefono')
                                        ->tel()
                                        ->maxLength(100)
                                        ->default(null),
                                    Forms\Components\TextInput::make('comentario')
                                        ->maxLength(100)
                                        ->default(null),
                                ]),
                            Forms\Components\DatePicker::make('fecha_recepcion'),
                            Forms\Components\Select::make('estado')
                                ->options([
                                    'Entregado' => 'Entregado',
                                    'Pendiente' => 'Pendiente',
                                ])->default('Pendiente'),
                            Forms\Components\Select::make('moneda_id')
                                ->relationship('moneda', 'abreviatura'),
                            /*Forms\Components\TextInput::make('monto')
                    ->numeric()
                    ->default(null),*/
                            Forms\Components\MarkdownEditor::make('descripcion')
                                ->columnSpan('full'),
                        ])->columns(2),
                    Tabs\Tab::make('Items de la compra')
                        ->schema([
                            TableRepeater::make('detallecompra')->label('Producto')
                                ->relationship()
                                ->schema([
                                    Forms\Components\Select::make('products_id')
                                        ->relationship('products', 'name')
                                        ->options(
                                            $products->mapWithKeys(function (Product $product) {
                                                return [$product->id => sprintf('%s ($%s)', $product->name, $product->price)];
                                            })
                                        )
                                        ->disableOptionWhen(function ($value, $state, Get $get) {
                                            return collect($get('../*.products_id'))
                                                ->reject(fn ($id) => $id == $state)
                                                ->filter()
                                                ->contains($value);
                                        })
                                        ->required(),
                                    Forms\Components\TextInput::make('cantidad')
                                        ->integer()
                                        ->default(1)
                                        ->required(),
                                ])
                                ->live()
                                ->afterStateUpdated(function (Get $get, Set $set) {
                                    self::updateTotals($get, $set);
                                })
                                ->deleteAction(
                                    fn (Action $action) => $action->after(fn (Get $get, Set $set) => self::updateTotals($get, $set)),
                                )
                                ->reorderable(false)
                                ->columns(2)
                                ->columnSpanFull(),
                            Forms\Components\TextInput::make('monto')
                                ->numeric()
                                ->readOnly(),
                        ])
                ])->contained(true)->columns(2)->columnSpan('full'),
            ]);
    }

    public static function updateTotals(Get $get, Set $set): void
    {
        $selectedProducts = collect($get('detallecompra'))->filter(fn ($item) => !empty($item['products_id']) && !empty($item['cantidad']));
        $prices = Product::find($selectedProducts->pluck('products_id'))->pluck('price', 'id');

        $subtotal = $selectedProducts->reduce(function ($subtotal, $product) use ($prices) {
            return $subtotal + ($prices[$product['products_id']] * $product['cantidad']);
        }, 0);

        $set('monto', number_format($subtotal, 2, '.', ''));
    }

    public static function table(Table $table): Table
    {
        return $table
            ->headerActions([
                ExportAction::make()
                    ->icon('')
                    ->label('Exportar Excel')
                    ->color('info'),
                Tables\Actions\ButtonAction::make('PDF')
                    ->label('Exportar PDF')
                    ->color('info')
                    ->url(fn () => route('users.report'))
                    ->openUrlInNewTab(),
            ])
            ->columns([
                Tables\Columns\TextColumn::make('fecha_recepcion')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('proveedor.nombre')
                //->numeric()
                ->searchable()
                ->sortable(),
                Tables\Columns\TextColumn::make('estado')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Pendiente' => 'warning',
                        'Entregado' => 'success',
                    })
                    ->icon(fn (string $state): string => match ($state) {
                        'Pendiente' => 'heroicon-m-arrow-path',
                        'Entregado' => 'heroicon-m-check-badge',
                    }),
                Tables\Columns\TextColumn::make('monto')
                    ->numeric()
                    //->sortable()
                    ->summarize([
                        Tables\Columns\Summarizers\Sum::make()
                        //->money(),
                    ]),
                Tables\Columns\TextColumn::make('moneda.abreviatura'),
                //->numeric()
                //->sortable(),
                Tables\Columns\TextColumn::make('descripcion')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')->label('Creado en')
                    ->date()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->date()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                SelectColumn::make('Estado')->label('Entrega')
                    ->options([
                        'Pendiente' => 'No Recibido',
                        'Entregado' => 'Recibido',
                        // 'Cancelado' => 'Cancelado',
                    ])->rules(['required']),
            ])->defaultSort('created_at', 'desc')
            ->filters([
                SelectFilter::make('estado')
                    ->multiple()
                    ->options([
                        'Entregado' => 'Entregado',
                        'Pendiente' => 'Pendiente',
                    ]),

                SelectFilter::make('moneda')
                    ->relationship('moneda', 'abreviatura'),
                Tables\Filters\Filter::make('created_at')
                    ->form([
                        Forms\Components\DatePicker::make('created_from')->label('Creado desde')
                            ->placeholder(fn ($state): string => 'Dec 18, ' . now()->subYear()->format('Y')),
                        Forms\Components\DatePicker::make('created_until')->label('Creado hasta')
                            ->placeholder(fn ($state): string => now()->format('M d, Y')),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['created_from'] ?? null,
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
                            )
                            ->when(
                                $data['created_until'] ?? null,
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date),
                            );
                    })
                    ->indicateUsing(function (array $data): array {
                        $indicators = [];
                        if ($data['created_from'] ?? null) {
                            $indicators['created_from'] = 'Order from ' . Carbon::parse($data['created_from'])->toFormattedDateString();
                        }
                        if ($data['created_until'] ?? null) {
                            $indicators['created_until'] = 'Order until ' . Carbon::parse($data['created_until'])->toFormattedDateString();
                        }

                        return $indicators;
                    }),
            ])
            ->actions([
                Tables\Actions\Action::make('pdf')
                    ->label('PDF')
                    ->color('warning')
                    ->icon('heroicon-o-arrow-down-tray')
                    ->action(function (Compra $record) {
                        return response()->streamDownload(function () use ($record) {
                            echo Pdf::loadHtml(
                                Blade::render('pdf', ['record' => $record])
                            )->stream();
                        }, $record->number . 'reporte_compra.pdf');
                    }),
                Tables\Actions\EditAction::make()->button()->label(''),
                Tables\Actions\DeleteAction::make()->button()->label(''),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCompras::route('/'),
            'create' => Pages\CreateCompra::route('/create'),
            'edit' => Pages\EditCompra::route('/{record}/edit'),
        ];
    }
}

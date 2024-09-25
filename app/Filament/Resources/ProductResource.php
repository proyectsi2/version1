<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-squares-2x2';

    protected static ?string $navigationLabel = 'Productos';

    protected static ?int $navigationSort = 1;

    protected static ?string $navigationGroup = 'Administrar pedido';

    //protected static bool $shouldRegisterNavigation = false;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()->schema([
                Forms\Components\Section::make('Informacion del producto')->schema([
                Forms\Components\Grid::make()->schema([
                Forms\Components\TextInput::make('product_code')->label('Codigo'),
                Forms\Components\TextInput::make('name')->label('Nombre del producto')
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(function (string $state, $operation, $set) {
                                if ($operation !== 'create') {
                                    return;
                                }
                                $set('slug', Str::slug($state));
                            }),
                ])->columns(2),
                Forms\Components\Hidden::make('slug')
                        ->disabled()
                        ->dehydrated()
                        ->unique(Product::class, 'slug', ignoreRecord: true),
                Forms\Components\Textarea::make('details')->label('Detalles'),
                Forms\Components\MarkdownEditor::make('description')->label('Descripcion')
                ]),
                ])->columnSpan(2),
                Forms\Components\Group::make()->schema([
                Forms\Components\Section::make('Asociaciones')->schema([
                        Forms\Components\Select::make('categories')
                                ->required()
                                ->searchable()
                                ->preload()
                                ->relationship('categories', 'name')
                                ->label('Categoria'),
                    ]),
                Forms\Components\Section::make('Precio')->schema([
                Forms\Components\TextInput::make('price')->label('Precio')
                    ->numeric()
                    ->prefix('BOB'),
                ]),
                Forms\Components\Section::make('Cantidad')->schema([
                Forms\Components\TextInput::make('quantity')->label('Cantidad'),
                ]),
                //Forms\Components\TextInput::make('archivo'),
                ])->columnSpan(1),
                Forms\Components\Section::make('Imagen')->schema([
                    Forms\Components\FileUpload::make('main_image')->label('Imagen principal')
                    ->directory('images/products/main_image/')
                                    ->preserveFilenames()
                                    ->image()
                                    ->imageEditor(),
                    Forms\Components\FileUpload::make('alt_images')->label('Imagenes alternativas')
                ])->columns(2)
            ])->columns(3);
            
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('main_image')->label('Imagen'),
                /*Tables\Columns\TextColumn::make('product_code')->label('Codigo')
                    ->searchable(),*/
                Tables\Columns\TextColumn::make('name')->label('Nombre')
                    ->searchable(),
                Tables\Columns\TextColumn::make('categories.name')->label('Categoria')
                    ->sortable(),
                Tables\Columns\TextColumn::make('quantity')->label('Cantidad')
                    ->sortable(),
                /*Tables\Columns\TextColumn::make('slug')
                    ->searchable(),*/
               /* Tables\Columns\TextColumn::make('details')->label('Detalles')
                    ->searchable(),*/
                Tables\Columns\TextColumn::make('price')->label('Precio')
                    ->money('BOB')
                    ->sortable(),
                /*Tables\Columns\TextColumn::make('archivo')
                    ->searchable(),*/
                Tables\Columns\TextColumn::make('created_at')->label('Fecha de creacion')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')->label('Fecha de actualizacion')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()->button()->label(''),
                Tables\Actions\DeleteAction::make()->button()->label(''),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ])->defaultSort('created_at', 'desc');
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    } 
    
    public static function getPluralModelLabel(): string
    {
        return __('Productos');
    }
    
}

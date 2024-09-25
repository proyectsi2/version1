<?php

namespace App\Filament\Resources;

use livewire;
use stdClass;
use Filament\Tables\Contracts\HasTable;
use Closure;
use Filament\Forms;
use Filament\Tables;
use App\Models\Category;
use Illuminate\Support\Str;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\CategoryResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\CategoryResource\RelationManagers;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static ?string $navigationIcon = 'heroicon-o-tag';

    protected static ?string $navigationGroup = 'Administrar pedido';

    protected static ?string $navigationLabel = 'Categorias';

    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')->label('Nombre')
                ->maxLength(255)
                ->live(onBlur: true)
                ->afterStateUpdated(function (string $state, $operation, $set) {
                    if ($operation !== 'create') {
                        return;
                    }
                    $set('slug', Str::slug($state));
                }),
                Forms\Components\Hidden::make('slug')
                ->disabled()
                ->dehydrated()
                ->unique(Category::class, 'slug', ignoreRecord: true),
                Forms\Components\TextInput::make('category_code')->label('Codigo de la categoria')
            ]);
    }

    public static function table(Table $table): Table {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nro')->state(
                    static function (HasTable $livewire, stdClass $rowLoop): string {
                        return (string) (
                            $rowLoop->iteration +
                            ($livewire->getTableRecordsPerPage() * (
                                $livewire->getTablePage() - 1
                            ))
                        );
                    }
                ),
                Tables\Columns\TextColumn::make('name')->label('Nombre')
                ->sortable()->searchable(),
                //Tables\Columns\TextColumn::make('slug'),
                Tables\Columns\TextColumn::make('category_code')->label('Codigo')
                ->sortable(),
                Tables\Columns\TextColumn::make('created_at')->label('Fecha de creacion')
                    ->dateTime('d-M-Y')
                    ->sortable(),
                /*Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime('d-M-Y'),*/
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()->button()->label(''),
                Tables\Actions\DeleteAction::make()->button()->label(''),

            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }
}

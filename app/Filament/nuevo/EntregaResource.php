<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EntregaResource\Pages;
use App\Filament\Resources\EntregaResource\RelationManagers;
use App\Models\Entrega;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EntregaResource extends Resource
{
    protected static ?string $model = Entrega::class;

    protected static ?string $navigationIcon = 'heroicon-o-truck';

    protected static ?string $navigationGroup = 'Administrar envios';

    //protected static ?string $navigationLabel = 'Usuario';

    protected static ?int $navigationSort = 1;

    protected static bool $shouldRegisterNavigation = false;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('id_order')
                    ->numeric()
                    ->default(null),
                Forms\Components\TextInput::make('direccion_entrega')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('estado_entrega'),
                Forms\Components\TextInput::make('numero_seguimiento')
                    ->maxLength(50)
                    ->default(null),
                Forms\Components\TextInput::make('nombre_mensajeria')
                    ->maxLength(100)
                    ->default(null),
                Forms\Components\DatePicker::make('fecha_entrega'),
                Forms\Components\DateTimePicker::make('entregado_en')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id_order')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('direccion_entrega')
                    ->searchable(),
                Tables\Columns\TextColumn::make('estado_entrega'),
                Tables\Columns\TextColumn::make('numero_seguimiento')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nombre_mensajeria')
                    ->searchable(),
                Tables\Columns\TextColumn::make('fecha_entrega')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('entregado_en')
                    ->dateTime()
                    ->sortable(),
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
            'index' => Pages\ListEntregas::route('/'),
            'create' => Pages\CreateEntrega::route('/create'),
            'edit' => Pages\EditEntrega::route('/{record}/edit'),
        ];
    }
}

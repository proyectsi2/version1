<?php

namespace App\Filament\Resources\MonedaResource\Pages;

use App\Filament\Resources\MonedaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMonedas extends ListRecords
{
    protected static string $resource = MonedaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

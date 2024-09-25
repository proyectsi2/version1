<?php

namespace App\Filament\Resources\MonedaResource\Pages;

use App\Filament\Resources\MonedaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMoneda extends EditRecord
{
    protected static string $resource = MonedaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

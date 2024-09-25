<?php

namespace App\Filament\Resources\MetodopagoResource\Pages;

use App\Filament\Resources\MetodopagoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMetodopago extends EditRecord
{
    protected static string $resource = MetodopagoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

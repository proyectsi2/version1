<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProduct extends CreateRecord
{
    protected static string $resource = ProductResource::class;

    public function getTitle(): string
    {
        return "Crear producto";
    }

   protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    } 
    
}

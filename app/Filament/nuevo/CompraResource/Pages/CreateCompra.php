<?php

namespace App\Filament\Resources\CompraResource\Pages;

use App\Filament\Resources\CompraResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

use App\Models\User;
use App\Models\Compra;
use App\Models\Product;
use Filament\Notifications\Actions\Action;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\DB;

class CreateCompra extends CreateRecord
{
    protected static string $resource = CompraResource::class;

    protected function afterCreate(): void
    {
        /** @var Compra $pedido */
        $pedido = $this->record;


    $user = auth()->user();

    Notification::make()
        ->title('Nuevo Compra')
        ->success()
        ->icon('heroicon-o-check-circle')
        ->body($user->name . ' ha realizado un nuevo compra.')
        ->actions([
            Action::make('View')->label('Ver')
                ->button()
                ->markAsRead()
                ->url(CompraResource::getUrl('edit', ['record' => $pedido])),
        ])
        ->sendToDatabase(User::all()); // Enviar la notificación a todos los usuarios
    } 

}

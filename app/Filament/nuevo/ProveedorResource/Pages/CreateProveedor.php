<?php

namespace App\Filament\Resources\ProveedorResource\Pages;

use App\Filament\Resources\ProveedorResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

use App\Models\User;
use App\Models\Proveedor;

use Filament\Notifications\Actions\Action;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\DB;

class CreateProveedor extends CreateRecord
{
    protected static string $resource = ProveedorResource::class;

    protected function afterCreate(): void
    {
        /** @var Compra $pedido */
        $pedido = $this->record;


    $user = auth()->user();

    Notification::make()
        ->title('Nuevo Registro')
        ->success()
        ->icon('heroicon-o-check-circle')
        ->body($user->name . ' ha anadido un nuevo proveedor.')
        ->actions([
            Action::make('View')->label('Ver')
                ->button()
                ->markAsRead()
                ->url(ProveedorResource::getUrl('edit', ['record' => $pedido])),
        ])
        ->sendToDatabase(User::all()); // Enviar la notificación a todos los usuarios
    } 

}

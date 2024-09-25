<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use Filament\Notifications\Actions\Action;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\DB;

class CreateOrder extends CreateRecord
{
    protected static string $resource = OrderResource::class;

    protected function afterCreate(): void
    {
        /** @var Order $pedido */
        $pedido = $this->record;


    $user = auth()->user();

    Notification::make()
        ->title('Nuevo Pedido')
        ->success()
        ->icon('heroicon-o-check-circle')
        ->body($user->name . ' ha solicitado un nuevo pedido.')
        ->actions([
            Action::make('View')->label('Ver')
                ->button()
                ->markAsRead()
                ->url(OrderResource::getUrl('edit', ['record' => $pedido])),
        ])
        ->sendToDatabase(User::all()); // Enviar la notificación a todos los usuarios
    } 
}

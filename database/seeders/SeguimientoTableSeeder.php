<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SeguimientoTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('seguimiento')->delete();
        
        \DB::table('seguimiento')->insert(array (
            0 => 
            array (
                'id' => 1,
                'id_entrega' => 1,
                'estado' => 'En almacén',
                'ubicacion' => 'Ciudad',
                'fecha_hora' => '2024-08-15 22:56:27',
                'notas' => 'Esperando asignación de mensajero',
            ),
            1 => 
            array (
                'id' => 2,
                'id_entrega' => 2,
                'estado' => 'En tránsito',
                'ubicacion' => 'Ciudad',
                'fecha_hora' => '2024-08-15 22:56:27',
                'notas' => 'En camino a la dirección de entrega',
            ),
            2 => 
            array (
                'id' => 3,
                'id_entrega' => 3,
                'estado' => 'Entregado',
                'ubicacion' => 'Ciudad',
                'fecha_hora' => '2024-08-15 22:56:27',
                'notas' => 'Paquete entregado exitosamente',
            ),
            3 => 
            array (
                'id' => 4,
                'id_entrega' => 4,
                'estado' => 'Preparando para envío',
                'ubicacion' => 'Ciudad',
                'fecha_hora' => '2024-08-15 22:56:27',
                'notas' => 'Preparando el paquete para su envío',
            ),
            4 => 
            array (
                'id' => 5,
                'id_entrega' => 5,
                'estado' => 'Pedido cancelado',
                'ubicacion' => 'Ciudad',
                'fecha_hora' => '2024-08-15 22:56:27',
                'notas' => 'Pedido cancelado antes del envío',
            ),
        ));
        
        
    }
}
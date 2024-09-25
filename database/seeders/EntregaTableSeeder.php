<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EntregaTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('entrega')->delete();
        
        \DB::table('entrega')->insert(array (
            0 => 
            array (
                'id' => 1,
                'id_order' => 1,
                'direccion_entrega' => 'Calle Falsa 123, Ciudad',
                //'estado_entrega' => 'pendiente',
                'numero_seguimiento' => 'TRACK12345',
                'nombre_mensajeria' => 'DHL',
                'fecha_entrega' => '2024-08-20',
               // 'entregado_en' => '2024-08-15 22:56:27',
            ),
            1 => 
            array (
                'id' => 2,
                'id_order' => 2,
                'direccion_entrega' => 'Av. Siempre Viva 742, Ciudad',
               // 'estado_entrega' => 'en camino',
                'numero_seguimiento' => 'TRACK67890',
                'nombre_mensajeria' => 'FedEx',
                'fecha_entrega' => '2024-08-22',
               // 'entregado_en' => '2024-08-15 22:56:27',
            ),
            2 => 
            array (
                'id' => 3,
                'id_order' => 3,
                'direccion_entrega' => 'Paseo de la Reforma 200, Ciudad',
                //'estado_entrega' => 'entregado',
                'numero_seguimiento' => 'TRACK54321',
                'nombre_mensajeria' => 'UPS',
                'fecha_entrega' => '2024-08-15',
                //'entregado_en' => '2024-08-15 12:00:00',
            ),
            3 => 
            array (
                'id' => 4,
                'id_order' => 4,
                'direccion_entrega' => 'Calle Principal 55, Ciudad',
                //'estado_entrega' => 'pendiente',
                'numero_seguimiento' => 'TRACK98765',
                'nombre_mensajeria' => 'Estafeta',
                'fecha_entrega' => '2024-08-25',
                //'entregado_en' => '2024-08-15 22:56:27',
            ),
            4 => 
            array (
                'id' => 5,
                'id_order' => 5,
                'direccion_entrega' => 'Av. Libertad 100, Ciudad',
                //'estado_entrega' => '',
                'numero_seguimiento' => 'TRACK11111',
                'nombre_mensajeria' => 'DHL',
                'fecha_entrega' => '2024-08-30',
               // 'entregado_en' => '2024-08-15 22:56:27',
            ),
        ));
        
        
    }
}
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CompraTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('Compra')->delete();
        
        \DB::table('Compra')->insert(array (
            0 => 
            array (
                'id' => 1,
                'proveedor_id' => 1,
                'fecha_recepcion' => '2024-05-01',
                'moneda_id' => 2,
                'monto' => '1195.00',
                'estado' => 'Pendiente',
                'descripcion' => 'detalle compra',
                'created_at' => '2024-04-30 18:58:21',
                'updated_at' => '2024-04-30 18:58:42',
            ),
            1 => 
            array (
                'id' => 2,
                'proveedor_id' => 3,
                'fecha_recepcion' => '2024-05-12',
                'moneda_id' => 2,
                'monto' => '50.00',
                'estado' => 'Pendiente',
                'descripcion' => 'detalle compra',
                'created_at' => '2024-04-30 18:59:38',
                'updated_at' => '2024-04-30 18:59:38',
            ),
            2 => 
            array (
                'id' => 3,
                'proveedor_id' => 2,
                'fecha_recepcion' => '2024-05-12',
                'moneda_id' => 1,
                'monto' => '175.00',
                'estado' => 'Pendiente',
                'descripcion' => NULL,
                'created_at' => '2024-04-30 19:01:25',
                'updated_at' => '2024-04-30 19:01:25',
            ),
            3 => 
            array (
                'id' => 4,
                'proveedor_id' => 4,
                'fecha_recepcion' => '2024-04-30',
                'moneda_id' => 2,
                'monto' => '40.00',
                'estado' => 'Entregado',
                'descripcion' => 'detalle compra',
                'created_at' => '2024-04-30 19:04:46',
                'updated_at' => '2024-04-30 19:07:12',
            ),
            4 => 
            array (
                'id' => 5,
                'proveedor_id' => 2,
                'fecha_recepcion' => '2024-04-19',
                'moneda_id' => 1,
                'monto' => '50.00',
                'estado' => 'Entregado',
                'descripcion' => 'detalle compra',
                'created_at' => '2024-04-30 19:06:03',
                'updated_at' => '2024-04-30 19:06:16',
            ),
        ));
        
        
    }
}
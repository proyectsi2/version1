<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DevolucionTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('devolucion')->delete();
        
        \DB::table('devolucion')->insert(array (
            0 => 
            array (
                'id' => 1,
                'id_order' => 1,
                'motivo' => 'Producto dañado',
                'estado' => 'pendiente',
                'fecha_solicitud' => '2024-08-16',
            ),
            1 => 
            array (
                'id' => 2,
                'id_order' => 2,
                'motivo' => 'Tamaño incorrecto',
                'estado' => 'aprobada',
                'fecha_solicitud' => '2024-08-14',
            ),
            2 => 
            array (
                'id' => 3,
                'id_order' => 3,
                'motivo' => 'No era lo esperado',
                'estado' => 'rechazada',
                'fecha_solicitud' => '2024-08-15',
            ),
            3 => 
            array (
                'id' => 4,
                'id_order' => 4,
                'motivo' => 'Cambio de color',
                'estado' => 'pendiente',
                'fecha_solicitud' => '2024-08-17',
            ),
            4 => 
            array (
                'id' => 5,
                'id_order' => 5,
                'motivo' => 'No se necesita',
                'estado' => 'aprobada',
                'fecha_solicitud' => '2024-08-18',
            ),
        ));
        
        
    }
}
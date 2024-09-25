<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MetodopagoTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('metodopago')->delete();
        
        \DB::table('metodopago')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre' => 'Tarjeta de Crédito',
                'descripcion' => 'Pago con tarjeta de crédito',
            ),
            1 => 
            array (
                'id' => 2,
                'nombre' => 'PayPal',
                'descripcion' => 'Pago a través de PayPal',
            ),
            2 => 
            array (
                'id' => 3,
                'nombre' => 'Transferencia Bancaria',
                'descripcion' => 'Pago mediante transferencia bancaria',
            ),
            3 => 
            array (
                'id' => 4,
                'nombre' => 'Efectivo',
                'descripcion' => 'Pago en efectivo en tienda',
            ),
            4 => 
            array (
                'id' => 5,
                'nombre' => 'Tarjeta de Débito',
                'descripcion' => 'Pago con tarjeta de débito',
            ),
        ));
        
        
    }
}
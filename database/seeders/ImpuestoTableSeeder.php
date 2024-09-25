<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ImpuestoTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('impuesto')->delete();
        
        \DB::table('impuesto')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre' => 'IVA',
                'porcentaje' => '16.00',
            ),
            1 => 
            array (
                'id' => 2,
                'nombre' => 'ISR',
                'porcentaje' => '10.00',
            ),
            2 => 
            array (
                'id' => 3,
                'nombre' => 'IEPS',
                'porcentaje' => '8.00',
            ),
            3 => 
            array (
                'id' => 4,
                'nombre' => 'Tasa Cero',
                'porcentaje' => '0.00',
            ),
            4 => 
            array (
                'id' => 5,
                'nombre' => 'Impuesto Local',
                'porcentaje' => '2.00',
            ),
        ));
        
        
    }
}
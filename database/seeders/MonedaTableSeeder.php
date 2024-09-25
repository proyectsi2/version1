<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MonedaTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('moneda')->delete();
        
        \DB::table('moneda')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre' => 'Dólar Estadounidense',
                'abreviatura' => 'USD',
            ),
            1 => 
            array (
                'id' => 2,
                'nombre' => 'Euro',
                'abreviatura' => 'EUR',
            ),
            2 => 
            array (
                'id' => 3,
                'nombre' => 'Peso Mexicano',
                'abreviatura' => 'MXN',
            ),
            3 => 
            array (
                'id' => 4,
                'nombre' => 'Libra Esterlina',
                'abreviatura' => 'GBP',
            ),
            4 => 
            array (
                'id' => 5,
                'nombre' => 'Yen Japonés',
                'abreviatura' => 'JPY',
            ),
        ));
        
        
    }
}
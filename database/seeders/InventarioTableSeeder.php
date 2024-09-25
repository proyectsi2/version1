<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class InventarioTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('inventario')->delete();
        
        \DB::table('inventario')->insert(array (
            0 => 
            array (
                'id' => 1,
                'id_product' => 1,
                'id_tienda' => 1,
                'cantidad' => 10,
            ),
            1 => 
            array (
                'id' => 2,
                'id_product' => 2,
                'id_tienda' => 2,
                'cantidad' => 15,
            ),
            2 => 
            array (
                'id' => 3,
                'id_product' => 3,
                'id_tienda' => 3,
                'cantidad' => 5,
            ),
            3 => 
            array (
                'id' => 4,
                'id_product' => 4,
                'id_tienda' => 4,
                'cantidad' => 20,
            ),
            4 => 
            array (
                'id' => 5,
                'id_product' => 5,
                'id_tienda' => 5,
                'cantidad' => 8,
            ),
        ));
        
        
    }
}
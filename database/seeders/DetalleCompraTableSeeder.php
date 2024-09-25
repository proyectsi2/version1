<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DetalleCompraTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('DetalleCompra')->delete();
        
        \DB::table('DetalleCompra')->insert(array (
            0 => 
            array (
                'id' => 1,
                'compra_id' => 1,
                'products_id' => 1,
                'cantidad' => 5,
                'created_at' => '2024-04-30 18:58:21',
                'updated_at' => '2024-04-30 18:58:21',
            ),
            1 => 
            array (
                'id' => 2,
                'compra_id' => 1,
                'products_id' => 2,
                'cantidad' => 10,
                'created_at' => '2024-04-30 18:58:21',
                'updated_at' => '2024-04-30 18:58:21',
            ),
            2 => 
            array (
                'id' => 3,
                'compra_id' => 1,
                'products_id' => 3,
                'cantidad' => 18,
                'created_at' => '2024-04-30 18:58:21',
                'updated_at' => '2024-04-30 18:58:21',
            ),
            3 => 
            array (
                'id' => 4,
                'compra_id' => 1,
                'products_id' => 4,
                'cantidad' => 6,
                'created_at' => '2024-04-30 18:58:21',
                'updated_at' => '2024-04-30 18:58:21',
            ),
            4 => 
            array (
                'id' => 5,
                'compra_id' => 1,
                'products_id' => 5,
                'cantidad' => 2,
                'created_at' => '2024-04-30 18:58:21',
                'updated_at' => '2024-04-30 18:58:21',
            ),
            5 => 
            array (
                'id' => 6,
                'compra_id' => 2,
                'products_id' => 1,
                'cantidad' => 1,
                'created_at' => '2024-04-30 18:59:38',
                'updated_at' => '2024-04-30 18:59:38',
            ),
            6 => 
            array (
                'id' => 7,
                'compra_id' => 2,
                'products_id' => 3,
                'cantidad' => 1,
                'created_at' => '2024-04-30 18:59:38',
                'updated_at' => '2024-04-30 18:59:38',
            ),
            7 => 
            array (
                'id' => 8,
                'compra_id' => 3,
                'products_id' => 2,
                'cantidad' => 2,
                'created_at' => '2024-04-30 19:01:25',
                'updated_at' => '2024-04-30 19:01:25',
            ),
            8 => 
            array (
                'id' => 9,
                'compra_id' => 3,
                'products_id' => 3,
                'cantidad' => 3,
                'created_at' => '2024-04-30 19:01:25',
                'updated_at' => '2024-04-30 19:01:25',
            ),
            9 => 
            array (
                'id' => 10,
                'compra_id' => 4,
                'products_id' => 4,
                'cantidad' => 1,
                'created_at' => '2024-04-30 19:04:46',
                'updated_at' => '2024-04-30 19:04:46',
            ),
            10 => 
            array (
                'id' => 11,
                'compra_id' => 4,
                'products_id' => 1,
                'cantidad' => 1,
                'created_at' => '2024-04-30 19:04:46',
                'updated_at' => '2024-04-30 19:04:46',
            ),
            11 => 
            array (
                'id' => 12,
                'compra_id' => 5,
                'products_id' => 2,
                'cantidad' => 1,
                'created_at' => '2024-04-30 19:06:03',
                'updated_at' => '2024-04-30 19:06:03',
            ),
        ));
        
        
    }
}
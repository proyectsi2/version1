<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TiendaTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('tienda')->delete();
        
        \DB::table('tienda')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre' => 'Mueblería Central',
                'direccion' => 'Av. Principal 123, Ciudad',
                'telefono' => '555-4321',
                'correo' => 'central@muebleria.com',
            ),
            1 => 
            array (
                'id' => 2,
                'nombre' => 'Mueblería Norte',
                'direccion' => 'Calle Industrial 200, Ciudad',
                'telefono' => '555-5678',
                'correo' => 'norte@muebleria.com',
            ),
            2 => 
            array (
                'id' => 3,
                'nombre' => 'Mueblería Sur',
                'direccion' => 'Av. del Sur 500, Ciudad',
                'telefono' => '555-8765',
                'correo' => 'sur@muebleria.com',
            ),
            3 => 
            array (
                'id' => 4,
                'nombre' => 'Mueblería Este',
                'direccion' => 'Paseo del Este 100, Ciudad',
                'telefono' => '555-3456',
                'correo' => 'este@muebleria.com',
            ),
            4 => 
            array (
                'id' => 5,
                'nombre' => 'Mueblería Oeste',
                'direccion' => 'Calle Oeste 50, Ciudad',
                'telefono' => '555-7890',
                'correo' => 'oeste@muebleria.com',
            ),
        ));
        
        
    }
}
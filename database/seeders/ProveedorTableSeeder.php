<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProveedorTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('proveedor')->delete();
        
        \DB::table('proveedor')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre' => 'Muebles del Norte',
                'contacto' => 'Pedro Sánchez',
                'telefono' => '555-3210',
                'correo' => 'pedro.sanchez@mueblesnorte.com',
                'direccion' => 'Calle Industrial 25, Ciudad',
            ),
            1 => 
            array (
                'id' => 2,
                'nombre' => 'Fábrica de Muebles Sur',
                'contacto' => 'Sofía Ramírez',
                'telefono' => '555-6543',
                'correo' => 'sofia.ramirez@mueblessur.com',
                'direccion' => 'Av. Manufactura 350, Ciudad',
            ),
            2 => 
            array (
                'id' => 3,
                'nombre' => 'Muebles y Decoración SA',
                'contacto' => 'Miguel Herrera',
                'telefono' => '555-0987',
                'correo' => 'miguel.herrera@mueblesdecoracion.com',
                'direccion' => 'Av. Decoradores 12, Ciudad',
            ),
            3 => 
            array (
                'id' => 4,
                'nombre' => 'Muebles Modernos',
                'contacto' => 'Lucía Fernández',
                'telefono' => '555-2345',
                'correo' => 'lucia.fernandez@mueblesmodernos.com',
                'direccion' => 'Calle Vanguardista 67, Ciudad',
            ),
            4 => 
            array (
                'id' => 5,
                'nombre' => 'Estilo y Confort',
                'contacto' => 'José García',
                'telefono' => '555-6789',
                'correo' => 'jose.garcia@estiloyconfort.com',
                'direccion' => 'Paseo Elegante 50, Ciudad',
            ),
        ));
        
        
    }
}
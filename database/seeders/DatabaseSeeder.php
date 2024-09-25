<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        $this->call([
            ProveedorTableSeeder::class,
            MonedaTableSeeder::class,
            MetodopagoTableSeeder::class,
            ImpuestoTableSeeder::class,
            TiendaTableSeeder::class,
            InventarioTableSeeder::class,
            CouponSeeder::class,
            CategorySeeder::class,
            ProductSeeder::class,
            EntregaTableSeeder::class,
            SeguimientoTableSeeder::class,
            DevolucionTableSeeder::class,
            CompraTableSeeder::class,
            DetalleCompraTableSeeder::class,
        ]);
        \App\Models\User::factory(10)->hasBillingDetails()->create();
    }
}

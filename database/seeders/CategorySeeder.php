<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        Category::insert([
            ['name' => 'Oficina', 'slug' => 'oficina', 'category_code' => 'O', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Dormitorio', 'slug' => 'dormitorio', 'category_code' => 'D', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Comedor', 'slug' => 'comedor', 'category_code' => 'C', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Living y sofas', 'slug' => 'Living y sofas', 'category_code' => 'LS', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}

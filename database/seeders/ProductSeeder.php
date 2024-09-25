<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        // OFICINA
        for ($i=1; $i <= 6; $i++) {
            $category = Category::find(1);
            Product::create([
                'name' => 'P_oficina '.$i,
                'slug' => 'p_oficina-'.$i,
                'details' => 'oficina\'s hoodie',
                'description' =>'Lorem '. $i . ' ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
                'main_image' => 'images/products/main_image/oficina-'.$i.'.png',
                'product_code' => $category->category_code.'-00'.$i,
                'price' => rand(999, 9999),
                'quantity' => rand(1,10),
            ])->categories()->attach($category);
        }

        $product = Product::find(1);
        $product->update([
            'alt_images' => [
                'images/products/alt_images/womens-1.png',
                'images/products/alt_images/homegoods-1.png',
                'images/products/alt_images/womens-2.png',
                'images/products/alt_images/homegoods-2.png',
                'images/products/alt_images/womens-3.png',
                'images/products/alt_images/homegoods-3.png',
                'images/products/alt_images/womens-4.png',
                'images/products/alt_images/homegoods-4.png',
            ]
        ]);
        $product->categories()->attach(4);

        // DORMITORIO
        for ($i=1; $i <= 6; $i++) {
            $category = Category::find(2);
            Product::create([
                'name' => 'P_dormitorio '.$i,
                'slug' => 'p_dormitorio-'.$i,
                'details' => 'dormitorio\'s hoodie',
                'description' =>'Lorem '. $i . ' ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
                'main_image' => 'images/products/main_image/dormitorio-'.$i.'.png',
                'product_code' => $category->category_code.'-00'.$i,
                'price' => rand(999, 9999),
                'quantity' => rand(1,10),
            ])->categories()->attach($category);
        }

        // COMEDOR
        for ($i=1; $i <= 6; $i++) {
            $category = Category::find(3);
            Product::create([
                'name' => 'P_comedor '.$i,
                'slug' => 'p_comedor-'.$i,
                'details' => 'comedor\'s hoodie',
                'description' =>'Lorem '. $i . ' ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
                'main_image' => 'images/products/main_image/comedor-'.$i.'.png',
                'product_code' => $category->category_code.'-00'.$i,
                'price' => rand(999, 9999),
                'quantity' => rand(1,10),
            ])->categories()->attach($category);
        }

        // LIVING Y SOFAS
        for ($i=1; $i <= 6; $i++) {
            $category = Category::find(4);
            Product::create([
                'name' => 'P_sofa '.$i,
                'slug' => 'p_sofa-'.$i,
                'details' => 'sofa\'s hoodie',
                'description' =>'Lorem '. $i . ' ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
                'main_image' => 'images/products/main_image/living-'.$i.'.png',
                'product_code' => $category->category_code.'-00'.$i,
                'price' => rand(999, 9999),
                'quantity' => rand(1,10),
            ])->categories()->attach($category);
        }
    }
}

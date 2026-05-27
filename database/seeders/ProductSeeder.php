<?php

namespace Database\Seeders;

use App\Models\Products;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            ['category_id' => 1, 'product_name' => 'A', 'price' => '1000', 'stock' => '65', 'unit' => 'pcs',],
            ['category_id' => 2, 'product_name' => 'B', 'price' => '2000', 'stock' => '100', 'unit' => 'liter',],
            ['category_id' => 3, 'product_name' => 'C', 'price' => '3000', 'stock' => '75', 'unit' => 'kg',],
            ['category_id' => 4, 'product_name' => 'D', 'price' => '4000', 'stock' => '55', 'unit' => 'box',],
            ['category_id' => 3, 'product_name' => 'E', 'price' => '5000', 'stock' => '80', 'unit' => 'pcs',],
            ['category_id' => 3, 'product_name' => 'F', 'price' => '6000', 'stock' => '95', 'unit' => 'lusin',],
            ['category_id' => 2, 'product_name' => 'G', 'price' => '7000', 'stock' => '60', 'unit' => 'liter',],
            ['category_id' => 2, 'product_name' => 'H', 'price' => '8000', 'stock' => '120', 'unit' => 'liter',],
            ['category_id' => 1, 'product_name' => 'J', 'price' => '9000', 'stock' => '70', 'unit' => 'pcs',],
            ['category_id' => 3, 'product_name' => 'K', 'price' => '10000', 'stock' => '85', 'unit' => 'kg',],
        ];

        foreach($products as $p) {
            Products::create([
                'category_id' => $p['category_id'],
                'product_name' => $p['product_name'],
                'price' => $p['price'],
                'stock' => $p['stock'],
                'unit' => $p['unit'],
            ]);
        }
    }
}

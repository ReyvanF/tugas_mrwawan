<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categories;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['category_name' => 'Makanan', 'description' => 'Bisa Dimakan'],
            ['category_name' => 'Minuman', 'description' => 'Bisa Diminum'],
            ['category_name' => 'Elektronik', 'description' => 'Bisa Nyetrum'],
            ['category_name' => 'Non-Elektronik', 'description' => 'Gak Bisa Nyetrum'],
        ];

        foreach ($categories as $c) {
            Categories::create([
                'category_name' => $c['category_name'],
                'description' => $c['description']
            ]);
        }
    }
}

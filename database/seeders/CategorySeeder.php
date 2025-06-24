<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Makanan Berat',
            'Minuman',
            'Camilan',
            'Paket Hemat',
        ];

        foreach ($categories as $category) {
            Category::create(['name' => $category]);
        }
    }
}

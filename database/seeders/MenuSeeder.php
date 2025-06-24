<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;
use App\Models\Category;

class MenuSeeder extends Seeder
{
    public function run(): void
    {
        $menus = [
            [
                'name' => 'Nasi Goreng Spesial',
                'description' => 'Nasi goreng dengan ayam, telur, dan kerupuk',
                'price' => 20000,
                'category' => 'Makanan Berat',
                'stock' => 50,
                'image' => 'https://cdn1-production-images-kly.akamaized.net/LDRjBxjUH3gyrzEAUFrCi_XisTs=/0x148:1920x1230/800x450/filters:quality(75):strip_icc():format(webp)/kly-media-production/medias/3093328/original/069244600_1585909700-fried-2509089_1920.jpg'
            ],
            [
                'name' => 'Es Teh Manis',
                'description' => 'Teh manis dingin segar',
                'price' => 5000,
                'category' => 'Minuman',
                'stock' => 100,
                'image' => 'https://static.republika.co.id/uploads/member/images/news/240607073248-607.jpg'
            ],
            [
                'name' => 'Kentang Goreng',
                'description' => 'Kentang goreng renyah dan gurih',
                'price' => 10000,
                'category' => 'Camilan',
                'stock' => 40,
                'image' => 'https://cdn0-production-images-kly.akamaized.net/j5gE9hDy1k0Kk7m-MGAbmVG9dJ8=/1200x675/smart/filters:quality(75):strip_icc():format(jpeg)/kly-media-production/medias/970871/original/021248500_1440846143-header_chiantilvpa_com.jpg'
            ],
            [
                'name' => 'Paket Nasi Ayam + Es Teh',
                'description' => 'Nasi ayam goreng + es teh manis',
                'price' => 25000,
                'category' => 'Paket Hemat',
                'stock' => 30,
                'image' => 'https://assets.promediateknologi.id/crop/0x0:0x0/0x0/webp/photo/p3/105/2024/10/31/resep-ayam-goreng-lengkuas-1073487863.jpg'
            ],
        ];

        foreach ($menus as $menu) {
            $category = Category::where('name', $menu['category'])->first();
            Menu::create([
                'name' => $menu['name'],
                'description' => $menu['description'],
                'price' => $menu['price'],
                'stock' => $menu['stock'],
                'category_id' => $category->id,
                'image' => $menu['image'],
                'is_available' => true,
            ]);
        }
    }
}

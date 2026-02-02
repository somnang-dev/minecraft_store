<?php

namespace Database\Seeders;

use App\Models\ProductImage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductImage::factory(4)->create([
            'product_id' => 1,
            'image_path' => 'https://picsum.photos/640/480?random=' . rand(1,9999),
        ]);
    }
}

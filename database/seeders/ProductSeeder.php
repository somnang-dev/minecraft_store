<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::factory(10)->create([
            'name' => fake()->name(),
            'server_id' => 1,
            'short_description' => 'description',
            'category_id' => 1,
            'icon_path' => 1,   
            'long_description' => fake()->sentence(),
            'price' => 10.20,
        
        ]);

        Product::factory(4)->create([
            'name' => fake()->name(),
            'server_id' => 1,
            'short_description' => 'rank',
            'category_id' => 3,
            'icon_path' => 'none',
            'long_description' => fake()->sentence(),
            'price' => 10.20,
        ]);
    }
}

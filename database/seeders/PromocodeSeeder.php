<?php

namespace Database\Seeders;

use App\Models\Promocode;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PromocodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Promocode::factory(1)->create([
            'code' => fake()->name(),
            'max_use' => 10,
            'discount_price' => 10.00,
            'expired_date' => '2026-02-20'
         ]);
    }
}

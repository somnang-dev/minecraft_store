<?php

namespace Database\Seeders;

use App\Models\Request;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use function Symfony\Component\Clock\now;

class RequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Request::factory(10)->create([
            'user_name' => fake()->name(),
            'product_id' => 1,
            'product_name' => fake()->name(),
            'price' => 10.00,
            'proof' => 'none',
            'request_date' => now()
        ]);
    }
}

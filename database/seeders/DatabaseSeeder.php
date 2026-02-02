<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Server;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([ProductSeeder::class, ServerSeeder::class, ProductImageSeeder::class, RequestSeeder::class]);
        // User::factory(10)->create();

        // Server::factory()->create([
        //     'name' => 'Test User',
        //     'description' => fake()->sentence(),
        // ]);
    }
}

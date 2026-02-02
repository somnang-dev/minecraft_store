<?php

namespace Database\Seeders;

use App\Models\ServerList;
use Illuminate\Database\Seeder;

class ServerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ServerList::factory(4)->create([
            'name' => fake()->name(),
            'server_ip' => 'Helloworld',
            'image_url' => ' ',
            'description' => fake()->sentence(),
            'server_port' => 123123,
            'version' => '1.20.4',
        ]);
    }
}

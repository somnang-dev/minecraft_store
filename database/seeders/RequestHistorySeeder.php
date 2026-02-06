<?php

namespace Database\Seeders;

use App\Models\RequestHistory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RequestHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RequestHistory::factory(2)->create([
            'name' => fake()->name(),
            'item' => 'Epic Rank',
            'amount' => 10,
            'price' => 10,
            'is_approved' => false,
            'staff' => 1,
        ]);
    }
}

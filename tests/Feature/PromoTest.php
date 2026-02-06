<?php

use App\Models\Promocode;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Symfony\Component\Console\Tester\TesterTrait;

uses(RefreshDatabase::class);
// test('test promocode comparision', function () {
//     $promo = Promocode::factory()->create([
//         'code' => "UU",
//         'discount_price' => 10,
//         'max_use' => 1,
//         'expired_date' => now()

//     ]);
//     $response = $this->postJson('/promo/check', [
//         'code' => "UU"
//     ]);

//     $response->assertStatus(200)
//     ->assertJson([
//         'message' => 'code founded'
//     ]);
// });

test('test promo expire date', function() {
    $promo = Promocode::factory()->create([
        'code' => "UM4",
        'discount_price' => 10,
        'max_use' => 1,
        'expired_date' => now()
    ]);

    $response = $this->postJson('promo/check', [
        'code' => 'UM4'
    ]);
    $response->assertStatus(404)
        ->assertJson([
            'message' => 'code expired'
        ]);

});

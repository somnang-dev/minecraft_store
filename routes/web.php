<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PromocodeController;
use App\Http\Controllers\ServerController;
use App\Models\Server;
use App\Models\ServerList;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', function () {
    $servers = ServerList::all();
    return view('homepage', ['ip' => env('MC_IP'), 'servers' => $servers]);
});


Route::get('server/product/{id}', [ServerController::class, 'showProductDetail'])->name('item.detail');
Route::get('server/{id}', [ServerController::class, 'show'])->name('server.main');


// Checking Promocode
Route::post('/promo', [PromocodeController::class, 'compare'])->name('promo.apply');

Route::get('/dashboard', [DashboardController::class, 'main']);

<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PromocodeController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\ServerController;
use App\Models\ServerList;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $servers = ServerList::all();
    return view('homepage', ['ip' => env('MC_IP'), 'servers' => $servers]);
});


Route::get('server/product/{id}', [ProductController::class, 'showProductDetail'])->name('item.detail');
Route::get('server/{id}', [ServerController::class, 'show'])->name('server.main');


// Checking Promocode
Route::post('/promo/apply', [PromocodeController::class, 'apply'])->name('promo.apply');
Route::post('/promo/check', [PromocodeController::class, 'compare'])->name('promo.check');

// Main dashboard view
Route::get('/dashboard', [DashboardController::class, 'main'])->middleware('auth');


// For Accept and Reject purchase request
Route::post('/request/process', [RequestController::class, 'processPurchaseRequest'])->name('request.process');


// User Account
// Login page view
Route::get('/login', [AuthController::class, 'loginView'])->name('login');
// login request
Route::post('/login', [AuthController::class, 'login'])->name('login.request');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::post('checkout', [ProductController::class, 'checkout'])->name('product.checkout');

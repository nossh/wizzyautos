<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('contact', function () {
    return view('pages/contact');
})->name('contact');

// Route::get('shop', function () {
//     return view('pages/shop');
// })->name('shop');

Route::get('shop', [ShopController::class, 'index'])->name('shop');
Route::get('product-detail/{product}', [ShopController::class, 'show'])->name('product-detail');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

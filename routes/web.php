<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [App\Http\Controllers\RestaurantController::class, 'index'])
    ->name('root');

Route::resource('restaurants', App\Http\Controllers\RestaurantController::class)
    ->only(['index']);

Route::resource('restaurants', App\Http\Controllers\RestaurantController::class)
    ->middleware(['auth'])
    ->only(['show', 'create', 'store']);

// Route::resource('restaurants', App\Http\Controllers\RestaurantController::class)
//     ->except(['create', 'store', 'edit', 'update', 'destroy']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

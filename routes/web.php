<?php

use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ReviewController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('welcome');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

// reservations
Route::get('/reservations', [ReservationController::class, 'index'])->name('reservations.index');

Route::middleware(['auth'])->group(function () {
    Route::get('/reservations/create/{table}', [ReservationController::class, 'create'])
        ->name('reservations.create');
    Route::post('/reservations/{table}', [ReservationController::class, 'store'])
        ->name('reservations.store');
    Route::get('/reservations/{reservation}/edit', [ReservationController::class, 'edit'])
        ->name('reservations.edit');
    Route::put('/reservations/{reservation}', [ReservationController::class, 'update'])
        ->name('reservations.update');
    Route::delete('/reservations/{reservation}', [ReservationController::class, 'destroy'])
        ->name('reservations.destroy');
});

// reviews
Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews.index');

Route::middleware(['auth'])->group(function () {
    Route::resource('/reviews', ReviewController::class)
        ->except(['index', 'show']);
});

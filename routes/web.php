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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/reservations', [\App\Http\Controllers\ReservationController::class, 'index'])->name('reservations.index');
Route::middleware(['auth'])->group(function (){
    Route::get('/reservations/create/{table}', [\App\Http\Controllers\ReservationController::class, 'create'])->name('reservations.create');
    Route::post('/reservations/{table}', [\App\Http\Controllers\ReservationController::class, 'store'])->name('reservations.store');
});

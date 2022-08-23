<?php

use App\Http\Controllers\GrafikController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PoolController;
use App\Http\Middleware\Inactive;
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
    return redirect('/login');
});

Route::middleware('inactive')->group(function () {
    Route::get('/inactive', [MainController::class, 'inactive']);
});

Route::middleware(['auth', 'active'])->group(function () {
    // Dashboard
    Route::get('/home', [MainController::class, 'index'])->name('home');

    // Pool URL
    Route::prefix('/kolam')->group(function () {
        Route::get('/', [PoolController::class, 'index'])->name('kolam');
        Route::get('/create', [PoolController::class, 'create']);
        Route::post('/store', [PoolController::class, 'store'])->name('kolam.store');
        Route::get('/edit/{id}', [PoolController::class, 'edit'])->name('kolam.edit');
        Route::post('/edit/{id}', [PoolController::class, 'update'])->name('kolam.update');
        Route::post('/{id}', [PoolController::class, 'destroy'])->name('kolam.destroy');
    });

    // Data Sensor
    Route::get('/datasensor-grafik', [GrafikController::class, 'grafik']);
    Route::get('/datasensor-table', [GrafikController::class, 'table']);
});

Auth::routes();

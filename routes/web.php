<?php

use App\Http\Controllers\GrafikController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PoolController;
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

Route::middleware('auth')->group(function () {
    Route::get('/home', [MainController::class, 'index'])->name('home');

    Route::prefix('/kolam')->group(function () {
        Route::get('/', [PoolController::class, 'index'])->name('kolam');
        Route::get('/create', [PoolController::class, 'create']);
        Route::post('/store', [PoolController::class, 'store'])->name('kolam.store');
        Route::get('/edit/{id}', [PoolController::class, 'edit'])->name('kolam.edit');
        Route::post('/edit/{id}', [PoolController::class, 'update'])->name('kolam.update');
        Route::post('/{id}', [PoolController::class, 'destroy'])->name('kolam.destroy');
    });

    Route::get('/datasensor-grafik', [GrafikController::class, 'grafik']);
    Route::get('/datasensor-table', [GrafikController::class, 'table']);

    Route::get('/phgrafik', function () {
        return view('grafikph');
    });

    Route::get('/grafikph/{id}', [GrafikController::class, 'grafikph']);
    Route::get('/grafikox/{id}', [GrafikController::class, 'grafikOx']);
    Route::get('/grafikhum/{id}', [GrafikController::class, 'grafikHum']);
    Route::get('/grafiktemp/{id}', [GrafikController::class, 'grafikTemp']);
    Route::get('/grafiktds/{id}', [GrafikController::class, 'grafikTDS']);
    Route::get('/grafikturbidity/{id}', [GrafikController::class, 'grafikTurbidity']);
});

Auth::routes();

<?php

use App\Http\Controllers\GrafikController;
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
    Route::get('/home', function () {
        return view('main');
    });
    Route::get('/datasensor-grafik', [GrafikController::class, 'grafik']);
    Route::get('/datasensor-table', function () {
        return view('datatable');
    }); 
    Route::get('/kolam', function () {
        return view('kolam');
    });
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

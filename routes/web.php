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
    return redirect('/login');
});

Route::middleware('auth')->group(function () {
    Route::get('/home', function () {
        return view('main');
    });
    Route::get('/datasensor-table', function () {
        return view('datatable');
    });
    Route::get('/datasensor-grafik', function () {
        return view('datagrafik');
    });
    Route::get('/kolam', function () {
        return view('kolam');
    });
});

Auth::routes();

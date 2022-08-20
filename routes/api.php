<?php

use App\Http\Controllers\Api\PoolController;
use App\Http\Controllers\Api\PoolDataController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('pooldata', [PoolDataController::class, 'index']);
Route::post('pooldata/store', [PoolDataController::class, 'store']);
Route::get('pool', [PoolController::class, 'index']);
Route::post('pool/store', [PoolController::class, 'store']);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

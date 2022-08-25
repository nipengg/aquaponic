<?php

use App\Http\Controllers\Api\PoolController;
use App\Http\Controllers\Api\PoolDataController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::prefix('/pooldata')->group(function () {
    Route::get('/', [PoolDataController::class, 'index']);
    Route::get('/test', [PoolDataController::class, 'test']);
    Route::post('/store', [PoolDataController::class, 'store']);
});

Route::prefix('/pool')->group(function () {
    Route::get('/', [PoolController::class, 'index']);
    Route::post('/store', [PoolController::class, 'store']);
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

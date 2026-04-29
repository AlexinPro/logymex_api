<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;    
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\OrdenServicioController;
use App\Http\Controllers\Api\UnidadController;
use App\Http\Controllers\Api\ResiduoController;
use App\Http\Controllers\Api\ClienteController;

Route::prefix('v1')->group(function () {

    Route::post('/login', [AuthController::class, 'login']);

    Route::middleware('auth:sanctum')->group(function () {

        Route::get('/user', fn(Request $request) => $request->user());

        Route::apiResource('ordenes', OrdenServicioController::class);
        Route::apiResource('unidades', UnidadController::class);
        Route::apiResource('residuos', ResiduoController::class);
        Route::apiResource('clientes', ClienteController::class);
    });
});
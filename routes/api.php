<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MonedaController;
use App\Http\Controllers\CriptoController;

// Rutas Auth
Route::post('auth/register', [AuthController::class, 'register']);
Route::post('auth/login',    [AuthController::class, 'login']);

// Rutas Moneda
Route::apiResource('monedas', MonedaController::class);

// Rutas Cripto
Route::apiResource('criptomonedas', CriptoController::class);

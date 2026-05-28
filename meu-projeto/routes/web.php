<?php

use App\Http\Controllers\CalculadoraController;
use Illuminate\Support\Facades\Route;

// Opção mais limpa usando o 'use' lá em cima
Route::get('/', [CalculadoraController::class, 'index']);
Route::post('/calcular', [CalculadoraController::class, 'calcular']);
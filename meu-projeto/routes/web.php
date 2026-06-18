<?php

use App\Http\Controllers\CalculadoraController;
use Illuminate\Support\Facades\Route;

// Opção mais limpa usando o 'use' lá em cima
Route::get('/Calculadora-continua', [CalculadoraController::class, 'indexContinua']);
Route::post(['calculadoraContinua']);
Route::post(['limparContinua']);
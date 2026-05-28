<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VeiculoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\AluguelController;

Route::get('/', function () {
    return redirect('/veiculos');
});

Route::resource('veiculos', VeiculoController::class);
Route::resource('clientes', ClienteController::class);
Route::resource('alugueis', AluguelController::class);
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\CarroController;
use App\Http\Controllers\AluguelController;

Route::get('/', function () {
    return redirect('/usuarios');
});

Route::resource('usuarios', UsuarioController::class);
Route::resource('carros', CarroController::class);
Route::resource('aluguels', AluguelController::class);
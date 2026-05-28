<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\CarroController;
use App\Http\Controllers\AluguelController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect()->route('usuarios.index');
});

/*
|--------------------------------------------------------------------------
| USUÁRIOS
|--------------------------------------------------------------------------
*/

Route::resource('usuarios', UsuarioController::class);

/*
|--------------------------------------------------------------------------
| CARROS
|--------------------------------------------------------------------------
*/

Route::resource('carros', CarroController::class);

/*
|--------------------------------------------------------------------------
| ALUGUÉIS
|--------------------------------------------------------------------------
*/

Route::resource('aluguels', AluguelController::class);

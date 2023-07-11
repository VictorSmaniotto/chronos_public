<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoriaController;
use App\Http\Controllers\Api\ProjetoController;
use App\Http\Controllers\Api\UsuarioController;



Route::middleware('auth:sanctum')->group(function () {
    Route::get('/logout', [AuthController::class, 'logout']);

    Route::get('/projetos/{id}', [ProjetoController::class, 'mostrarProjeto']);
    Route::get('/categorias', [CategoriaController::class, 'listarCategorias']);
    Route::get('/usuario', [UsuarioController::class, 'usuario']);
});

Route::get('/projetos', [ProjetoController::class, 'listarProjetos']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/cadastrar', [UsuarioController::class, 'cadastrar']);

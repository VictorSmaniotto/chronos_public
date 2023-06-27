<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoriaController;
use App\Http\Controllers\Api\ProjetoController;
use App\Http\Controllers\Api\UsuarioController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/logout', [AuthController::class, 'logout']);

    Route::get('/projetos', [ProjetoController::class, 'listarProjetos']);
    Route::get('/projetos/{id}', [ProjetoController::class, 'mostrarProjeto']);
    Route::get('/categorias', [CategoriaController::class, 'listarCategorias']);
    Route::get('/usuario', [UsuarioController::class, 'usuario']);
});

Route::post('/login', [AuthController::class, 'login']);
Route::post('/registrar', [UsuarioController::class, 'registrar']);

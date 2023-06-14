<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\UsuarioController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/login', [LoginController::class, 'login'])->name('auth.login');
Route::get('/cadastrar', [LoginController::class, 'registrar'])->name('auth.registro');

Route::get('/admin/usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');
Route::get('/admin/usuarios/cadastrar', [UsuarioController::class, 'create'])->name('usuarios.create');
Route::get('/admin/usuarios/editar/{id}', [UsuarioController::class, 'edit'])->name('usuarios.edit');

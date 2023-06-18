<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\UsuarioController;
use App\Http\Controllers\Admin\CategoriaController;
use App\Http\Controllers\Admin\ProjetoController;

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

Route::get('/admin/usuarios', [UsuarioController::class, 'index'])->name('admin.usuarios.index');
Route::get('/admin/usuarios/cadastrar', [UsuarioController::class, 'create'])->name('admin.usuarios.create');
Route::get('/admin/usuarios/editar/{id}', [UsuarioController::class, 'edit'])->name('admin.usuarios.edit');

Route::get('/admin/categorias', [CategoriaController::class, 'index'])->name('admin.categorias.index');
Route::get('/admin/categorias/cadastrar', [CategoriaController::class, 'create'])->name('admin.categorias.create');
Route::post('/admin/categorias/armazenar', [CategoriaController::class, 'store'])->name('admin.categorias.store');
Route::get('/admin/categorias/editar/{id}', [CategoriaController::class, 'edit'])->name('admin.categorias.edit');
Route::put('/admin/categorias/atualizar/{id}', [CategoriaController::class, 'update'])->name('admin.categorias.update');
Route::delete('/admin/categorias/deletar/{id}', [CategoriaController::class, 'destroy'])->name('admin.categorias.destroy');

Route::get('/admin/projetos', [ProjetoController::class, 'index'])->name('admin.projetos.index');
Route::get('/admin/projetos/cadastrar', [ProjetoController::class, 'create'])->name('admin.projetos.create');
Route::post('/admin/projetos/armazenar', [ProjetoController::class, 'store'])->name('admin.projetos.store');
Route::get('/admin/projetos/editar/{id}', [ProjetoController::class, 'edit'])->name('admin.projetos.edit');

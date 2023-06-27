<?php

namespace App\Http\Controllers\Api;

use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriaController extends Controller
{
    public function listarCategorias()
    {
        $categorias = Categoria::all(['id', 'nome']);

        $dadosCategorias = $categorias->map(function ($categoria) {
            return $categoria;
        });

        return response()->json($dadosCategorias);
    }
}

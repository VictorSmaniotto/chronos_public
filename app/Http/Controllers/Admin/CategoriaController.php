<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = Categoria::paginate(15);
        return view('admin.categorias.index', [
            'categorias' => $categorias
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::all();
        return view('admin.categorias.cadastrar', [
            'categorias' => $categorias
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required'
        ]);

        try {
            $categoria = new Categoria();
            $categoria->nome = $request->nome;
            $categoria->save();

            return redirect()->route('admin.categorias.index')->with('sucesso', 'Categoria cadastrada com sucesso!');
        } catch (\Throwable $e) {
            return redirect()->back()->withErrors('erro', 'Ocorreu um erro ao cadastrar, por favor tente novamente');
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categoria $categoria)
    {
        return view('admin.categorias.editar');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categoria $categoria)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categoria $categoria)
    {
        //
    }
}

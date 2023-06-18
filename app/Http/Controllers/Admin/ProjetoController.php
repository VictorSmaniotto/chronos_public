<?php

namespace App\Http\Controllers\Admin;

use App\Models\Projeto;

use App\Models\Categoria;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProjetoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projetos = Projeto::all();
        $categorias = Categoria::all();
        return view('admin.projetos.index', [
            'projetos' => $projetos,
            'categorias' => $categorias
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $projeto = new Projeto();
        $categoria = Categoria::all();
        return view('admin.projetos.cadastrar', [
            'categoria' => $categoria,
            'projeto' => $projeto
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'descricao' => 'required',
            'situacao' => 'required',
            'capa' => 'required',
            'categoria_id' => 'required'
        ]);

        $projeto = new Projeto();
        $projeto->titulo = $request->titulo;
        $projeto->descricao = $request->descricao;
        $projeto->situacao = $request->situacao;
        $projeto->categoria_id = $request->categoria_id;

        if ($request->hasFile('capa')) {
            $capa = $request->file('capa');
            $capaNome = Str::random(40);
            $capaPath = $capa->storeAs('public/projetos/', $capaNome);
            $projeto->capa = Storage::url($capaPath);
        }

        $projeto->save();

        return redirect()->route('admin.projetos.index')->with('sucesso', 'Projeto cadastrado com sucesso! 😃');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Projeto $projeto)
    {
        $categorias = Categoria::all();
        return view('admin.projetos.editar', [
            'categorias' => $categorias
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Projeto $projeto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Projeto $projeto)
    {
        //
    }
}

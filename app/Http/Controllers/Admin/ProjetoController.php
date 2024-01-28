<?php

namespace App\Http\Controllers\Admin;

use App\Models\Projeto;

use App\Models\Categoria;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProjetoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        if(Auth::user()->perfil == 'administrador'){
            $projetos = Projeto::all();
            
        } else{
            $projetos = Auth::user()->projetos;
        }

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
            'projeto' => $projeto,
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
        $projeto->user_id = Auth::id();

        if ($request->hasFile('capa')) {
            $capa = $request->file('capa');
            $capaNome = $capa->hashName();
            $capaPath = $capa->storeAs('public/projetos', $capaNome);
            $projeto->capa = Storage::url($capaPath);
        }

        $projeto->save();

        return redirect()->route('admin.projetos.index')->with('sucesso', 'Uau ' . Auth::user()->nome . '! Seu projeto cadastrado com sucesso! 😃');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function show($id)
    {
        return view('admin.projetos.visualizar', [
            'projeto' => Projeto::findOrFail($id)
        ]);
    }



    public function edit($id)
    {
        $projeto = Projeto::findOrFail($id);
        $categoria = Categoria::all();
        return view('admin.projetos.editar', [
            'categoria' => $categoria,
            'projeto' => $projeto
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required',
            'descricao' => 'required',
            'situacao' => 'required',
            'categoria_id' => 'required'
        ]);

        $projeto = Projeto::findOrFail($id);
        $projeto->titulo = $request->titulo;
        $projeto->descricao = $request->descricao;
        $projeto->situacao = $request->situacao;
        $projeto->categoria_id = $request->categoria_id;
        
        if($projeto->user_id != Auth::id() && Auth::user()->perfil !== 'administrador'){
            return redirect()->route('admin.projetos.index')->with('erro', 'Você não tem permissão para alterar este projeto');
        }

        if ($request->hasFile('capa')) {
            Storage::delete('public/projetos/' . basename($projeto->capa));
            $capa = $request->file('capa');
            $capaNome = Str::random(40);
            $capaPath = $capa->storeAs('public/projetos', $capaNome);
            $projeto->capa = Storage::url($capaPath);
        }

        $projeto->save();

        return redirect()->route('admin.projetos.index')->with('sucesso', 'Projeto alterado com sucesso! 😃');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $projeto = Projeto::findOrFail($id);

        if($projeto->user_id != Auth::id()){
            abort(403, 'Você não tem permissão para deletar este projeto.');
        }

        if ($projeto->delete()) {
            Storage::delete('public/projetos/' . basename($projeto->capa));
            return redirect()->route('admin.projetos.index')->with('sucesso', 'Projeto deletado com sucesso!');
        } else {
            return redirect()->route('admin.projetos.index')->with('erro', 'Houve um erro ao deletar o Projeto!');
        }
    }
}

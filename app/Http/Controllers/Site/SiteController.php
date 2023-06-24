<?php

namespace App\Http\Controllers\Site;

use App\Models\Projeto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Categoria;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class SiteController extends Controller
{
    public function index()
    {
        $usuario = Auth::user();
        return view('site.index', [
            'projetos' => Projeto::all(),
            'usuario' => $usuario
        ]);
    }


    public function show($id)
    {
        $projeto = Projeto::findOrFail($id);
        $categoria = Categoria::all();
        return view('site.visualizar', [
            'projeto' => $projeto,
            'data' => Carbon::parse($projeto->updated_at),
            'categoria' => $categoria
        ]);
    }
}

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

        return view('site.index', [
            'projetos' => Projeto::all(),

        ]);
    }


    public function show($id)
    {
        $projeto = Projeto::findOrFail($id);
        $categoria = Categoria::all();

        return view('site.visualizar', [
            'projeto' => $projeto,
            'data' => Carbon::parse($projeto->updated_at),
            'categoria' => $categoria,

        ]);
    }

    public function mobileIndex()
    {
        return view('site.mobile.index', [
            'projetos' => Projeto::all(),

        ]);
    }

    public function mobileShow($id)
    {
        $projeto = Projeto::findOrFail($id);
        $categoria = Categoria::all();

        return view('site.mobile.visualizar', [
            'projeto' => $projeto,
            'data' => Carbon::parse($projeto->updated_at),
            'categoria' => $categoria,

        ]);
    }

    public function politica()
    {
        return view('site.politica_de_privacidade');
    }

    public function termos()
    {
        return view('site.termos_de_uso');
    }

    public function sobrenos()
    {
        return view('site.sobrenos');
    }
}

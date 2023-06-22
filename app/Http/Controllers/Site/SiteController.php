<?php

namespace App\Http\Controllers\Site;

use App\Models\Projeto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiteController extends Controller
{
    public function index()
    {
        return view('site.index', [
            'projetos' => Projeto::all()
        ]);
    }


    public function show($id)
    {
        return view('site.visualizar', [
            'projeto' => Projeto::findOrFail($id)
        ]);
    }
}

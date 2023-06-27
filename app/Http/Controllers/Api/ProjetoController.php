<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProjetoResource;
use App\Models\Projeto;
use Illuminate\Http\Request;

class ProjetoController extends Controller
{
    public function listarProjetos(Request $request)
    {
        $query = Projeto::query();

        $query->when($request->has('busca'), function ($query) use ($request) {

            // $busca = $request->busca; $request->input('busca');
            $busca = $request->input('busca');
            return $query->where('titulo', 'like', "%$busca%");
        });

        $query->when($request->has('categoria_id'), function ($query) use ($request) {

            $categoria_id = $request->input('categoria_id');
            return $query->where('categoria_id', $categoria_id);
        });

        $projetos = $query->get();
        // $projetos = Projeto::with('categoria')->get();

        return ProjetoResource::collection($projetos);
    }

    public function mostrarProjeto($id)
    {
        $projeto = Projeto::find($id);

        if ($projeto) {
            return new ProjetoResource($projeto);
        } else {
            return response()->json([
                "mensagem" => "Projeto não encontrado",
            ], 404);
        }
    }
}

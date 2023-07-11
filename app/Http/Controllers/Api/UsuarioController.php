<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UsuarioController extends Controller
{
    public function usuario(Request $request)
    {
        $usuario = $request->user();

        $dadosUsuario = [
            'nome' => $usuario->nome,
            'email' => $usuario->email,
            'foto' => url($usuario->foto)
        ];

        return response()->json($dadosUsuario);
    }

    public function cadastrar(Request $request)
    {

        // Validação dos dados de entrada
        $validator = Validator::make($request->all(), [
            'nome' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);

        // Verifica se houve falha na validação
        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            return response()->json(['errors' => $errors], 422);
        }

        // Salvando o usuário e tratando possíveis exceções
        try {
            $usuario = new User();
            $usuario->nome = $request->nome;
            $usuario->email = $request->email;
            $usuario->password = bcrypt($request->password);

            if ($request->hasFile('foto')) {
                $usuarioPath = $request->file('foto')->store('public/usuarios');
                $usuario->foto = Storage::url($usuarioPath);
            }

            $usuario->save();

            return response()->json($usuario);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Ocorreu um erro ao cadastrar o Usuario.'], 500);
        }
    }
}

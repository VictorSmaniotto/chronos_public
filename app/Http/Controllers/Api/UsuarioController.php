<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

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

    public function registrar(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'email' => 'required',
            'password' => 'required',

        ]);


        $usuario = new User();
        $usuario->nome = $request->nome;
        $usuario->email = $request->email;
        $usuario->password = bcrypt($request->password);


        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $fotoNome = $foto->hashName();
            $fotoPath = $foto->storeAs('public/usuarios', $fotoNome);
            $usuario->foto = Storage::url($fotoPath);
        }


        $usuario->save();

        return response()->json([
            'mensagem' => 'Usuário cadastrado com sucesso',
            'Dados' => $usuario
        ]);
    }
}

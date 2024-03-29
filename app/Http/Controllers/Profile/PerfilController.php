<?php

namespace App\Http\Controllers\Profile;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PerfilController extends Controller
{

    public function perfil()
    {
        $usuario = Auth::user();
        return view('auth.perfil.editar', [
            'usuario' => $usuario
        ]);
    }

    public function updatePerfil(Request $request)
    {
        // $usuario = Auth::user();

        $request->validate([
            'nome' => 'required',
            'password' => 'nullable|min:8',
        ]);



        $usuario = User::findOrFail(Auth::user()->id);
        
        $usuario->nome = $request->nome;

        if (Auth::user()->perfil == 'administrador') {
            $request->validate([
                'email' => 'required|email|unique:users,email,' . $usuario->id,
                'perfil' => 'required',
            ]);

            $usuario->email = $request->email;
            $usuario->perfil = $request->perfil;
        }

        

        if (!empty($request->password)) {
            $usuario->password = bcrypt($request->password);
        }

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $fotoNome = $foto->hashName();
            $fotoPath = $foto->storeAs('public/usuarios', $fotoNome);
            $usuario->foto = Storage::url($fotoPath);
        }


        $usuario->save();

        return redirect()->route('site.index')->with('sucesso', 'Usuário editado com sucesso! 😃');
    }
}

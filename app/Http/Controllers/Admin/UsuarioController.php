<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;


class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.usuarios.index', [
            'usuarios' => User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.usuarios.cadastrar', [
            'usuario' => new User()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'nome' => 'required',
            'email' => 'required',
            'password' => 'required',
            'perfil' => 'required',
            'foto' => 'required'
        ]);

        // Verifica se a pasta existe
        if (!Storage::exists('public/usuarios/')) {
            // Cria a pasta com permissões adequadas
            Storage::makeDirectory('public/usuarios/');
        }

        $fotoPath = '';
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $fotoNome = $foto->hashName();
            $fotoPath = $foto->storeAs('public/usuarios/', $fotoNome);
        }

        $usuario = new User();
        $usuario->nome = $request->nome;
        $usuario->email = $request->email;
        $usuario->password = $request->password;
        $usuario->perfil = $request->perfil;
        $usuario->foto = Storage::url($fotoPath);


        $usuario->save();

        return redirect()->route('admin.usuarios.index')->with('sucesso', 'Usuário cadastrado com sucesso! 😃');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('admin.usuarios.editar', [
            'usuario' => User::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

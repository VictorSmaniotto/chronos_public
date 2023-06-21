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
            'foto' => 'required',
            'perfil' => 'required',
        ]);


        $usuario = new User();
        $usuario->nome = $request->nome;
        $usuario->email = $request->email;
        $usuario->password = bcrypt($request->password);
        $usuario->perfil = $request->perfil;

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $fotoNome = $foto->hashName();
            $fotoPath = $foto->storeAs('public/usuarios/', $fotoNome);
            $usuario->foto = Storage::url($fotoPath);
        }


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
    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required',
            'email' => 'required|email|unique:users,id,{$id}',
            'password' => 'nullable|min:8',
            'perfil' => 'required',
        ]);



        $usuario = User::findOrFail($id);
        $usuario->nome = $request->nome;
        $usuario->email = $request->email;
        $usuario->perfil = $request->perfil;

        if (!empty($request->password)) {
            $usuario->password = bcrypt($request->password);
        }

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $fotoNome = $foto->hashName();
            $fotoPath = $foto->storeAs('public/usuarios/', $fotoNome);
            $usuario->foto = Storage::url($fotoPath);
        }


        $usuario->save();

        return redirect()->route('admin.usuarios.index')->with('sucesso', 'Usuário editado com sucesso! 😃');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $usuario = User::findOrFail($id);

        if ($usuario->delete()) {
            Storage::delete('public/usuarios/' . basename($usuario->foto));
            return redirect()->route('admin.usuarios.index')->with('sucesso', 'Usuário deletado com sucesso!');
        } else {
            return redirect()->route('admin.usuarios.index')->with('erro', 'Houve um erro ao deletar o Usuário!');
        }
    }
}

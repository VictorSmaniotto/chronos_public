<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function autenticar(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->intended('/admin');
        }

        return back()->withErrors(['email' => 'E-mail ou Senha inválido!']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function registrar()
    {
        return view('auth.registro', [
            'usuario' => new User()
        ]); //teste

    }

    public function armazenar(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'email' => 'required',
            'password' => 'required|confirmed|min:8',
        ]);


        $usuario = new User();
        $usuario->nome = $request->nome;
        $usuario->email = $request->email;
        $usuario->password = bcrypt($request->password);




        $usuario->save();

        return redirect()->route('login')->with('sucesso', 'Usuário cadastrado com sucesso! 😃');
    }
}

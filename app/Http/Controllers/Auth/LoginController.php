<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
        return view('auth.registro'); //teste
    }
}

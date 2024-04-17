<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserLogin extends Controller
{
    public function login()
    {
        return view('login');
    }


    public function auth(Request $request)
    {
        // Validação dos dados
        $this->validate(
            $request,
            [
                'email' => ['required', 'email'],
                'password' => ['required'],
            ],
            [
                'email.required' => 'Campo E-mail é obrigatório',
                'password.required' => 'Campo Senha é obrigatório',

            ]
        );

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('produtos-index');
        } else {
            return redirect()->back()->with('danger', 'E-mail ou senha inválida');
        }
    }

    public function logout(Request $request)
    {
        $request->session()->flush(); // Limpa toda a sessão
        $request->session()->forget(''); // Remove a chave específica 'user' da sessão
        return redirect('/');
    }
}

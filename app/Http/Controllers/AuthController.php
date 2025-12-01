<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Login simples (sem banco de usuários)
        // Usuário: admin@admin.com / Senha: admin123
        if ($request->email === 'admin@admin.com' && $request->password === 'admin123') {
            session([
                'user_logged' => true,
                'user_email' => $request->email,
                'user_name' => 'Administrador'
            ]);

            return redirect()->route('dashboard')
                ->with('success', 'Login realizado com sucesso!');
        }

        return back()->withErrors([
            'email' => 'Credenciais inválidas.',
        ])->withInput();
    }

    public function logout()
    {
        session()->flush();
        return redirect()->route('login')
            ->with('success', 'Logout realizado com sucesso!');
    }
}
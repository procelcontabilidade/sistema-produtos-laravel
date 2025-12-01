<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckSession
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!session('user_logged')) {
            return redirect()->route('login')
                ->withErrors(['message' => 'Você precisa estar logado para acessar esta página.']);
        }

        return $next($request);
    }
}
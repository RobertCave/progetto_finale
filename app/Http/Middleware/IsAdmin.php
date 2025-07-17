<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Verifica se l'utente è autenticato
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Devi effettuare il login per accedere a questa pagina.');
        }

        // Verifica se l'utente è admin
        if (!Auth::user()->is_admin) {
            return redirect()->route('homepage')->with('error', 'Non hai i permessi per accedere alla dashboard.');
        }

        return $next($request);
    }
}

<?php


namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class admin
{
    public function handle(Request $request, Closure $next)
    {
        // Vérifiez si l'utilisateur est connecté et s'il est un admin
        if (Auth::check() && Auth::user()->is_admin) {
            return $next($request);
        }

        // Redirigez vers une autre page si l'utilisateur n'est pas admin
        return redirect('/')->with('error', 'Accès refusé.');
    }
}


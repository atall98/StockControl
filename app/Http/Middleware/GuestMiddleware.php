<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class GuestMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Vérifie si l'utilisateur est connecté
        if (Auth::check()) {
            // Redirige vers le tableau de bord si l'utilisateur est authentifié
            return redirect('/dashboard');
        }

        // Continue vers la requête suivante si l'utilisateur n'est pas authentifié
        return $next($request);
    }
}


<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    // Affiche le formulaire de connexion
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Gère la requête de connexion
    public function login(Request $request)
    {
        // Valide les informations entrées par l'utilisateur
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Tente de connecter l'utilisateur avec les informations fournies
        if (Auth::guard('users')->attempt($request->only('email', 'password'), $request->filled('remember'))) {
            return redirect()->intended('/dashboard');
        }
        
        if (Auth::guard('utilisateurs')->attempt($request->only('email', 'password'), $request->filled('remember'))) {
            return redirect()->intended('/users/dashboard');
        }
        

        // En cas d'échec, renvoie une erreur
        throw ValidationException::withMessages([
            'email' => [trans('auth.failed')],
        ]);
    }

    // Déconnecte l'utilisateur
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/'); // Redirige vers la page d'accueil après déconnexion
    }
}

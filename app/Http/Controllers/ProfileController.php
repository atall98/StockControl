<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;


class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */

     public function index()
     {
         // Si tu veux afficher des informations d'utilisateur
        //  $user = auth()->user(); // Récupère l'utilisateur authentifié
         
         // Retourne la vue avec les données de l'utilisateur
         return view('profile.index');
     }


    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request)
{
    /** @var User $user */
    $user = Auth::user();

    // Validation des champs
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
    ]);

    // Mise à jour du nom et de l'email
    $user->name = $request->input('name');
    $user->email = $request->input('email');

    // Enregistrement des modifications
    $user->save();

    return redirect()->route('profile.index')->with('success', 'Profil mis à jour avec succès.');
}



    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}

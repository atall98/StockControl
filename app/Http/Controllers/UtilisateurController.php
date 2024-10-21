<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UtilisateurController extends Controller
{
    public function index()
    {
        $utilisateurs = Utilisateur::with('roles')->get();
        return view('utilisateurs.index', compact('utilisateurs'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('utilisateurs.create', compact('roles'));
    }

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:utilisateurs,email',
        'roles' => 'nullable|array',
        'is_admin' => 'boolean', // Validation pour is_admin
    ], [
        'email.unique' => 'Adresse email existe déjà.',
    ]);

    $utilisateur = new Utilisateur();
    $utilisateur->name = $request->name;
    $utilisateur->email = $request->email;
    $utilisateur->password = Hash::make('password'); // Utiliser 'password' comme mot de passe par défaut
    $utilisateur->is_admin = $request->is_admin ?? false; // Définit is_admin, par défaut false
    $utilisateur->save();

    if ($request->roles) {
        $utilisateur->roles()->attach($request->roles);
    }

    return redirect()->route('utilisateurs.index')->with('success', 'Utilisateur créé avec succès.');
}

    public function edit($id)
    {
        $utilisateur = Utilisateur::with('roles')->findOrFail($id);
        $roles = Role::all();
        return view('utilisateurs.edit', compact('utilisateur', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:utilisateurs,email,' . $id,
            'roles' => 'required|array',
            'is_admin' => 'boolean', // Validation pour is_admin
        ]);

        $utilisateur = Utilisateur::findOrFail($id);
        $utilisateur->name = $request->name;
        $utilisateur->email = $request->email;
        $utilisateur->is_admin = $request->is_admin ?? false; // Définit is_admin, par défaut false
        $utilisateur->save();

        $utilisateur->roles()->sync($request->roles);

        return redirect()->route('utilisateurs.index')->with('success', 'Utilisateur mis à jour avec succès.');
    }

    public function destroy($id)
    {
        $utilisateur = Utilisateur::findOrFail($id);
        $utilisateur->delete();

        return redirect()->route('utilisateurs.index')->with('success', 'Utilisateur supprimé avec succès.');
    }
}

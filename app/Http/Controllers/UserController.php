<?php

namespace App\Http\Controllers;

use App\Models\user;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{
    public function index()
    {
        $users = user::with('roles')->get();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('users.create', compact('roles'));
    }

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email',
        'roles' => 'nullable|array',
        'is_admin' => 'boolean', // Validation pour is_admin
    ], [
        'email.unique' => 'Adresse email existe déjà.',
    ]);

    $user = new user();
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = Hash::make('password'); // Utiliser 'password' comme mot de passe par défaut
    $user->is_admin = $request->is_admin ?? false; // Définit is_admin, par défaut false
    $user->save();

    if ($request->roles) {
        $user->roles()->attach($request->roles);
    }

    return redirect()->route('users.index')->with('success', 'user créé avec succès.');
}

    public function edit($id)
    {
        $user = user::with('roles')->findOrFail($id);
        $roles = Role::all();
        return view('users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'roles' => 'required|array',
            'is_admin' => 'boolean', // Validation pour is_admin
        ]);

        $user = user::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->is_admin = $request->is_admin ?? false; // Définit is_admin, par défaut false
        $user->save();

        $user->roles()->sync($request->roles);

        return redirect()->route('users.index')->with('success', 'user mis à jour avec succès.');
    }

    public function destroy($id)
    {
        $user = user::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'user supprimé avec succès.');
    }
}

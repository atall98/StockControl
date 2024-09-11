<?php

namespace App\Http\Controllers;

use App\Models\fournisseur;
use Illuminate\Http\Request;

class fournisseurController extends Controller
{
    // Afficher la liste des fournisseurs
    public function index()
    {
        $fournisseurs = fournisseur::all();
        return view('fournisseurs.index', compact('fournisseurs'));
    }

    // Afficher le formulaire de création d'un fournisseur
    public function create()
    {
        return view('fournisseurs.create');
    }

    // Enregistrer un nouveau fournisseur
    public function store(Request $request)
    {
        $request->validate([
            'nom_fournisseur' => 'required|string|max:255',
            'matricule_fournisseur' => 'required|string|max:255',
            'societe' => 'required|string|max:255',
            'telephone' => 'nullable|string|max:255',
            'email' => 'required|email|unique:fournisseurs,email',
            'adresse' => 'nullable|string|max:255',
        ]);

        fournisseur::create($request->all());

        return redirect()->route('fournisseurs.index')->with('success', 'fournisseur créé avec succès.');
    }

    // Afficher un fournisseur spécifique
    public function show(fournisseur $fournisseur)
    {
        return view('fournisseurs.show', compact('fournisseur'));
    }

    // Afficher le formulaire d'édition d'un fournisseur
    public function edit(fournisseur $fournisseur)
    {
        return view('fournisseurs.edit', compact('fournisseur'));
    }

    // Mettre à jour les informations d'un fournisseur
    public function update(Request $request, fournisseur $fournisseur)
    {
        $request->validate([
            'nom_fournisseur' => 'required|string|max:255',
            'matricule_fournisseur' => 'required|string|max:255',
            'societe' => 'required|string|max:255',
            'telephone' => 'nullable|string|max:255',
            'email' => 'required|email|unique:fournisseurs,email,' . $fournisseur->id,
            'adresse' => 'nullable|string|max:255',
        ]);

        $fournisseur->update($request->all());

        return redirect()->route('fournisseurs.index')->with('success', 'fournisseur mis à jour avec succès.');
    }

    // Supprimer un fournisseur
    public function destroy(fournisseur $fournisseur)
    {
        $fournisseur->delete();
        return redirect()->route('fournisseurs.index')->with('success', 'fournisseur supprimé avec succès.');
    }
}

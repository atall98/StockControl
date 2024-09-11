<?php

namespace App\Http\Controllers;

use App\Models\Produits;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    // Affiche la liste des produits
    public function index()
{
    $produits = Produits::all();
    return view('welcome', ['produits' => $produits]);
}


    // Affiche le formulaire de création de produit
    public function create()
    {
        return view('produits.create');
    }

    // Enregistre un nouveau produit
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'reference' => 'required|integer',
            'libelle' => 'nullable|string',
            'description' => 'nullable|string',
            'prix' => 'required|numeric',
            'quantite' => 'required|integer',
            'quantite_alerte' => 'required|integer',
        ]);

        Produits::create($validatedData);

        return redirect()->route('produits.index')->with('success', 'Produit ajouté avec succès.');
    }

    // Affiche le formulaire de modification d'un produit
    public function edit($id)
    {
        $produit = Produits::findOrFail($id);
        return view('produits.edit', compact('produits'));
    }

    // Met à jour un produit existant
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'reference' => 'required|integer',
            'libelle' => 'nullable|string',
            'description' => 'nullable|string',
            'prix' => 'required|numeric',
            'quantite' => 'required|integer',
            'quantite_alerte' => 'required|integer',
        ]);

        $produit = Produits::findOrFail($id);
        $produit->update($validatedData);

        return redirect()->route('produits.index')->with('success', 'Produit mis à jour avec succès.');
    }

    // Supprime un produit
    public function destroy($id)
    {
        $produit = Produits::findOrFail($id);
        $produit->delete();

        return redirect()->route('produits.index')->with('success', 'Produit supprimé avec succès.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\fournisseurs;
use Illuminate\Http\Request;

class fournisseurController extends Controller
{
    // Afficher la liste des fournisseurs
    public function index()
    {
        $fournisseurs = fournisseurs::all();
        return view('fournisseurs.index', ['fournisseurs' => $fournisseurs]);
        
    }

    // Afficher le formulaire de création d'un fournisseurs
    public function create()
    {
        return view('fournisseurs.create');
    }

    // Enregistrer un nouveau fournisseurs
    public function store(Request $request)
    {
        $request->validate([
            'nom_fournisseurs' => 'required|string|max:255',
            'matricule_fournisseurs' => 'required|string|max:255',
            'societe' => 'required|string|max:255',
            'telephone' => 'nullable|string|max:255',
            'email' => 'required|email|unique:fournisseurs,email',
            'adresse' => 'nullable|string|max:255',
        ]);

        fournisseurs::create($request->all());

        return redirect()->route('fournisseurs.index')->with('success', 'fournisseurs créé avec succès.');
    }

    
    

     // Afficher le formulaire d'édition d'un fournisseurst
     public function edit($id)
     {
         $fournisseurs = Fournisseurs::findOrFail($id);
         return view('fournisseurs.edit', compact('fournisseurs'));
     }
 
     // Mettre à jour les informations d'un fournisseurst
     public function update(Request $request, $id)
     {
         $validatedData = $request->validate([
             'nom_fournisseurs' => 'required|string|max:255',
             'matricule_fournisseurs' => 'required|string|max:255',
             'societe' => 'required|string|max:255',
             'telephone' => 'nullable|string|max:255',
             'email' => 'required|email|unique:fournisseurs,email,' . $id,
             'adresse' => 'nullable|string|max:255',
         ]);
 
         $fournisseurs = Fournisseurs::findOrFail($id);
         $fournisseurs->update($validatedData);
 
         return redirect()->route('fournisseurs.index')->with('success', 'fournisseur mis à jour avec succès.');
     }
 

    // Supprimer un fournisseurs
    

    public function destroy($id)
    {
        $fournisseurs = fournisseurs::findOrFail($id);
        $fournisseurs->delete();

        return redirect()->route('fournisseurs.index')->with('success', 'fournisseur supprimé avec succès.');
    }
        // Afficher un fournisseurs spécifique
    // public function show($id)
    // {
    // $fournisseurs = fournisseurs::findOrFail($id);
    // return view('fournisseurs.show', compact('fournisseurs'));
    // }

    public function show($id)
{
    $fournisseur = fournisseurs::findOrFail($id);
    return response()->json([
        'reference' => $fournisseur->reference,
        'telephone' => $fournisseur->telephone,
        'adresse' => $fournisseur->adresse,
        'email' => $fournisseur->email,
    ]);
}
}

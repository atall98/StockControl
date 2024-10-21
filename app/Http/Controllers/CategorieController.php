<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    // Affiche la liste des categories
    public function index()
{
    $categories = categories::all();
    return view('categories.index', ['categories' => $categories]);
}


    // Affiche le formulaire de création de categorie
    public function create()
    {
        return view('categories.create');
    }

    // Enregistre un nouveau categorie
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string'
            
        ]);

        categories::create($validatedData);

        return redirect()->route('categories.index')->with('success', 'categorie ajouté avec succès.');
    }

    // Affiche le formulaire de modification d'un categorie
    public function edit($id)
    {
    $categories = categories::findOrFail($id);
    return view('categories.edit', compact('categories'));
    }

    // Met à jour un categorie existant
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            
        ]);

        $categories = categories::findOrFail($id);
        $categories->update($validatedData);

        return redirect()->route('categories.index')->with('success', 'categorie mis à jour avec succès.');
    }

    // Supprime un categorie
    public function destroy($id)
    {
        $categories = categories::findOrFail($id);
        $categories->delete();

        return redirect()->route('categories.index')->with('success', 'categorie supprimé avec succès.');
    }

    public function show($id)
{
    $categories = categories::find($id);

    if (!$categories) {
        return redirect()->route('categories.index')->with('error', 'categorie non trouvé.');
    }

    return view('categories.show', compact('categories'));
}

}

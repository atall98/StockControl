<?php

namespace App\Http\Controllers;

use App\Models\Produits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class ProduitController extends Controller
{
    /**
     * Affiche la liste des produits.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produits = Produits::all();
        return view('produits.index', ['produits' => $produits]);
    }

    /**
     * Recherche un produit par référence ou libellé.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    

public function search($query)
{
    // $query = strtolower(trim($query->get('query')));
    Log::info('Recherche pour le produit:', ['query' => $query]);
    
    // Vérifier si la requête arrive correctement
    if (empty($query)) {
        return response()->json(['message' => 'Requête vide'], 400);
    }

    // Requête pour trouver le produit par référence ou libellé
    $produit = Produits::whereRaw('reference = ?', [$query])
    ->orWhereRaw('libelle LIKE ?', ["%$query%"])
    ->first();

    

    // Vérifier si un produit a été trouvé
    if ($produit) {
        Log::info('Produit trouvé:', ['produit' => $produit]);

        return response()->json([
            'reference' => $produit->reference,
            'libelle' => $produit->libelle,
            'description' => $produit->description,
            'prix_achat' => $produit->prix_achat,
            'prix_vente' => $produit->prix_vente,
        ]);
    }

    // Log si le produit n'est pas trouvé
    Log::info('Produit non trouvé pour la requête:', ['query' => $query]);
    return response()->json(['message' => 'Produit non trouvé'], 404);
}




    /**
     * Montre le formulaire pour créer un nouveau produit.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('produits.create');
    }

    /**
     * Enregistre un nouveau produit.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'reference' => 'required|integer',
            'libelle' => 'nullable|string',
            'description' => 'nullable|string',
            'prix_achat' => 'required|numeric',
            'prix_vente' => 'required|numeric',
            'quantite' => 'required|integer',
            'quantite_alerte' => 'required|integer',
        ]);

        Produits::create($validatedData);

        return redirect()->route('produits.index')->with('success', 'Produit ajouté avec succès.');
    }

    /**
     * Affiche le formulaire de modification d'un produit.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produit = Produits::findOrFail($id);
        return view('produits.edit', compact('produit'));
    }

    /**
     * Met à jour un produit existant.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'reference' => 'required|integer',
            'libelle' => 'nullable|string',
            'description' => 'nullable|string',
            'prix_achat' => 'required|numeric',
            'prix_vente' => 'required|numeric',
            'quantite' => 'required|integer',
            'quantite_alerte' => 'required|integer',
        ]);

        $produit = Produits::findOrFail($id);
        $produit->update($validatedData);

        return redirect()->route('produits.index')->with('success', 'Produit mis à jour avec succès.');
    }

    /**
     * Supprime un produit.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produit = Produits::findOrFail($id);
        $produit->delete();

        return redirect()->route('produits.index')->with('success', 'Produit supprimé avec succès.');
    }

    /**
     * Affiche un produit spécifique.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produit = Produits::find($id);

        if (!$produit) {
            return redirect()->route('produits.index')->with('error', 'Produit non trouvé.');
        }

        return view('produits.show', compact('produit'));
    }
}

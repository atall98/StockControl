<?php

namespace App\Http\Controllers;

use App\Models\Vente;
use App\Models\VenteProduit;
use App\Models\clients;
use App\Models\Produit;
use App\Models\Produits;
use Illuminate\Http\Request;

class VenteController extends Controller
{
    /**
     * Affiche une liste des ventes.
     */
    public function index()
{
    $ventes = vente::with('produits')->get();
    return view('ventes.index', compact('ventes'));
}


public function create()
{
    $clients = clients::all(); // Récupérer tous les clients pour le formulaire
    return view('ventes.create', compact('clients'));
}

public function store(Request $request)
{
    $request->validate([
        'client_id' => 'required|exists:clients,id',
        'produits.*.quantite' => 'required|integer|min:1',
    ]);

    // Créer la vente
    $vente = new vente();
    $vente->client_id = $request->client_id;
    $vente->date_facture = $request->date_facture;
    $vente->reference_facture = $request->reference_facture;
    $vente->total = 0; // Nous allons calculer le total plus tard
    $vente->save();

    $total = 0; // Initialiser le total ici

    // Ajouter les produits à la vente
    foreach ($request->produits as $produitInput) {
        if (!isset($produitInput['reference'])) {
            return redirect()->back()->withErrors('La référence du produit est manquante.');
        }

        $produit = Produits::where('reference', $produitInput['reference'])->first();

        if ($produit) {
            $quantite = $produitInput['quantite'];
            $prixUnitaire = $produit->prix_vente;

            // Vérifiez si la quantité demandée dépasse la quantité en stock
            if ($quantite > $produit->quantite) {
                return redirect()->back()->withErrors("Stock insuffisant pour le produit: {$produit->libelle}. Quantité disponible: {$produit->quantite}.");
            }

            $prixTotalProduit = $quantite * $prixUnitaire; // Calculer le prix total pour ce produit

            // Ajouter le produit à la vente
            $vente->produits()->attach($produit->id, [
                'quantite' => $quantite,
                'prix_unitaire' => $prixUnitaire,
                'prix_total' => $prixTotalProduit,
            ]);

            // Ajouter le prix total du produit au total de la vente
            $total += $prixTotalProduit;

            // Mettre à jour la quantité du produit
            $produit->quantite -= $quantite; // Soustraire la quantité achetée
            $produit->save(); // Sauvegarder la mise à jour dans la base de données
        } else {
            return redirect()->back()->withErrors("Produit non trouvé pour la référence: {$produitInput['reference']}.");
        }
    }

    // Mettre à jour le total de la vente
    $vente->total = $total; // Ici, le total est correctement mis à jour
    $vente->save();

    return redirect()->route('ventes.index')->with('success', 'Vente créée avec succès.');
}


// Méthode pour rechercher un produit en fonction de la référence
public function searchProduit($reference)
{
    $produit = Produits::where('reference', $reference)->first();

    if ($produit) {
        return response()->json([
            'id' => $produit->id,
            'libelle' => $produit->libelle,
            'prix_vente' => $produit->prix_vente,
        ]);
    } else {
        return response()->json(['message' => 'Produit non trouvé'], 404);
    }
}


    /**
     * Affiche les détails d'un vente spécifique.
     */
    public function show($id)
    {
        // Récupérer un vente avec ses produits
        $vente = Vente::with('produits')->find($id);

        if (!$vente) {
            return response()->json([
                'message' => 'vente non trouvé'
            ], 404);
        }

        return response()->json($vente);
    }

    /**
     * Met à jour un vente existant dans la base de données.
     */
    public function update(Request $request, $id)
    {
        // Validation des données
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'produits' => 'required|array',
            'produits.*.produits_id' => 'required|exists:produits,id',
            'produits.*.quantite' => 'required|integer|min:1',
            'produits.*.prix_unitaire' => 'required|numeric|min:0',
        ]);

        try {
            // Trouver l'vente
            $vente = Vente::findOrFail($id);

            // Mise à jour de l'vente
            $vente->update([
                'client_id' => $request->client_id,
                'date_facture' => $request->date_facture,
                'reference_facture' => $request->reference_facture,
                // Vous pouvez mettre à jour d'autres champs si nécessaire
            ]);

            // Réinitialiser les produits dans la table pivot
            $vente->produits()->detach();

            // Tableau pour stocker les données des produits
            $produitsData = [];
            $total = 0;

            // Ajout des nouveaux produits
            foreach ($request->produits as $produitData) {
                $quantite = $produitData['quantite'];
                $prixUnitaire = $produitData['prix_unitaire'];
                $prixTotal = $quantite * $prixUnitaire;

                // Ajouter les produits mis à jour dans la table pivot
                $produitsData[] = [
                    'produits_id' => $produitData['produits_id'],
                    'quantite' => $quantite,
                    'prix_unitaire' => $prixUnitaire,
                    'prix_total' => $prixTotal,
                ];

                $total += $prixTotal;
            }

            // Utilisation de attach pour ajouter les nouveaux produits
            $vente->produits()->attach($produitsData);

            // Mise à jour du total de l'vente
            $vente->update(['total' => $total]);

            return response()->json([
                'message' => 'vente mis à jour avec succès',
                'vente' => $vente->load('produits'),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erreur lors de la mise à jour de l\'vente',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Supprime un vente de la base de données.
     */
    public function destroy($id)
    {
        // Récupérer l'vente
        $vente = vente::find($id);

        if (!$vente) {
            return response()->json([
                'message' => 'vente non trouvé'
            ], 404);
        }

        // Supprimer l'vente et ses relations avec les produits
        $vente->produits()->detach();
        $vente->delete();

        return response()->json([
            'message' => 'Vente supprimé avec succès'
        ], 200);
    }
}

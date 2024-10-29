<?php

namespace App\Http\Controllers;

use App\Models\Achat;
use App\Models\AchatProduit;
use App\Models\Fournisseurs;
use App\Models\Produit;
use App\Models\Produits;
use Illuminate\Http\Request;

class AchatController extends Controller
{
    /**
     * Affiche une liste des achats.
     */
    
    public function index()
    {
        $achats = Achat::with('produits')->get();
        return view('achats.index', compact('achats'));
    }


    public function create()
    {
        $fournisseurs = Fournisseurs::all(); // Récupérer tous les fournisseurs pour le formulaire
        return view('achats.create', compact('fournisseurs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'fournisseur_id' => 'required|exists:fournisseurs,id',
            'produits.*.quantite' => 'required|integer|min:1',
        ]);

        // Créer l'achat 
        $achat = new Achat();
        $achat->fournisseur_id = $request->fournisseur_id;
        $achat->date_facture = $request->date_facture;
        $achat->reference_facture = $request->reference_facture;
        $achat->nom_societe = $request->nom_societe;
        $achat->total = 0; // Nous allons calculer le total plus tard
        $achat->save();

        $total = 0; // Initialiser le total ici

        // Ajouter les produits à l'achat
        foreach ($request->produits as $produitInput) {
            if (!isset($produitInput['reference'])) {
                return redirect()->back()->withErrors('La référence du produit est manquante.');
            }

            $produit = Produits::where('reference', $produitInput['reference'])->first();

            if ($produit) {
                $quantite = $produitInput['quantite'];
                $prixUnitaire = $produit->prix_achat;
                $prixTotalProduit = $quantite * $prixUnitaire; // Calculer le prix total pour ce produit

                // Ajouter le produit à l'achat
                $achat->produits()->attach($produit->id, [
                    'quantite' => $quantite,
                    'prix_unitaire' => $prixUnitaire,
                    'prix_total' => $prixTotalProduit,
                ], false);



                // Ajouter le prix total du produit au total de l'achat
                $total += $prixTotalProduit;

                // Mettre à jour la quantité du produit
                $produit->quantite += $quantite; // Soustraire la quantité achetée
                $produit->save(); // Sauvegarder la mise à jour dans la base de données
            }
        }

        // Mettre à jour le total de l'achat
        $achat->total = $total; // Ici, le total est correctement mis à jour
        $achat->save();

        return redirect()->route('achats.index')->with('success', 'Achat créé avec succès.');
    }

    // Méthode pour rechercher un produit en fonction de la référence
    public function searchProduit($reference)
    {
        $produit = Produits::where('reference', $reference)->first();

        if ($produit) {
            return response()->json([
                'id' => $produit->id,
                'libelle' => $produit->libelle,
                'prix_achat' => $produit->prix_achat,
            ]);
        } else {
            return response()->json(['message' => 'Produit non trouvé'], 404);
        }
    }


    /**
     * Affiche les détails d'un achat spécifique.
     */
    public function show($id)
    {
        // Récupérer un achat avec ses produits
        $achat = Achat::with('produits')->find($id);

        if (!$achat) {
            return response()->json([
                'message' => 'Achat non trouvé'
            ], 404);
        }

        return response()->json($achat);
    }

    /**
     * Met à jour un achat existant dans la base de données.
     */
    public function update(Request $request, $id)
    {
        // Validation des données
        $request->validate([
            'fournisseur_id' => 'required|exists:fournisseurs,id',
            'produits' => 'required|array',
            'produits.*.produits_id' => 'required|exists:produits,id',
            'produits.*.quantite' => 'required|integer|min:1',
            'produits.*.prix_unitaire' => 'required|numeric|min:0',
        ]);

        try {
            // Trouver l'achat
            $achat = Achat::findOrFail($id);

            // Mise à jour de l'achat
            $achat->update([
                'fournisseur_id' => $request->fournisseur_id,
                'date_facture' => $request->date_facture,
                'reference_facture' => $request->reference_facture,
                'nom_societe' => $request->nom_societe,
                // Vous pouvez mettre à jour d'autres champs si nécessaire
            ]);

            // Réinitialiser les produits dans la table pivot
            $achat->produits()->detach();

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
            $achat->produits()->attach($produitsData);

            // Mise à jour du total de l'achat
            $achat->update(['total' => $total]);

            return response()->json([
                'message' => 'Achat mis à jour avec succès',
                'achat' => $achat->load('produits'),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erreur lors de la mise à jour de l\'achat',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Supprime un achat de la base de données.
     */
    public function destroy($id)
    {
        // Récupérer l'achat
        $achat = Achat::find($id);

        if (!$achat) {
            return response()->json([
                'message' => 'Achat non trouvé'
            ], 404);
        }

        // Supprimer l'achat et ses relations avec les produits
        $achat->produits()->detach();
        $achat->delete();

        return response()->json([
            'message' => 'Achat supprimé avec succès'
        ], 200);
    }
}

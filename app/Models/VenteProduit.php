<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class VenteProduit extends Pivot
{
    // Nom de la table pivot
    protected $table = 'vente_produit';

    // Les attributs qui sont remplissables
    protected $fillable = ['vente_id', 'produit_id', 'quantite', 'prix_unitaire', 'prix_total'];

    // Ajout d'une relation avec le modèle Vente
    public function vente()
    {
        return $this->belongsTo(Vente::class);
    }

    // Ajout d'une relation avec le modèle Produit
    public function produit()
    {
        return $this->belongsTo(Produits::class);
    }
}

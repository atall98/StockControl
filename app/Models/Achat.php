<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achat extends Model
{
    use HasFactory;

    protected $fillable = [
        'fournisseur_id',
        'date_facture',
        'reference_facture',
        'nom_societe',
        'total',
    ];

    public function fournisseurs()
    {
        return $this->belongsTo(Fournisseurs::class);
    }

    public function produits()
{
    return $this->belongsToMany(Produits::class)->withPivot('quantite', 'prix_unitaire', 'prix_total');

}

}

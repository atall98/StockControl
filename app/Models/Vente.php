<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vente extends Model
{
    protected $fillable = ['client', 'date_facture', 'reference_facture', 'total', 'created_at', 'updated_at'];

    

    
public function produits()
{
    return $this->belongsToMany(Produits::class, 'vente_produit')
                ->withPivot('quantite', 'prix_unitaire', 'prix_total');
}





}



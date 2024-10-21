<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produits extends Model
{
    protected $table = 'produits';
    protected $fillable = [
        'reference', 'libelle', 'description', 'prix_achat', 'prix_vente', 'quantite', 'quantite_alerte'
    ];
        
    
    public $timestamps = false;

    

    
    public function achats()
    {
        return $this->belongsToMany(Achat::class, 'achat_produits')->withPivot('quantite')->withTimestamps();
    }

    public function ventes()
{
    return $this->belongsToMany(Vente::class, 'vente_produit')
                ->withPivot('quantite', 'prix_unitaire', 'prix_total');
}

}





    

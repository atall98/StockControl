<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AchatProduit extends Model
{
    use HasFactory;

    protected $fillable = [
        'achat_id',
        'produits_id',
        'quantite',
        'prix_unitaire',
        'prix_total',
        
    ];
    public $timestamps = false;

    public function achat()
    {
        return $this->belongsTo(Achat::class);
    }

    public function produit()
    {
        return $this->belongsTo(Produits::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fournisseurs extends Model
{
    protected $fillable = [
        'nom_fournisseurs',
        'matricule_fournisseurs',
        'societe',
        'telephone',
        'email',
        'adresse',
    ];
    public $timestamps = false;
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    
    protected $fillable = [
        'nom_clients',
        'matricule_clients',
        'telephone',
        'email',
        'adresse',
    ];
    public $timestamps = false;
}



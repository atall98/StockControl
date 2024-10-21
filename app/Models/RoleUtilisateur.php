<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AchatProduit extends Model
{
    use HasFactory;

    protected $table = 'role_utilisateur'; // Nom de la table
    protected $fillable = ['utilisateur_id', 'role_id','created_at','updated_at'];
    

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class);
    }
}

<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AchatProduit extends Model
{
    use HasFactory;

    protected $table = 'permission_utilisateur'; // Nom de la table
    protected $fillable = ['utilisateur_id', 'permission_id','created_at','updated_at'];
    

    public function permission()
    {
        return $this->belongsTo(Permission::class);
    }

    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class);
    }
}

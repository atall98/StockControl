<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    protected $fillable = ['name'];
    public $timestamps = true;

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'permission_role');
    }

    public function utilisateurs()
    {
        return $this->belongsToMany(Utilisateur::class, 'permission_utilisateur');
    }
}


<?php

// app/Models/Utilisateur.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Utilisateur extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = ['name', 'email', 'email_verified_at', 'password','is_admin'];


    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_utilisateur');
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'permission_utilisateur');
    }
}



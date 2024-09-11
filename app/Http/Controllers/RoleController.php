<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        // Logique pour afficher les rôles
        return view('roles.index');
    }
}



<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EntreeController extends Controller
{
    public function index()
    {
        // Logique pour récupérer et afficher les entrées
        return view('entrees.index');
    }
}

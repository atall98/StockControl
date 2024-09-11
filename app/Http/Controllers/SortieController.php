<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SortieController extends Controller
{
    public function index()
    {
        // Logique pour afficher les sorties
        return view('sorties.index');
    }
}

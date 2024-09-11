<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function index()
    {
        // Votre logique ici
        return view('categories.index');
    }
}

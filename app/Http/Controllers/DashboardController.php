<?php

namespace App\Http\Controllers;

use App\Models\Achat;
use App\Models\Categories;
use App\Models\Clients;
use App\Models\Fournisseurs;
use App\Models\Produits; // Assure-toi d'importer le modèle Produits
use App\Models\User;
use App\Models\Vente;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Récupérer tous les produits qui sont en rupture de stock

        $produitsEnRupture = Produits::whereColumn('quantite', '<=', 'quantite_alerte')->get();


        // Compter les produits, utilisateurs, catégories, etc.
        $produitsCount = Produits::count();
        $usersCount = User::count();
        $categoriesCount = Categories::count();
        $fournisseursCount = Fournisseurs::count();
        $achatsCount = Achat::count();
        $clientsCount = Clients::count();
        $ventesCount = Vente::count();


        // Calcul des valeurs de stock
        $totalStockCost = Produits::sum('prix_achat'); // Somme des coûts d'achat
        $totalStockValue = Produits::sum('prix_vente'); // Somme des prix de vente
        $estimatedProfit = $totalStockValue - $totalStockCost; // Bénéfice estimé

        // Récupération des achats et ventes
        // Calcul des valeurs de stock
        $totalStockCost = Produits::sum('prix_achat'); // Somme des coûts d'achat
        $totalStockValue = Produits::sum('prix_vente'); // Somme des prix de vente
        $estimatedProfit = $totalStockValue - $totalStockCost; // Bénéfice estimé

        $achats = Achat::selectRaw('SUM(total) as total, DATE(created_at) as date')
        ->groupBy('date')
        ->pluck('total', 'date');

$ventes = Vente::selectRaw('SUM(total) as total, DATE(created_at) as date')
        ->groupBy('date')
        ->pluck('total', 'date');

// Préparer les labels pour le graphique
$labels = $achats->keys()->merge($ventes->keys())->unique()->sort()->values();

$achats_values = [];
$ventes_values = [];

foreach ($labels as $label) {
$achats_values[] = $achats->get($label, 0);
$ventes_values[] = $ventes->get($label, 0);
}
    
        
        return view('dashboard', [
            'produitsEnRupture' => $produitsEnRupture, 
            'produitsCount' => $produitsCount, 
            'usersCount' => $usersCount, 
            'categoriesCount' => $categoriesCount, 
            'fournisseursCount' => $fournisseursCount, 
            'achatsCount' => $achatsCount, 
            'clientsCount' => $clientsCount, 
            'ventesCount' => $ventesCount, 
            'totalStockCost' => $totalStockCost,
        'totalStockValue' => $totalStockValue, 
        'estimatedProfit' => $estimatedProfit,
            'totalStockCost' => $totalStockCost, 
            'labels' => $labels, 
            'achats_values' => $achats_values, 
            'ventes_values' => $ventes_values 
        ]);
    }
}

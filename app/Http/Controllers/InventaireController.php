<?php

namespace App\Http\Controllers;

use App\Models\Achat;
use App\Models\Achats;
use App\Models\Produits;
use App\Models\Vente;
use App\Models\Ventes;
use Illuminate\Http\Request;
use Carbon\Carbon;

class InventaireController extends Controller
{
    public function index(Request $request)
{
    $periode = $request->get('periode', 'mois'); // Par défaut, 'mois'
    
    // Récupérer les achats ou les ventes selon la période choisie
    $achats = Achat::with('produit')->whereYear('created_at', now()->year)->get(); // Ajustez selon votre logique

    return view('inventaires.index', compact('achats', 'periode'));
}





    public function ventes($periode)
    {
        $ventes = Vente::with('produits')->get(); // Récupère les achats avec les produits associés
        // Ou utilisez une période de temps si nécessaire
        // $achats = Achat::with('produits')->whereDate('created_at', $date)->get();

        return view('inventaires.ventes', [
            'ventes' => $ventes,
            'periode' => 'jour' // ou la période que vous utilisez
        ]);
    }

    public function achats()
    {
        $achats = Achat::with('produits')->get(); // Récupère les achats avec les produits associés
        // Ou utilisez une période de temps si nécessaire
        // $achats = Achat::with('produits')->whereDate('created_at', $date)->get();

        return view('inventaires.achats', [
            'achats' => $achats,
            'periode' => 'jour' // ou la période que vous utilisez
        ]);
    }


    private function getInventaireData($model, $periode)
    {
        switch ($periode) {
            case 'jour':
                return $model::whereDate('created_at', Carbon::today())->get();
            case 'mois':
                return $model::whereMonth('created_at', Carbon::now()->month)->get();
            case 'annee':
                return $model::whereYear('created_at', Carbon::now()->year)->get();
            default:
                return collect();
        }
    }
}

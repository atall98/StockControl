<?php

use App\Http\Controllers\AchatController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\fournisseurController;
use App\Http\Controllers\InventaireController;
use App\Http\Controllers\ParametreController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\userController;
use App\Http\Controllers\VenteController;
use App\Models\Achat;
use App\Models\Categories;
use App\Models\Clients;
use App\Models\Fournisseurs;
use App\Models\Produits;
use App\Models\User;
use App\Models\Vente;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    

    Route::resource('clients', ClientController::class);

    // Fournisseurs
    Route::resource('fournisseurs', fournisseurController::class);

    // Produits
    Route::resource('produits', ProduitController::class);
    Route::get('/produits/search/{reference}', [ProduitController::class, 'search']);



    Route::resource('categories', CategorieController::class);

    Route::resource('users', userController::class);

    Route::get('/parametres', [ParametreController::class, 'index'])->name('parametres.index');

    // Ventes
    Route::resource('ventes', VenteController::class);

    // Achats
    Route::resource('achats', AchatController::class);



    // Rôles
    Route::resource('roles', RoleController::class);

    Route::put('/parametres/affichage', [ParametreController::class, 'updateAffichage'])->name('parametres.update.affichage');
    Route::put('/parametres/langue', [ParametreController::class, 'updateLangue'])->name('parametres.update.langue');


    Route::get('/inventaires', [InventaireController::class, 'index'])->name('inventaires.index');
    Route::get('/inventaires/ventes/{periode}', [InventaireController::class, 'ventes'])->name('inventaires.ventes');
    Route::get('/inventaires/achats/{periode}', [InventaireController::class, 'achats'])->name('inventaires.achats');
    Route::get('/inventaires/{periode}', [InventaireController::class, 'index'])->name('inventaires.index.periode');




    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // Route::get('/dashboard', function () {
    //     // Récupération des données
    //     $produitsCount = Produits::count(); // Compte le nombre de produits
    //     $usersCount = User::count(); // Compte le nombre d'utilisateurs
    //     $categoriesCount = Categories::count(); // Compte le nombre de catégories
    //     $fournisseursCount = Fournisseurs::count(); // Compte le nombre de fournisseurs
    //     $achatsCount = Achat::count(); // Compte le nombre d'achats
    //     $clientsCount = Clients::count(); // Compte le nombre de clients
    //     $ventesCount = Vente::count(); // Compte le nombre de ventes
    //     $produitsEnRupture = Produits::where('quantite', '<=', 'quantite_alerte')->get();
    //     // Récupération des valeurs de stock
    //     $totalStockCost = Produits::sum('prix_achat'); // Remplacez par votre colonne appropriée
    //     $totalStockValue = Produits::sum('prix_vente'); // Remplacez par votre colonne appropriée
    //     $estimatedProfit = $totalStockValue - $totalStockCost;

    //     // Récupération des données pour le rapport des achats et ventes
    //     $achats = Achat::selectRaw('DATE(created_at) as date, COUNT(*) as total')->groupBy('date')->pluck('total', 'date')->toArray();
    //     $ventes = Vente::selectRaw('DATE(created_at) as date, COUNT(*) as total')->groupBy('date')->pluck('total', 'date')->toArray();

    //     return view('dashboard', compact('produitsCount', 'usersCount', 'categoriesCount', 'fournisseursCount', 'achatsCount', 'clientsCount', 'ventesCount', 'produitsEnRupture', 'totalStockCost', 'totalStockValue', 'estimatedProfit', 'achats', 'ventes'));
    // })->name('dashboard');
});

require __DIR__ . '/auth.php';

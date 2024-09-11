<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\EntreeController;
use App\Http\Controllers\SortieController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    #Route::get('/roles', [RoleController::class, 'index'])->name('Role.index');
    #Route::get('/categories', [CategorieController::class, 'index'])->name('Categorie.index');
    Route::get('/produits', [ProduitController::class, 'index'])->name('produits.index');
    Route::get('/produits/index', [ProduitController::class, 'index'])->name('produits.index');
    #Route::get('/entrees', [EntreeController::class, 'index'])->name('Entree.index');
    #Route::get('/sorties', [SortieController::class, 'index'])->name('Sortie.index');
    Route::get('/produits/{id}', [ProduitController::class, 'show'])->name('produits.show');
    Route::get('/produits/create', [ProduitController::class, 'create'])->name('produits.create');
    Route::get('/produits/{id}/edit', [ProduitController::class, 'edit'])->name('produits.edit');
    Route::delete('/produits/{id}', [ProduitController::class, 'destroy'])->name('produits.destroy');
    Route::post('/produits', [ProduitController::class, 'store'])->name('produits.store');
    Route::put('/produits/{id}', [ProduitController::class, 'update'])->name('produits.update');

    Route::get('/clients/index', [ProduitController::class, 'index'])->name('clients.index');

    
});

require __DIR__.'/auth.php';

<?php

use App\Http\Controllers\BarreRechercheTestController;
use App\Http\Controllers\DetailProduitController;
use App\Http\Controllers\RechercheCategorieController;
use App\Http\Controllers\RechercheController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function(){
    return view('miliboo');
})->name('homepage');

Route::get('/recherche',
    [RechercheController::class, "index"])->name('produit.recherche');

Route::get('/produit/idproduit{id}', [DetailProduitController::class, 'show']) ->name('produit.show');

Route::get('/cookie', function() {
    return view('cookie');
});

Route::get('/categorie/{idTypeProduit}',[RechercheController::class, 'showByCategory'])->name('produits.parCategorie');

Route::get('/regroupement/{idRegroupement}',[RechercheController::class, 'showByRegroupement'])->name('produits.parRegroupement');

Route::get('/categorieMere/{idCategorie}',[RechercheController::class, 'showByCategoryMere'])->name('produits.parCategorieMere');
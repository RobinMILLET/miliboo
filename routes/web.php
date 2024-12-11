<?php

use App\Http\Controllers\CookieController;
use App\Http\Controllers\DetailProduitController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RechercheController;
use App\Http\Controllers\PanierController;
use App\Models\ProduitSimilaire;
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

/*
| Pages principales
*/
Route::get('/', function(){
    return view('miliboo');
})->name('homepage');

Route::get('/confidentialite', function(){
    return view('politiqueconfidentialite');
})->name('confidentialite');

Route::get('/erreur', function(){
    return view('erreur');
})->name('erreur');

/*
| Utilisateur
*/

Route::get('/compte',[LoginController::class, 'index'])->name('compte');
Route::post('/login', [LoginController::class, 'tryLogin']);

Route::get('/creationcompte', function(){
    return view('creationcompte');
})->name('creationcompte');

/*
| Produits
*/
Route::get('/produit/idproduit{id}/coloration{idcoloration}', [DetailProduitController::class, 'show']) ->name('produit.show');

Route::get('/panier',[PanierController::class, 'index'])->name('panier');

Route::get('/prixPanier', [PanierController::class, 'prixPanier']);
Route::get('/setPanier/{idproduit}/{idcouleur}/{idquantite}', [PanierController::class, 'setLignePanier']);
Route::get('/addPanier/{idproduit}/{idcouleur}/{idquantite}', [PanierController::class, 'addToPanier']);

/*
| Recherche
*/
Route::get('/recherche',
    [RechercheController::class, "index"])->name('produit.recherche');

Route::get('/categorie/{idTypeProduit}',[RechercheController::class, 'showByCategory'])->name('produits.parCategorie');

Route::get('/regroupement/{idRegroupement}',[RechercheController::class, 'showByRegroupement'])->name('produits.parRegroupement');
    
Route::get('/categorieMere/{idCategorie}',[RechercheController::class, 'showByCategoryMere'])->name('produits.parCategorieMere');

    
/*
| Gestion des cookies
*/
Route::get('/cookie', function() {
    return view('cookie');
});

Route::get('/setcookie/{cle}/{valeur}/{duree}', [CookieController::class, 'setCookie']);
Route::get('/getcookie/{cle}/{route}', [CookieController::class, 'getCookie']);
Route::get('/delcookie/{cle}', [CookieController::class, 'delCookie']);

/*
| Pour les tests random
*/
Route::get('/test', function() {
    return view('test');
});
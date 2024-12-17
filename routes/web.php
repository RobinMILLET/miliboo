<?php

use App\Http\Controllers\CookieController;
use App\Http\Controllers\InfoPersoController;
use App\Http\Controllers\DetailProduitController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RechercheController;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\CreationCompteController;
use App\Http\Controllers\EspaceClient;
use App\Http\Controllers\ProduitsAimesController;
use App\Http\Controllers\PaiementController;
use App\Http\Controllers\EspaceClientController;
use App\Http\Controllers\DetailCommandeController;
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
Route::get('/login', [LoginController::class, 'tryLogin']);
Route::post('/login', [LoginController::class, 'tryLogin']);
Route::post('/modMdp', [InfoPersoController::class, 'tryChangeMdp']);
Route::post('/testCreate', [LoginController::class, 'createForm']);
Route::post('/tryMod', [InfoPersoController::class, 'tryModifInfo']);
Route::post('/tryCreate', [CreationCompteController::class, 'tryCreateCompte']);
Route::get('/villeApprox/{cp}/{nom}', [CreationCompteController::class, 'villeApprox']);
Route::get('/logout', [LoginController::class, 'logOut']);


function reqLogin($route) {
    if (!$_SESSION["client"]) return redirect()->route('compte');
    return view($route);
}

function reqNoLogin($route) {
    if ($_SESSION["client"]) return redirect()->route('homepage');
    return view($route);
}

Route::get('/creationcompte', function(){
    return reqNoLogin('creationcompte');
})->name('creationcompte');

Route::get('/espaceclient', function(){
    return reqLogin('espaceclient');
})->name('espaceclient');

Route::get('/mescommandes', function(){
    return reqLogin('mescommandes');
})->name('mescommandes');

Route::get('/infoperso', function(){
    return reqLogin('infoperso');
})->name('infoperso');

Route::get('/detailcommande', function(){
    return reqLogin('detailcommande');
})->name('detailcommande');

Route::get('/modifmdp', function(){
    return reqLogin('modifmdp');
})->name('modifmdp');

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
Route::get('/getcookie/{cle}', [CookieController::class, 'getCookie']);
Route::get('/delcookie/{cle}', [CookieController::class, 'delCookie']);

/*
| Pour les tests random
*/
Route::get('/test', function() {
    return view('test');
});

/*Commande */
Route::get('/commande', [CommandeController::class, 'index'])->name('commande');

/* Espace Client */

/*
| Produits aimês
*/
Route::get('/espaceclient/produitsaimes', [ProduitsAimesController::class, 'show'])->name('compte.aimes');

/*
| Pour la requete like
*/
Route::post('/toggle-like', [DetailProduitController::class, 'toggleLike']);

/*
| Pour la requete deposerAvis
*/
Route::post('/add-avis', [DetailProduitController::class, 'addAvis'])->name('add-avis');

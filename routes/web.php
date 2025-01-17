<?php

use App\Http\Controllers\A2fController;
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
use App\Http\Controllers\CompositionController;
use App\Http\Controllers\LoginServicesController;
use App\Http\Controllers\ModifContactController;
use App\Http\Controllers\AdminDashboardController;
use App\Models\CompositionProduit;
use App\Models\ProduitSimilaire;
use App\Models\ServiceMiliboo;
use App\Http\Controllers\ColorationController;
use App\Http\Controllers\DetailCompositionController;
use App\Http\Controllers\LivraisonController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BotManController;
use Laravel\Fortify\Fortify;
use App\Http\Controllers\PayPalController;
use App\Models\Paiement;

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
Route::get('/login/{idclient}/{mdpresetoken}', [LoginController::class, 'loginByReset']);
Route::post('/login', [LoginController::class, 'tryLogin']);
Route::post('/modMdp', [InfoPersoController::class, 'tryChangeMdp']);
Route::post('/modMail', [ModifContactController::class, 'changeMail']);
Route::post('/testCreate', [LoginController::class, 'createForm']);
Route::post('/tryMod', [InfoPersoController::class, 'tryModifInfo']);
Route::post('/tryCreate', [CreationCompteController::class, 'tryCreateCompte']);
Route::get('/villeApprox/{cp}/{nom}', [CreationCompteController::class, 'villeApprox']);
Route::get('/logout', [LoginController::class, 'logOut']);
Route::post('/sendVerifMail', [ModifContactController::class, 'sendVerifMail']);
Route::get('/verif/{id}/{token}', [ModifContactController::class, 'verifMail']);
Route::post('/sendVerifTel', [ModifContactController::class, 'sendVerifTel']);
Route::post('/verifTel', [ModifContactController::class, 'verifTel']);
Route::post('/json', [InfoPersoController::class, 'clientJson'])->name("json");
Route::get('/json', [InfoPersoController::class, 'clientJson']);
Route::get('/anonym/{any}', [InfoPersoController::class, 'clientAnonym']);
Route::get('/delAdr/{id}', [InfoPersoController::class, 'delAdr']);
Route::post('/addAdr', [InfoPersoController::class, 'addAdr'])->name('addAdr');
Route::post('/resetMdp', [LoginController::class, 'resetPassword'])->name('resetMdp');
Route::get('/a2f', [A2fController::class, 'index'])->name("a2f");
Route::post('/a2fSend', [A2fController::class, 'a2fSend'])->name('a2fSend');
Route::post('/a2fLogin', [A2fController::class, 'a2fLogin'])->name('a2fLogin');
Route::get('/expedie/{idcmd}', [AdminDashboardController::class, 'expedie'])->name("expedie");


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

Route::get('/aide', function(){
    return view('aide');
})->name('aide');

Route::get('/mescommandes', function(){
    return reqLogin('mescommandes');
})->name('mescommandes');

Route::get('/infoperso', function(){
    return reqLogin('infoperso');
})->name('infoperso');

Route::post('/infoperso', function(){
    return reqLogin('infoperso');
})->name('infoperso');

Route::get('/detailcommande', function(){
    return reqLogin('detailcommande');
})->name('detailcommande');

Route::get('/modifmdp', function(){
    return reqLogin('modifmdp');
})->name('modifmdp');

Route::get('/modifcontact', function(){
    return reqLogin('modifcontact');
})->name('modifcontact');

Route::get('/reset', function(){
    return view('resetmdp');
})->name('reset');

/*
| Produits
*/
Route::middleware(['web'])->group(function(){
    Route::get('/produit/idproduit{id}/coloration{idcoloration}', [DetailProduitController::class, 'show']) ->name('produit.show');

    Route::get('/panier',[PanierController::class, 'index'])->name('panier');
    
    Route::get('/prixPanier', [PanierController::class, 'prixPanier']);
    Route::get('/setPanier/{idproduit}/{idcouleur}/{quantite}', [PanierController::class, 'setLignePanier']);
    Route::get('/addPanier/{idproduit}/{idcouleur}/{quantite}', [PanierController::class, 'addToPanier']);
    Route::get('/setPanier/{idcomposition}/{quantite}', [PanierController::class, 'setLignePanierComp']);
    Route::get('/addPanier/{idcomposition}/{quantite}', [PanierController::class, 'addToPanierComp']);
    
    Route::get('/etapelivraison',[LivraisonController::class, 'index'])->name('etapelivraison');
    Route::post('/paiement',[LivraisonController::class, 'redirect']);
    Route::get('/paiement',[PaiementController::class, 'index'])->name('paiement');
    Route::post('/paieNouvCB', [PaiementController::class, 'paieNouvCB'])->name('paieNouvCB');
    Route::post('/paieCB', [PaiementController::class, 'paieCB'])->name('paieCB');
});
// Route::get('/produit/idproduit{id}/coloration{idcoloration}', [DetailProduitController::class, 'show']) ->name('produit.show');

// Route::get('/panier',[PanierController::class, 'index'])->name('panier');

// Route::get('/prixPanier', [PanierController::class, 'prixPanier']);
// Route::get('/setPanier/{idproduit}/{idcouleur}/{quantite}', [PanierController::class, 'setLignePanier']);
// Route::get('/addPanier/{idproduit}/{idcouleur}/{quantite}', [PanierController::class, 'addToPanier']);
// Route::get('/setPanier/{idcomposition}/{quantite}', [PanierController::class, 'setLignePanierComp']);
// Route::get('/addPanier/{idcomposition}/{quantite}', [PanierController::class, 'addToPanierComp']);

// Route::get('/etapelivraison',[LivraisonController::class, 'index'])->name('etapelivraison');
// Route::post('/paiement',[LivraisonController::class, 'redirect']);
// Route::get('/paiement',[PaiementController::class, 'index'])->name('paiement');
// Route::post('/paieNouvCB', [PaiementController::class, 'paieNouvCB'])->name('paieNouvCB');
// Route::post('/paieCB', [PaiementController::class, 'paieCB'])->name('paieCB');

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
Composition
*/
Route::get('/composition',[CompositionController::class, 'index'])->name("composition");
Route::get('/detailcomposition/{idcomposition}',[DetailCompositionController::class, 'show'])->name("composition.detail");
/*
| Pour la requete like
*/
Route::post('/toggle-like', [DetailProduitController::class, 'toggleLike']);

/*
| Pour la requete deposerAvis
*/
Route::post('/add-avis', [DetailProduitController::class, 'addAvis'])->name('add-avis');

/* Dashboard Admin*/
Route::get('/admin/dashboard', [AdminDashboardController::class, 'show'])
    ->name('admin.dashboard')
    ->middleware('admin_session');

/* Login admin */
Route::prefix('admin')->group(function () {
    Route::get('/login', [LoginServicesController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [LoginServicesController::class, 'login'])->name('admin.login.submit');
    Route::get('/logout', [LoginServicesController::class, 'logout'])->name('admin.logout');
});

/* Envoie sms pour livraison */
Route::get('/expedie/{cle}')->name('expedie');

/* Reponse service vente */
Route::post('/repondre-avis', [DetailProduitController::class, 'repondreAvis'])->name('repondre.avis');

/* Ajout Produit */
Route::post('/admin/produit/ajouter', [AdminDashboardController::class, 'ajouterProduit'])->name('admin.ajouter.produit');

/* Recupere l'id service */
Route::get('/getService', [AdminDashboardController::class, 'getService']);

/* Requete donnees coloration */
Route::get('/coloration-data', [ColorationController::class, 'getColorationData']);

/* Requete directeur vente */
Route::post('/coloration/{idproduit}/{idcouleur}/update', [ColorationController::class, 'update']);



//Route BotMan
Route::match(['get', 'post'], '/botman',
'App\Http\Controllers\BotManController@handle')->name("botman");

//Page test botman
Route::get('/welcome', function() {
    return view('welcome');
});


/* Logout Admin */
Route::get('/logoutAdmin', function () {
    $_SESSION['admin'] = null;
    return redirect()->route('admin.login');
})->name('logoutAdmin');

/* Pulse Test */
Route::get('/test-pulse', function () {
    \Log::info('Test route accessed');
    sleep(1);
    return 'Test complete';
});

Route::get('/debug-pulse-queries', function () {
    DB::select("SELECT *, pg_sleep(0.5) FROM coloration");
    
    DB::select("
        SELECT *
        FROM coloration
        WHERE idproduit IN (
            SELECT idproduit 
            FROM coloration 
            WHERE pg_sleep(0.3) IS NOT NULL
        )
    ");
        
    return "Slow queries executed";
});

Route::get('/debug-pulse-cache', function () {
    Cache::put('test-key-1', 'value1', 60);
    Cache::get('test-key-1');
    Cache::put('test-key-2', 'value2', 60);
    Cache::forget('test-key-1');
    
    return "Cache operations executed";
});
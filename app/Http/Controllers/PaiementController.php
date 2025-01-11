<?php

namespace App\Http\Controllers;

use App\Models\Adresse;
use App\Models\CarteBancaire;
use App\Models\Coloration;
use App\Models\Commande;
use App\Models\CommandeComposition;
use App\Models\CompositionProduit;
use App\Models\DetailCommande;
use App\Models\Paiement;
use App\Models\Produit;
use App\Models\Transporteur;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PaiementController extends Controller
{
    public static function echoOptionsCB() {
        $cbs = CarteBancaire::all()->where("idclient", "=", $_SESSION["client"]->idclient);
        if (count($cbs) == 0) return;
        echo '<form id="form-cbsaved" method="POST" action="/paieCB">'.csrf_field();
        echo '<h2 class="title-section">Choisir une carte bancaire :</h2>';
        echo '<select name="idcb" id="select-cb" class="input"  style="width:256px;">';
        foreach ($cbs as $cb) {
            echo "<option value='$cb->idcartebancaire'>$cb->nomcartebancaire</option>";
        }
        echo '</select>';
        echo '<input name="crypt" class="input" type="text" placeholder="Cryptogramme visuel" maxlength="3" onchange="validate(this, 3)" required>';
        echo '<button type="submit" class="btn btn-primary">Valider</button></form>';
        
    }

    public static function getTotalPrix($panier) {
        $prixpanier = PanierController::prixPanier(false, $panier);
        $prixassurance = $_SESSION["assurance"] ? LivraisonController::$PRIXASSURANCE : 0;
        $prixexpress = $_SESSION["express"] ? LivraisonController::$PRIXEXPRESS : 0;
        $prixsup = $prixassurance + $prixexpress;
        $prixmax = round($prixpanier + $prixsup, 2);
        $pointsdispo = $_SESSION["client"]->pointfideliteclient;
        $prixfidel = $_SESSION["usefidel"] ? min(ceil($prixmax*2)/2, $pointsdispo*0.5) : 0;
        $pointsutil = $prixfidel*2;
        $prixtotal = max(0, round($prixmax - $prixfidel, 2));
        return array($prixpanier, $prixsup, $prixmax, $prixfidel, $pointsutil, $prixtotal);
    }

    public function index() {
        if (!$_SESSION["client"]) return redirect('/compte');
        if (!isset($_SESSION["adresseFact"], $_SESSION["adresseLivr"], $_SESSION["transporteur"]))
            return redirect()->route('etapelivraison');
        return view('paiement', ['prix' => self::getTotalPrix($_SESSION["panier"])]);
    }

    public static function onlyNum($str, $len) {
        if (strlen($str) !== $len) return false;
        return ctype_digit($str);
    }

    public function paieNouvCB(Request $request) {
        $client = $_SESSION["client"];
        if (!$client) return redirect()->route("compte");
        $request->validate([
            'nom' => 'nullable|string',
            'num' => 'required|string',
            'mois' => 'required|string',
            'an' => 'required|string',
            'crypt' => 'required|string',
            'save' => 'nullable|string',
        ]);
        $card = array();
        $card["nomcartebancaire"] = $request->nom ?? $client->nomclient . " ". $client->prenomclient;
        $card["numcartebancaire"] = preg_replace('/[\s-]/', '', $request->num);
        if (!self::onlyNum($card["numcartebancaire"], 16)) return redirect()->back()->with("error", "num");

        $mois = $request->mois;
        if (!self::onlyNum($mois, 2)) return redirect()->back()->with("error", "mois");
        $an = $request->an;
        if (!self::onlyNum($an, 4)) return redirect()->back()->with("error", "an");
        $date = new \DateTime();
        $date->setDate(intval($an), intval($mois), 1);
        $card["dateexpirationcarte"] = $date;
        $crypt = $request->crypt;
        if (!self::onlyNum($crypt, 3)) return redirect()->back()->with("error", "crypt");
        $save = $request->save ?? false;
        if ($save && !$request->nom) return redirect()->back()->with("error", "nom");
        $card["dateenregistrement"] = now();
        $card["idclient"] = $client->idclient;
        return self::paieCB($request, $card, $crypt, $save);
    }

    public static function paieCB(Request $request, $array = null, $crypt = null, $save = false) {
        $client = $_SESSION["client"];
        if (!$client) return redirect()->route("compte");
        $panier = $_SESSION["panier"];
        if (!$panier) return redirect()->route("panier");
        $prix = self::getTotalPrix($panier)[5];
        if (!$array) {
            $request->validate([
                "idcb" => 'required|string',
                'crypt' => 'required|string'
            ]);
            $id = intval($request->idcb);
            $cb = CarteBancaire::find($id);
            if (!$cb) return redirect()->back()->with("error", "notfound");
            if ($cb->idclient != $_SESSION["client"]->idclient)
                return redirect()->back()->with("error", "notfound");
            $array = $cb->toArray();
            $crypt = $request->crypt;
        }
        if (!$crypt || !self::onlyNum($crypt, 3))
            return redirect()->back()->with("error", "crypt");
        $numcb = substr($array["numcartebancaire"], 12, 4);

        // test et paiement CB
        // <[ ]>
        
        DB::beginTransaction();
        try {
            if ($save) {
                $existingCB = CarteBancaire::where("numcartebancaire", "=", $array["numcartebancaire"])
                ->where("idclient", "=", $array["idclient"])->get()->first();
                if (!$existingCB) {
                    $newCB = CarteBancaire::create($array);
                    $idcb = $newCB->idcartebancaire;
                    Log::alert("Création CB: ", [$newCB]);
                }
            }
            else $idcb = null;
            return self::saveCommande($panier, $idcb, $numcb);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::alert("erreur SQL sur création commande avec CB :", [$array, $e]);
            return redirect()->back()->with("error", "sql");
        }
    }

    public static function saveCommande($panier, $idcb, $numcb) {
        $client = $_SESSION["client"];
        $cmd = [
            "idclient" => $client->idclient,
            "idadresse" => $_SESSION["adresseLivr"]->idadresse,
            "idadressefact" => $_SESSION["adresseFact"]->idadresse,
            "idstatutcommande" => 2,
            "idtransporteur" => $_SESSION["transporteur"]->idtransporteur,
            "datecommande" => now(),
            "avecassurance" => $_SESSION["assurance"],
            "aveclivraisonexpress" => $_SESSION["express"],
            "instructionlivraison" => $_SESSION["instruct"],
        ];
        $commande = Commande::create($cmd);
        $prix = self::getTotalPrix($panier);
        $paiement = self::savePaiement($commande, $prix[5], $idcb, $numcb);
        $nb = self::saveDetailCommande($commande, $panier);
        $client->pointfideliteclient -= $prix[4];
        $client->pointfideliteclient += floor((max(0,$prix[0]-$prix[3]))/20);
        $client->save();
        Log::alert("Commande CB créée avec succès: ($nb articles)", [$client, $commande, $paiement]);
        DB::commit();
        $_SESSION["adresseFact"] = null; $_SESSION["adresseLivr"] = null; $_SESSION["transporteur"] = null;
        $_SESSION["assurance"] = null; $_SESSION["express"] = null; $_SESSION["instruct"] = null; $_SESSION["usefidel"] = null;
        $_SESSION["panier"] = array(array(), array());
        return redirect()->route("detailcommande", ['id'=>$commande->idcommande]);
    }

    public static function saveDetailCommande($commande, $panier) {
        // $panier[0] = [[idproduit, idcouleur, quantite], ...]
        // $panier[1] = [idcomposition => quantite, ...]
        foreach ($panier[0] as $detailcommande) {
            DetailCommande::create([
                "idcommande" => $commande->idcommande,
                "idproduit" => $detailcommande[0],
                "idcouleur" => $detailcommande[1],
                "quantitecommande" => $detailcommande[2],
            ]);
            $coloration = Coloration::all()->where("idproduit", "=", $detailcommande[0])
                ->where("idcouleur", "=", $detailcommande[1])->first();
            $coloration->quantitestock -= $detailcommande[2];
            if ($coloration->quantitestock < 0) $coloration->quantitestock = 0; //
            $coloration->save();
        }
        foreach ($panier[1] as $idcomposition => $quantite) {
            CommandeComposition::create([
                "idcommande" => $commande->idcommande,
                "idcomposition" => $idcomposition,
                "quantitecompositioncommande" => $quantite,
            ]);
            $composition = CompositionProduit::find($idcomposition);
            $details = $composition->getDetailComposition();
            foreach ($details as $detail) {
                $coloration = Coloration::all()->where("idproduit", "=",$detail->idproduit)
                    ->where("idcouleur", "=", $detail->idcouleur)->first();
                $coloration->quantitestock -= $quantite*$detail->quantitecomposition;
            if ($coloration->quantitestock < 0) $coloration->quantitestock = 0; //
            $coloration->save();
            }
        }
        return count($panier[0]) + count($panier[1]);
    }

    public static function savePaiement($commande, $prix, $idcb, $numcb) {
        if ($prix <= 0) return null;
        $paiement = Paiement::create([
            "idcommande" => $commande->idcommande,
            "idcartebancaire" => $idcb,
            "idtypepaiement" => 1,
            "datepaiement" => now(),
            "montantpaiement" => $prix,
            "indicepaiement" => "Paiement avec CB finissant par ".$numcb
        ]);
        return $paiement;
    }

    public static function error($error) {
        echo '<script>alert("';
        switch ($error) {
           case "num": echo "Numéro de crate invalide (16 chiffres)"; break;
           case "mois": echo "Mois d'expiration invalide"; break;
           case "an": echo "Année d'expiration invalide"; break;
           case "crypt": echo "Cyptogramme invalide (3 chiffres)"; break;
           case "nom": echo "Nom de crate bancaire requis pour sauvegarder"; break;
           case "notfound": echo "Carte bancaire inconnue"; break;
           case "sql": echo "Erreur lors du processus d'enregistrement"; break;
        }
        echo '")</script>';
     }
}

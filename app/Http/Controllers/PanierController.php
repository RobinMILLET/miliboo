<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coloration;
use App\Http\Controllers\CookieController;
use App\Models\CompositionProduit;
use Illuminate\Support\Facades\Log;

class PanierController extends Controller
{
    public static function afficheLigne(Coloration $coloration, $quantite) {
        $id = $coloration->idproduit."-".$coloration->idcouleur;
        $photo = $coloration->getPhoto()->first();
        $produit = $coloration->getProduit();
        $href = "href='/produit/idproduit$coloration->idproduit/coloration$coloration->idcouleur'";   
        $nom = "<a $href><p class='p-name'>$produit->nomproduit</p></a>";

        // Photo
        if ($photo) {
            $source = $photo->sourcephoto;
            $desc = $photo->descriptionphoto;
        } // Si pas de photo, on prend la photo par défaut
        else {
            $source = "PLACEHOLDER.png";
            $desc = "Image par défaut";
        }
        $img = "<td class='td-article'><a $href><img src='/img/$source' alt='$desc'></a></td>";
        
        // Prix et réduction
        if (!$coloration->prixsolde) {
            $reduc = "<p class='p-price prix'>$coloration->prixvente</p>";
            $trueprice = $coloration->prixvente; $pourcent = ""; $original = "";
        }
        else {
            $trueprice = $coloration->prixsolde;
            $reduc = "<p class='p-price prix'>$coloration->prixsolde</p>";
            $pourcent = "<div class='div-reduc-pourcent'><p class='p-pourcent'>-".round($coloration->getReduc(), 0)."%</p></div>";
            $original = "<p class='p-reduc prix'>au lieu de $coloration->prixvente</p>";
        }
        $prix = "<div class='div-reduc'>$reduc$pourcent</div>$original";
        $livraison = "<p class='p-livraison'>Expédié sous ".substr($produit->delailivraison, 0, 2)."h</p>";
        $description = "<td class='td-description'><div class='div-description'>$nom$prix$livraison</div></td>";

        // Quantités
        $disablelow = $quantite <= 1 ? "disabled" : "";
        $disablehigh = $quantite >= $coloration->quantitestock ? "disabled" : "";
        $quantites = "<td class='td-quantite'><div class='div-quantite'>" .
                    "<button id='m$id' class='button-quantite' onclick=\"m('$id')\" $disablelow>-</button>" .
                    "<label id='q$id' class='label-quantite'>$quantite</label>" .
                    "<button id='p$id' class='button-quantite' onclick=\"p('$id')\" $disablehigh>+</button>" .
                    "</div></td>";

        $suppr = "<td class='td-supprimer'><button id='d$id' class='but-supprimer show-detail' onclick=\"d('$id')\"><p class='p-detail bottom'>Retirer de mon panier</p><img src='/img/supprimer.png' alt=''></button></td>";
        $total = "<td class='td-total'><p id='t$id' class='p-total prix'>".round($trueprice*$quantite, 2)."</p></td>";
        return "<tr class='tr-body'>$img$description$quantites$suppr$total</tr>";
    }

    public static function afficheLigneComp(CompositionProduit $composition, $quantite) {
        $photo = $composition->getDetailComposition()->first()->getColoration()->getPhoto()->first();
        $href = "href='/detailcomposition/$composition->idcomposition'";   
        $nom = "<a $href><p class='p-name'>$composition->nomcomposition</p></a>";

        // Photo
        if ($photo) {
            $source = $photo->sourcephoto;
            $desc = $photo->descriptionphoto;
        } // Si pas de photo, on prend la photo par défaut
        else {
            $source = "PLACEHOLDER.png";
            $desc = "Image par défaut";
        }
        $img = "<td class='td-article'><a $href><img src='/img/$source' alt='$desc'></a></td>";
        
        // Prix et réduction
        if (!$composition->prixsoldecomposition) {
            $reduc = "<p class='p-price prix'>$composition->prixventecomposition</p>";
            $trueprice = $composition->prixventecomposition; $pourcent = ""; $original = "";
        }
        else {
            $trueprice = $composition->prixsoldecomposition;
            $reduc = "<p class='p-price prix'>$composition->prixsoldecomposition</p>";
            $pourcent = "<div class='div-reduc-pourcent'><p class='p-pourcent'>-".round($composition->getReduc(), 0)."%</p></div>";
            $original = "<p class='p-reduc prix'>au lieu de $composition->prixventecomposition</p>";
        }
        $prix = "<div class='div-reduc'>$reduc$pourcent</div>$original";
        $livraison = "<p class='p-livraison'>Expédié sous ".substr($composition->delailivraison(), 0, 2)."h</p>";
        $description = "<td class='td-description'><div class='div-description'>$nom$prix$livraison</div></td>";

        // Quantités
        $disablelow = $quantite <= 1 ? "disabled" : "";
        $disablehigh = $quantite >= $composition->stock() ? "disabled" : "";
        $quantites = "<td class='td-quantite'><div class='div-quantite'>" .
                    "<button id='m$composition->idcomposition' class='button-quantite' onclick=\"m('$composition->idcomposition')\" $disablelow>-</button>" .
                    "<label id='q$composition->idcomposition' class='label-quantite'>$quantite</label>" .
                    "<button id='p$composition->idcomposition' class='button-quantite' onclick=\"p('$composition->idcomposition')\" $disablehigh>+</button>" .
                    "</div></td>";

        $suppr = "<td class='td-supprimer'><button id='d$composition->idcomposition' class='but-supprimer' onclick=\"d('$composition->idcomposition')\"><img src='/img/supprimer.png' alt=''></button></td>";
        $total = "<td class='td-total'><p id='t$composition->idcomposition' class='p-total prix'>".round($trueprice*$quantite, 2)."</p></td>";
        return "<tr class='tr-body'>$img$description$quantites$suppr$total</tr>";
    }

    public static function afficheLigneCookie($ligne) {
        // ligne produit = [[idproduit, idcouleur, quantite],]
        $coloration = Coloration::where('idproduit', '=', $ligne[0])
            ->where('idcouleur', '=', $ligne[1])->first();
        if (!$coloration) return "Erreur sur P:".$ligne[0]." C:".$ligne[1];
        $quantite = $ligne[2];
        return self::afficheLigne($coloration, $quantite);
    }

    public function index()
    {
        return view("panier");
    }

    public static function fixPanier() {
        $newPanier = array();
        foreach($_SESSION["panier"][0] as $panier) {
            if (count($panier) != 3) continue;
            $coloration = Coloration::where('idproduit', '=', $panier[0
                ])->where('idcouleur', '=', $panier[1])->first();
            if (!$coloration) continue;
            if ($panier[2] < 1 || $panier[2] > 99) continue;
            $newPanier[] = $panier;
        }
        $_SESSION["panier"][0] = $newPanier;
        foreach($_SESSION["panier"][1] as $key => $value) {
            $composition = CompositionProduit::find($key);
            if ($value < 1 || $value > 99 || !$composition)
                unset($_SESSION["panier"][1][$key]);
        }
    }

    public static function prixPanier($route = true, $panier = null) {
        $prix = 0;
        if ($panier === null) $panier = $_SESSION["panier"];
        foreach ($panier[0] as $ligne) {
            $coloration = Coloration::where('idproduit', '=', $ligne[0])
                ->where('idcouleur', '=', $ligne[1])->first();
            if (!$coloration) continue;
            $prix += $coloration->prix() * $ligne[2];
        }
        foreach ($panier[1] as $key => $value) {
            $composition = CompositionProduit::find($key);
            if (!$composition) continue;
            $prix += $composition->prix() * $value;
        }
        if ($route) return response()->json([
            "prixpanier" => round($prix, 2)]);
        return round($prix, 2);
    }

    public static function setLignePanier($idproduit, $idcouleur, $quantite) {
        $idproduit = intval($idproduit);
        $idcouleur = intval($idcouleur);
        $quantite = intval($quantite);
        $coloration = Coloration::where('idproduit', '=', $idproduit)
            ->where('idcouleur', '=', $idcouleur)->first();
        if (!$coloration) return response()->json([
            "message" => "P:$idproduit C:$idcouleur ; Objet inconnu"]);

        $quantMax = $coloration->quantitestock;
        if ($quantite > $quantMax) $quantite = $quantMax;
        $index = self::findIndexPanier($idproduit, $idcouleur);
        if ($index == -1) {
            if ($quantite <= 0) return response()->json(["message" => "Aucun ajout"]);
            $_SESSION["panier"][0][] = [$idproduit, $idcouleur, $quantite];
        }
        else {
            if ($quantite <= 0) {
                unset($_SESSION["panier"][0][$index]);
            }
            else {
                $_SESSION["panier"][0][$index][2] = $quantite;
            }
        }
        self::fixPanier();
        $cookie = self::cookie();

        $prixColoration = $coloration->prixsolde ?? $coloration->prixvente;
        $response = response()->json([
            "message" => $cookie[1],
            "idproduit" => $idproduit,
            "idcouleur" => $idcouleur,
            "quantite" => $quantite,
            "quantitemax" => $quantMax,
            "prix" => round($prixColoration,2),
            "prixligne" => round($prixColoration*$quantite,2),
            "prixpanier" => self::prixPanier(false)]);
        if ($cookie[0]) $response->cookie($cookie[0]);
        return $response;
    }

    public static function setLignePanierComp($idcomposition, $quantite) {
        $idcomposition = intval($idcomposition);
        $quantite = intval($quantite);
        $composition = CompositionProduit::find($idcomposition);
        if (!$composition) return response()->json([
            "message" => "Comp $idcomposition ; Objet inconnu"]);

        $quantMax = $composition->stock();
        if ($quantite > $quantMax) $quantite = $quantMax;
        if ($quantite > 0) {
            $_SESSION["panier"][1][$idcomposition] = $quantite;
        }
        else {
            if (!array_key_exists($idcomposition, $_SESSION["panier"][1]))
                return response()->json(["message" => "Aucun changement"]);
            unset($_SESSION["panier"][1][$idcomposition]);
        }
        self::fixPanier();
        $cookie = self::cookie();

        $prixComposition = $composition->prixsoldecomposition ?? $composition->prixventecomposition;
        $response = response()->json([
            "message" => $cookie[1],
            "idcomposition" => $idcomposition,
            "quantite" => $quantite,
            "quantitemax" => $quantMax,
            "prix" => round($prixComposition,2),
            "prixligne" => round($prixComposition*$quantite,2),
            "prixpanier" => self::prixPanier(false)]);
        if ($cookie[0]) $response->cookie($cookie[0]);
        return $response;
    }

    public static function cookie() {
        $consentement = CookieController::getCookie("cookieConsentement", false);
        if ($consentement && $consentement[1]) {
            $cookie = CookieController::setCookie("cookieConservationPanier", $_SESSION["panier"], 1, "mois", false);
        }
        else $cookie = null;
        return [$cookie, $cookie ? "Cookie 'cookieConservationPanier' mis à jour." : "Panier mis à jour."];
    }

    public static function addToPanier($idproduit, $idcouleur, $quantite) {
        $idproduit = intval($idproduit);
        $idcouleur = intval($idcouleur);
        $quantite = intval($quantite);
        $ligne = self::findLignePanier($idproduit, $idcouleur);
        $total = $ligne ? $ligne[2] : 0;
        $total += $quantite;
        return self::setLignePanier($idproduit, $idcouleur, $total);
    }

    public static function addToPanierComp($idcomposition, $quantite) {
        $idcomposition = intval($idcomposition);
        $quantite = intval($quantite);
        $total = key_exists($idcomposition, $_SESSION["panier"][1]) ? $_SESSION["panier"][1][$idcomposition] : 0;
        $total += $quantite;
        return self::setLignePanierComp($idcomposition, $total);
    }

    public static function findLignePanier($idproduit, $idcouleur) {
        $idproduit = intval($idproduit); $idcouleur = intval($idcouleur);
        foreach ($_SESSION["panier"][0] as $ligne) {
            if ($ligne[0] == $idproduit && $ligne[1] == $idcouleur) {
                return $ligne;
            }
        }
        return null;
    }

    public static function findIndexPanier($idproduit, $idcouleur) {
        $idproduit = intval($idproduit); $idcouleur = intval($idcouleur);
        $index = 0;
        foreach ($_SESSION["panier"][0] as $ligne) {
            if ($ligne[0] == $idproduit && $ligne[1]  == $idcouleur) {
                return $index;
            }
            $index++;
        }
        return -1;
    }
}

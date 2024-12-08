<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coloration;
use App\Http\Controllers\CookieController;

class PanierController extends Controller
{
    public static function afficheLigne($coloration, $quantite) {
        $id = $coloration->idproduit."-".$coloration->idcouleur;
        $photo = $coloration->getPhoto()->first();
        $produit = $coloration->getProduit();
        $nom = "<p class='p-name'>$produit->nomproduit</p>";

        // Photo
        if ($photo) {
            $source = $photo->sourcephoto;
            $desc = $photo->descriptionphoto;
        } // Si pas de photo, on prend la photo par défaut
        else {
            $source = "PLACEHOLDER.png";
            $desc = "Image par défaut";
        }
        $img = "<td class='td-article'><img src='/img/$source' alt='$desc'></td>";
        
        // Prix et réduction
        if (!$coloration->prixsolde) {
            $reduc = "<p class='p-price prix'>$coloration->prixvente</p>";
            $trueprice = $coloration->prixvente; $pourcent = ""; $original = "";
        }
        else {
            $trueprice = $coloration->prixsolde;
            $reduc = "<p class='p-price prix'>$coloration->prixsolde €</p>";
            $pourcent = "<div class='div-reduc-pourcent'><p class='p-pourcent'>-".round($coloration->getReduc(), 0)."%</p></div>";
            $original = "<p class='p-reduc prix'>au lieu de $coloration->prixvente</p>";
        }
        $prix = "<div class='div-reduc'>$reduc$pourcent</div>$original";
        $livraison = "<p class='p-livraison'>Expédié sous ".substr($produit->delailivraison, 0, 2)."h</p>";
        $description = "<td class='td-description'><div class='div-description'>$nom$prix$livraison</div></td>";

        // Quantités
        $disablelow = $quantite <= 1 ? "disabled" : "";
        $disablehigh = $quantite >= 99 ? "disabled" : "";
        $quantites = "<td class='td-quantite'><div class='div-quantite'>" .
                    "<button id='m$id' class='button-quantite' onclick=\"m('$id')\" $disablelow>-</button>" .
                    "<label id='q$id' class='label-quantite'>$quantite</label>" .
                    "<button id='p$id' class='button-quantite' onclick=\"p('$id')\" $disablehigh>+</button>" .
                    "</div></td>";

        $suppr = "<td class='td-supprimer'><button id='d$id' class='but-supprimer' onclick=\"d('$id')\"><img src='/img/supprimer.png' alt=''></button></td>";
        $total = "<td class='td-total'><p id='t$id' class='p-total prix'>".round($trueprice*$quantite, 2)."</p></td>";
        return "<tr class='tr-body'>$img$description$quantites$suppr$total</tr>";
    }


    public static function afficheLigneCookie($ligne) {
        // ligne = [idproduit, idcouleur, quantite]
        $coloration = Coloration::where('idproduit', '=', $ligne[0])
            ->where('idcouleur', '=', $ligne[1])->first();
        if (!$coloration) return "Erreur sur p".$ligne[0]." c".$ligne[1];
        $quantite = $ligne[2];
        return self::afficheLigne($coloration, $quantite);
    }

    public function index()
    {
        return view("panier", [
            "colorations" => Coloration::all(),
        ]);
    }

    public static function fixPanier() {
        $newPanier = array();
        foreach($_SESSION["panier"] as $panier) {
            if (count($panier) != 3) continue;
            $coloration = Coloration::where('idproduit', '=', $panier[0
                ])->where('idcouleur', '=', $panier[1])->first();
            if (!$coloration) continue;
            if ($panier[2] < 1 || $panier[2] > 99) continue;
            $newPanier[] = $panier;
        }
        $_SESSION["panier"] = $newPanier;
    }

    public static function prixLignePanier_($idproduit, $idcouleur, $quantite = null) {
        $idproduit = intval($idproduit); $idcouleur = intval($idcouleur);
        if (!$quantite) $quantite = self::findLignePanier($idproduit, $idcouleur)[2];
        $coloration = Coloration::where('idproduit', '=', $idproduit)
            ->where('idcouleur', '=', $idcouleur)->firstOrFail();
        if ($coloration->prixsolde) {
            return $coloration->prixsolde * $quantite;
        }
        return $quantite * $coloration->prixvente;
    }

    public static function prixLignePanier($idproduit, $idcouleur) {
        $prix = self::prixLignePanier_($idproduit, $idcouleur);
        $quant = self::findLignePanier($idproduit, $idcouleur)[2];
        return response()->json(["prix" => round($prix, 2), "quant" => $quant]);
    }

    public static function prixPanier() {
        $prix = 0;
        foreach ($_SESSION["panier"] as $ligne) {
            $prix += self::prixLignePanier_($ligne[0], $ligne[1], $ligne[2]);
        }
        return response()->json(["prix" => round($prix, 2)]);
    }

    public static function setLignePanier($idproduit, $idcouleur, $quantite) {
        $idproduit = intval($idproduit);
        $idcouleur = intval($idcouleur);
        $quantite = intval($quantite);
        $coloration = Coloration::where('idproduit', '=', $idproduit)
            ->where('idcouleur', '=', $idcouleur)->first();
        if (!$coloration) return response()->json([
            "message" => "p$idproduit c$idcouleur inconnu"]);
        $index = self::findIndexPanier($idproduit, $idcouleur);
        if ($index == -1) {
            if ($quantite <= 0) return;
            $_SESSION["panier"][] = [$idproduit, $idcouleur, $quantite];
        }
        else {
            if ($quantite <= 0) {
                unset($_SESSION["panier"][$index]);
            }
            else {
                if ($quantite > 99) $quantite = 99;
                $_SESSION["panier"][$index][2] = $quantite;
            }
        }
        self::fixPanier();
        // TODO: update le cookie ici
    }

    public static function addToPanier($idproduit, $idcouleur, $quantite) {
        $idproduit = intval($idproduit);
        $idcouleur = intval($idcouleur);
        $quantite = intval($quantite);
        $ligne = self::findLignePanier($idproduit, $idcouleur);
        $total = $ligne ? $ligne[2] : 0;
        $total += $quantite;
        self::setLignePanier($idproduit, $idcouleur, $total);
    }

    public static function findLignePanier($idproduit, $idcouleur) {
        $idproduit = intval($idproduit); $idcouleur = intval($idcouleur);
        foreach ($_SESSION["panier"] as $ligne) {
            if ($ligne[0] == $idproduit && $ligne[1] == $idcouleur) {
                return $ligne;
            }
        }
        return null;
    }

    public static function findIndexPanier($idproduit, $idcouleur) {
        $idproduit = intval($idproduit); $idcouleur = intval($idcouleur);
        $index = 0;
        foreach ($_SESSION["panier"] as $ligne) {
            if ($ligne[0] == $idproduit && $ligne[1]  == $idcouleur) {
                return $index;
            }
            $index++;
        }
        return -1;
    }
}

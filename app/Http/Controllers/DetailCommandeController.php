<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commande;
use App\Models\DetailCommande;
use App\Models\Produit;
use App\Models\Adresse;
use App\Models\Pays;
use App\Models\ville;
use App\Models\Coloration;
use Illuminate\Console\Command;


class DetailCommandeController extends Controller
{
    public static function getSuivi($commande){
        $statutCommande = $commande->getStatut();
        $class1 = null;
        $class2 = null;
        $class3 = null;
        $class4 = null;
        $class5 = null;

        $contentieux = null;
        echo "<div id='progress-statut'>";
        switch ($statutCommande->nomstatut) {
            case "Contentieux":
                $class1 = "etape-contentieux";
                $class2 = "etape-contentieux";
                $class3 = "etape-contentieux";
                $class4 = "etape-contentieux";
                $class5 = "all-colored-fail";
                $contentieux = "<div id='div-contentieux'><div class='etape $class4'><p class='p-statut'>Contentieux</p></div></div>";
                break;
            case "Devis":
                $class1 = "etape-success";
                $class2 = "etape-failed";
                $class3 = "etape-failed";
                $class4 = "etape-failed";
                break;
            case "En Attente de livraison":
                $class1 = "etape-success";
                $class2 = "etape-success";
                $class3 = "etape-failed";
                $class4 = "etape-failed";
                $class5 = "half-colored";
                break;
            case "Livrée":
                $class1 = "etape-success";
                $class2 = "etape-success";
                $class3 = "etape-success";
                $class4 = "etape-failed";
                $class5 = "all-colored";
                break;
        }
        echo "<div id='div-etape' class='$class5'>";
            echo "<div class='etape $class1'><p class='p-statut'>Devis</p></div>";
            echo "<div class='etape $class2'><p class='p-statut'>En attente de livraison</p></div>";
            echo "<div class='etape $class3'><p class='p-statut'>Livré</p></div>";
        echo "</div>";
        echo $contentieux;
        echo "</div>";
    }

    public static function getEntete($commande){
        $statutCommande = $commande->getStatut();
        $miliboo = '\\img\\logo_Miliboo_fr.svg';
        echo "<h3 id='h3-title-detail'>Suivi <strong>$commande->idcommande</strong></h3>" ;
        echo "<div id='info-commande'>";
        echo "<img class='Miliboologo' src=$miliboo alt=''>";
        $dateFormatee = date('d/m/Y', strtotime($commande->datecommande));
        echo "<p class='p-info-detail'><strong>Date de votre commande : $dateFormatee</strong></p>";
        echo "<p class='p-info-detail'><strong>Statut : </strong>$statutCommande->nomstatut</p>";
    }

    public static function getAdresse($adresse){
        $ville = $adresse->getVille();
        $client = $adresse->getClient();
        echo "<p class='p-info-detail'>$client->prenomclient $client->nomclient</p>";
        echo "<p class='p-info-detail'>$adresse->nomrue</p>";
        echo "<p class='p-info-detail'>$adresse->codepostaladresse $ville->nomville</p>";
    }

    public static function getDetailCommande($commande){
        $prixtotal = 0;
        $details = $commande->getDetailCommande();
        foreach($details as $detail){
            $coloration = Coloration::where([
                ['idproduit', '=', $detail->idproduit],
                ['idcouleur', '=', $detail->idcouleur]
            ])->first();
            $produit = $coloration->getProduit();
            $couleur = $coloration->getCouleur();
            $prix = $coloration->prixvente * $detail->quantitecommande;
            // dd($prix);
            $prixtotal += $prix;
            echo "<tr class='tr-body'>";
            echo "<td>$produit->nomproduit</td>";
            echo "<td>$couleur->nomcouleur</td>";
            echo "<td>$coloration->prixvente</td>";
            echo "<td>$detail->quantitecommande</td>";
            echo "<td>$prix</td>";
            echo "</tr>";
        }
        return $prixtotal;
    }
}

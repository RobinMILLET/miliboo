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
        $class6 = null;

        $contentieux = null;
        echo "<div id='progress-statut'>";
        switch ($statutCommande->nomstatut) {
            case "Contentieux":
                $class1 = "etape-contentieux";
                $class2 = "etape-contentieux";
                $class3 = "etape-contentieux";
                $class4 = "etape-contentieux";
                $class5 = "etape-contentieux";
                $class6 = "all-colored-fail";
                $contentieux = "<div id='div-contentieux'><div class='etape $class5'><p class='p-statut'>Contentieux</p></div></div>";
                break;
            case "Devis":
                $class1 = "etape-success";
                $class2 = "etape-failed";
                $class3 = "etape-failed";
                $class4 = "etape-failed";
                break;
            case "En Attente d'Expedition":
                $class1 = "etape-success";
                $class2 = "etape-success";
                $class3 = "etape-failed";
                $class4 = "etape-failed";
                $class6 = "first-colored";
                break;
            case "En Attente de Livraison":
                $class1 = "etape-success";
                $class2 = "etape-success";
                $class3 = "etape-success";
                $class4 = "etape-failed";
                $class6 = "second-colored";
                break;
            case "Livrée":
                $class1 = "etape-success";
                $class2 = "etape-success";
                $class3 = "etape-success";
                $class4 = "etape-success";
                $class6 = "all-colored";
                break;
        }
        echo "<div id='div-etape' class='$class6'>";
            echo "<div class='etape $class1'><p class='p-statut'>Devis</p></div>";
            echo "<div class='etape $class2'><p class='p-statut'>En attente d'expedition</p></div>";
            echo "<div class='etape $class3'><p class='p-statut'>En attente de livraison</p></div>";
            echo "<div class='etape $class4'><p class='p-statut'>Livré</p></div>";
        echo "</div>";
        echo $contentieux;
        echo "</div>";
    }

    public static function getEntete($commande){
        $statutCommande = $commande->getStatut();
        $transporteur = $commande->getTransporteur()->nomtransporteur;
        $miliboo = '\\img\\logo_Miliboo_fr.svg';
        echo "<h3 id='h3-title-detail'>Suivi <strong>$commande->idcommande</strong></h3>" ;
        echo "<div id='info-commande'>";
        echo "<img class='Miliboologo' src=$miliboo alt=''>";
        $dateFormatee = date('d/m/Y', strtotime($commande->datecommande));
        echo "<p class='p-info-detail'><strong>Date de votre commande : $dateFormatee</strong></p>";
        echo "<p class='p-info-detail'><strong>Statut : </strong>$statutCommande->nomstatut</p>";
        echo "<p class='p-info-detail'><strong>Organisme de livraison : </strong>$transporteur</p>";
    }

    public static function getAdresse($adresse){
        $ville = $adresse->getVille();
        $client = $adresse->getClient();
        echo "<p class='p-info-detail'>$client->prenomclient $client->nomclient</p>";
        echo "<p class='p-info-detail'>$adresse->nomrue</p>";
        echo "<p class='p-info-detail'>$adresse->codepostaladresse $ville->nomville</p>";
    }

    public static function getDetailCommande($commande){
        $details = $commande->getDetailCommande();
        foreach($details as $detail){
            $coloration = $detail->getColoration();
            $produit = $coloration->getProduit();
            $couleur = $coloration->getCouleur();
            echo "<tr class='tr-body'>";
            echo "<td><a href='/produit/idproduit$produit->idproduit/coloration$couleur->idcouleur' class='no'>$produit->nomproduit</a></td>";
            echo "<td>$couleur->nomcouleur</td>";
            echo "<td>".$coloration->prix()."</td>";
            echo "<td>$detail->quantitecommande</td>";
            echo "<td>".$coloration->prix() * $detail->quantitecommande." €</td>";
            echo "</tr>";
        }
    }

    public static function getCommandeComposition($commande){
        $details = $commande->getCommandeComposition();
        foreach($details as $detail){
            $composition = $detail->getCompositionProduit();
            echo "<tr class='tr-body'>";
            echo "<td><a href='detailcomposition/$composition->idcomposition' class='no'>$composition->nomcomposition</a></td>";
            echo "<td>Composition</td>";
            echo "<td>".$composition->prix()."</td>";
            echo "<td>$detail->quantitecompositioncommande</td>";
            echo "<td>".$composition->prix() * $detail->quantitecompositioncommande." €</td>";
            echo "</tr>";
        }
    }
}

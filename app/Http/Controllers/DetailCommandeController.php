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
    public static function getEntete($commande){
        $statutCommande = $commande->getStatut();
        $miliboo = '\\img\\logo_Miliboo_fr.svg';
        echo "<h3 id='h3-title-detail'>Suivi <strong>$commande->idcommande</strong></h3>" ;
        echo "<div id='info-commande'>";
        echo "<img class='Miliboologo' src=$miliboo alt=''>";
        echo "<p class='p-info-detail'><strong>Date de votre commande : $commande->datecommande</strong></p>";
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

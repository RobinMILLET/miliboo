<?php

namespace App\Http\Controllers;
use App\Models\Client;
use Illuminate\Http\Request;
use App\Models\Paiement;
use App\Models\StatutCommande;

class CommandeController extends Controller
{
    public static function getCommande($client){
        $commandes = $client->getCommande();
        
        if(count($commandes) == 0){
            echo "<p>Vous n'avez pas effectué de commande</p>";
        }else{
            echo "<tr class='tr'>";
                echo "<th>Numéro commande</th>";
                echo "<th>Date</th>";
                echo "<th>Montant</th>";
                echo "<th>Statut</th>";
                echo"<th>Détails</th>";
            echo "</tr>";
            echo "<tbody>";
        
            foreach($commandes as $commande){
                echo "<tr class='tr-body'>";
                echo "<td>$commande->idcommande</td>";
                echo "<td>$commande->datecommande</td>";
                $paiement = $commande->getPaiement();
                echo "<td>$paiement->montantpaiement €</td>";
                $statut = $commande->getStatut();
                echo "<td>$statut->nomstatut</td>";
                echo "<td><a class='a-detail' href=" . route('detailcommande', ['id' => $commande->idcommande]) . "><button class='button-detail'>Voir le détail</button></a></td>";
                echo "</tr>";
            }
            echo "</tbody>"; 
        }
    }
}

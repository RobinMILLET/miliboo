<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Paiement;
use App\Models\StatutCommande;
use App\Models\Coloration;
class EspaceClientController extends Controller
{
    public static function getPointFidelelite($client){
        $points = $client->pointfideliteclient;
        $reduc = $points*0.5;
        echo "<p class='p-info'>Vous possédez $points points de fidélité soit : $reduc €</p>";
    }
}


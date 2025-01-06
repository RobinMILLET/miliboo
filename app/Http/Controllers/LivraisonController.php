<?php

namespace App\Http\Controllers;

use App\Models\Transporteur;
use Illuminate\Http\Request;

class LivraisonController extends Controller
{
    public function index()
    {
        if (!$_SESSION["client"]) return redirect('/compte');
        return view("etapelivraison");
    }

    public static function echoOptionsLivr() {
        $options = Transporteur::all();
        foreach ($options as $option) {
            echo "<option value='$option->idtransporteur'>$option->nomtransporteur</option>";
        }
    }

    public static function echoOptionsAdr() {
        $client = $_SESSION["client"];
        foreach ($client->getAdresse() as $adr) {
            if ($adr->nomadresse === "") continue;
            if ($adr->nomadresse === null) {
                echo "<option value='$adr->idadresse' selected>Adresse par défaut</option>";
            }
            else {
                echo "<option value='$adr->idadresse'>$adr->nomadresse</option>";
            }
        }
    }
}

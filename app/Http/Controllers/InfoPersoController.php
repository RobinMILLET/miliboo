<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Adresse;
use App\Models\Pays;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class InfoPersoController extends Controller
{
    public static function getInfoPerso(){
        $client = $_SESSION["client"];
        echo "<div id='div-info-perso'>";
        echo "<h3 id='title-info-perso'>Mes informations personnelles</h3>";
        echo "<div id='content-info-perso'>";
            echo "<div class='adresse-section'>";
                echo "<div class='header-adresse'>";
                    echo "<p>Adresse de facturation</p>";
                    echo "<button class='button' id='button-modif-perso'>Modifier</button>";
                echo "</div>";
                $adresse = $client->getAdresse();
                $pays = $adresse->getPays();
                echo "<p class='p-info-perso'>$client->nomclient $client->prenomclient</p>";
                echo "<br>";
                echo "<p class='p-info-perso'>$adresse->nomadresse</p>";
                echo "<p class='p-info-perso'>$adresse->codepostaladresse $adresse->ville</p>";
                echo "<p class='p-info-perso'>$pays->nompays</p>";
            echo "</div>";
            echo "<div class='adresse-section'>";
                echo "<div class='header-adresse' id='header-livraison'>";
                    echo "<p>Mes adresse de livraison</p>";
                    echo "<button class='button'>Ajouter une adresse</button>";
                echo "</div>";
                echo "<div class='adresse'>";
                    echo "<p class='p-info-perso'>Mon adresse</p>";
                    echo "<p class='p-info-perso'>$client->nomclient $client->prenomclient</p>";
                    echo "<div>";
                       echo " <div class='adresse-info'>";
                            echo "<div>";
                                $adresse = $client->getAdresse();
                                $pays = $adresse->getPays();
                                echo "<p class='p-info-perso'>$adresse->nomadresse</p>";
                                echo "<p class='p-info-perso'>$adresse->codepostaladresse $adresse->ville</p>";
                                echo "<p class='p-info-perso'>$pays->nompays</p>";
                            echo "</div>";
                            echo "<button class='button' id='button-adresse'>Modifier</button>";
                        echo "</div>";
                    echo "</div>";
                echo "</div>";
            echo "</div>";
        echo "</div>";
    echo "</div>";
    }
    
    public static function tryChangeMdp(Request $request) {
        $request->validate([
            'ancienmdp' => 'required|string',
            'password' => 'required|string']);
        if (!$_SESSION["client"]->checkPassword($request->ancienmdp)) {
            return redirect()->back()->with('error', "mdp");
        }
        $_SESSION["client"]->hashmdp = Hash::make($request->password);
        $_SESSION["client"]->save();
        return redirect()->route("espaceclient");
    }

    public static function tryModifInfo(Request $request) {
        $request->validate([
            'civilite' => 'nullable|string',
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'adresse' => 'required|string',
            'pays' => 'required|string',
            'cp' => 'required|string',
            'ville' => 'required|string',
            'telfixe' => 'nullable|string',
            'inputtelfixe' => 'nullable|string',
            'telportable' => 'required|string',
            'inputtelportable' => 'required|string'
        ]);
        $client  = array();
        $adr = array();

        $exit = CreationCompteController::extractRequest($request, $client, $adr);
        if ($exit) return $exit;

        DB::beginTransaction();
        try {
            $_SESSION["client"]->update($client);
            $adr["iddepartement"] = substr($adr["codepostaladresse"], 0, 2);
            $adresse = $_SESSION["client"]->getAdresse();
            $adresse->update($adr);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            Log::alert("erreur SQL sur création :", [$client, $adr, $e]);
            return redirect()->back()->with("error", "mod");
        }
        return redirect()->route("espaceclient");
    }

    public static function getInfos() {
        $client = $_SESSION["client"];
        $adresse = $client->getAdresse();
        $ville = $adresse->getVille();
        $rue = $adresse->numerorue. " " .$adresse->nomrue;
        return array(
            $client->civiliteclient == null ? " selected" : "",
            $client->civiliteclient == "H" ? " selected" : "",
            $client->civiliteclient == "F" ? " selected" : "",
            $client->nomclient,
            $client->prenomclient,
            $rue,
            $adresse->codepostaladresse,
            $ville->nomville,
            $client->telfixeclient ? "value=".substr($client->telfixeclient,2) : "",
            $client->telportableclient ? "value=".substr($client->telportableclient,2) : ""
        );
    }
}

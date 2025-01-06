<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Adresse;
use App\Models\Pays;
use Illuminate\Database\Eloquent\Collection;
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
                    echo "<p>Mes informations générales</p>";
                    echo "<button class='button' id='button-modif-perso'>Modifier</button>";
                echo "</div>";
                $adresse = $client->getAdresse()->first();
                $pays = $adresse->getPays();
                $ville = $adresse->getVille();
                switch ($client->civiliteclient) {
                    case 'H': $civilite = "Mr. "; break;
                    case 'F': $civilite = "Mme. "; break;
                    default: $civilite = ""; break;
                }
                $fixe = $client->telfixeclient ? ["+", " | "] : ["", ""];
                echo "<p class='p-info-perso'>$civilite $client->nomclient $client->prenomclient</p>";
                echo "<br>";
                echo "<p class='p-info-perso'>$adresse->numerorue $adresse->nomrue, $adresse->codepostaladresse $ville->nomville, $pays->nompays</p>";
                echo "<br>";
                echo "<p class='p-info-perso'>$fixe[0]$client->telfixeclient$fixe[1]+$client->telportableclient</p>";
            echo "</div>";
            echo "<div class='adresse-section'>";
                echo "<div class='header-adresse' id='header-livraison'>";
                    echo "<p>Mes adresses</p>";
                    echo "<button class='button' id='button-ajout-adresse'>Ajouter une adresse</button>";
                echo "</div>";
                self::echoAdresses($client);
            echo "</div>";
        echo "</div>";
    echo "</div>";
    }

    public static function echoAdresses(Client $client) {
        $adresses = $client->getAdresse()->whereNotNull("nomadresse")->where('nomadresse', "!=", "");
        foreach ($adresses as $adr) {
            echo "<div class='adresse'>";
                echo "<p class='p-info-perso'>$adr->nomadresse</p>";
                echo "<div>";
                    echo " <div class='adresse-info'>";
                        echo "<div>";
                            $pays = $adr->getPays();
                            $ville = $adr->getVille();
                            echo "<p class='p-info-perso'>$adr->numerorue $adr->nomrue, $adr->codepostaladresse $ville->nomville, $pays->nompays</p>";
                        echo "</div>";
                    echo "</div>";
                    echo "<br>";
                    echo "<button class='button' id='button-adresse' onclick='window.location.href=\"/delAdr/$adr->idadresse\"'>Supprimer</button>";
                echo "</div>";
            echo "</div>";
        }
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

        $exit = CreationCompteController::extractClient($request, $client);
        if ($_SESSION["client"]["telportableclient"] != $client['telportableclient']) {
            $client["telveriftoken"] = null;
            $client["telverifdate"] = null;
            $_SESSION["client"]->telveriftoken = null;
            $_SESSION["client"]->telverifdate = null;
        }
        if ($exit) return $exit;
        $exit = CreationCompteController::extractAdr($request, $adr);
        if ($exit) return $exit;

        DB::beginTransaction();
        try {
            $_SESSION["client"]->update($client);
            $adr["iddepartement"] = substr($adr["codepostaladresse"], 0, 2);
            $adresse = $_SESSION["client"]->getAdresse()->first();
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
        $adresse = $client->getAdresse()->first();
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

    public static function collectionArray(Collection $collection, $attribute) {
        $array = [];
        foreach ($collection as $item) {
            $array[] = $item->$attribute;
        }
        return $array;
    }

    public static function collectionCompleteArray(Collection $collection) {
        $array = [];
        foreach ($collection as $item) {
            $array[] = $item->completeArray();
        }
        return $array;
    }

    public static function clientJson(Request $request) {
        $client = $_SESSION["client"];
        if (!$client) return redirect()->route("compte");
        echo "<button onclick='window.location.href=\"/infoperso\"'>Retour</button><br>";
        echo json_encode($client->completeArray());
    }

    public static function clientAnonym($confirm) {
        if ($confirm != "NoReallyDeleteMyAccountNow")
            return redirect()->route("infoperso");
        $client = $_SESSION["client"];
        if (!$client) return redirect()->route("compte");
        $client->anonym();
        return redirect()->route("homepage");
    }

    public static function delAdr($id) {
        $client = $_SESSION["client"];
        if (!$client) return redirect()->route("compte");
        $adr = Adresse::find($id);
        if (!$adr) return redirect()->route("infoperso");
        if ($adr->idclient != $client->idclient)
            return redirect()->route("infoperso");
        DB::beginTransaction();
        try {
            $adr->anonym();
            $adr->save();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            Log::alert("erreur SQL sur rm adr :", [$client, $adr, $e]);
            return redirect()->back()->with("error", "rm");
        }
        return redirect()->route("infoperso");
    }

    public static function addAdr(Request $request) {
        $client = $_SESSION["client"];
        if (!$client) return redirect()->route("compte");
        $request->validate([
            'nomadr' => 'required|string',
            'adresse' => 'required|string',
            'pays' => 'required|string',
            'cp' => 'required|string',
            'ville' => 'required|string',
        ]);
        $adr = array();
        $exit = CreationCompteController::extractAdr($request, $adr);
        if ($exit) return $exit;
        $adr["nomadresse"] = $request->nomadr;
        DB::beginTransaction();
        try {
            $adr["idclient"] = $client->idclient;
            $adr["iddepartement"] = substr($adr["codepostaladresse"], 0, 2);
            $newAdr = Adresse::create($adr);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            Log::alert("erreur SQL sur ajout adr :", [$client, $adr, $e]);
            return redirect()->back()->with("error", "addadr");
        }
        return redirect()->back();
    }
}

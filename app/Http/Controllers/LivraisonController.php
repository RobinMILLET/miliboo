<?php

namespace App\Http\Controllers;

use App\Models\Adresse;
use App\Models\Transporteur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LivraisonController extends Controller
{
    public static $PRIXASSURANCE = 69;
    public static $PRIXEXPRESS = 42;

    public function index()
    {
        if (!$_SESSION["client"]) return redirect('/compte');
        return view("etapelivraison", ['prixassurance' => self::$PRIXASSURANCE, 'prixexpress' => self::$PRIXEXPRESS]);
    }

    public function redirect(Request $request)
    {
        $request->validate([
            "idadressefact" => 'required|string',
            "idadresselivr" => 'required|string',
            "idtransporteur" => 'required|string',
            "assurance" => 'nullable|string',
            "express" => 'nullable|string',
            "instruct" => 'nullable|string',
            "usefidel" => 'nullable|string'
        ]);
        $adresseFact = Adresse::find($request->idadressefact);
        $adresseLivr = Adresse::find($request->idadresselivr);
        $transporteur = Transporteur::find($request->idtransporteur);
        if (!$adresseFact || !$adresseLivr || !$transporteur)
            return redirect()->back()->with("error", "data");
        $_SESSION["adresseFact"] = $adresseFact;
        $_SESSION["adresseLivr"] = $adresseLivr;
        $_SESSION["transporteur"] = $transporteur;
        $_SESSION["assurance"] = isset($request->assurance);
        $_SESSION["express"] = isset($request->express);
        $_SESSION["instruct"] = $request->instruct ?? null;
        $_SESSION["usefidel"] = isset($request->usefidel);
        return redirect()->route('paiement');
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

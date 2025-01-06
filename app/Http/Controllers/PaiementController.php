<?php

namespace App\Http\Controllers;

use App\Models\CarteBancaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PaiementController extends Controller
{
    public function index()
    {
        if (!$_SESSION["client"]) return redirect('/compte');
        return view("paiement");
    }

    public function onlyNum($str, $len) {
        if (strlen($str) !== $len) return false;
        return ctype_digit($str);
    }

    public function paieCB(Request $request) {
        $client = $_SESSION["client"];
        if (!$client) return redirect()->route("compte");
        // TODO:
        return;
        $request->validate([
            'nom' => 'nullable|string',
            'num' => 'required|string',
            'mois' => 'required|string',
            'an' => 'required|string',
            'crypt' => 'required|string',
            'save' => 'nullable|string',
        ]);
        $card = array();
        $card["nomcartebancaire"] = $request->input('nom') ?? $client->nomclient . " ". $client->prenomclient;
        $card["numcartebancaire"] = preg_replace('/[\s-]/', '', $request->input('num'));
        if (!self::onlyNum($card["num"], 16)) return redirect()->back()->with("error", "num");
        $mois = $request->input('mois');
        if (!self::onlyNum($mois, 2)) return redirect()->back()->with("error", "mois");
        $an = $request->input('an');
        if (!self::onlyNum($an, 2)) return redirect()->back()->with("error", "an");
        $date = new \DateTime();
        $date->setDate(intval($an), intval($mois), 1);
        $card["dateexpirationcarte"] = $date;
        $crypt = $request->input('crypt');
        if (!self::onlyNum($crypt, 3)) return redirect()->back()->with("error", "crypt");
        $save = $request->input('save') ?? false;
        if ($save && !$request->input('nom')) return redirect()->back()->with("error", "nom");
        $card["dateenregistrement"] = now();
        $card["idclient"] = $client->idclient;
        DB::beginTransaction();
        try {
            if ($save) {
                $newCard = CarteBancaire::create($card);
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            Log::alert("erreur SQL sur svg carteBC :", [$client, $card, $e]);
            return redirect()->back()->with("error", "create");
        }
        return redirect()->route("espaceclient");
    }
}

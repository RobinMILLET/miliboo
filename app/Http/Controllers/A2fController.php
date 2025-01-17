<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class A2fController extends Controller
{
    public function index() {
        if (!isset($_SESSION["a2f"]) || !$_SESSION["a2f"] || $_SESSION["client"])
            return redirect()->route('compte');
        $exit = self::a2fSend(false);
        if ($exit) return $exit;
        return view('a2f');
    }

    public static function a2fSend($warnTime = true) {
        $client = $_SESSION["a2f"];
        if (!$client || !$client->a2f || $_SESSION["client"])
            return redirect()->route('compte');
        $client->checkTokens();
        if ($client->a2ftoken)
            if ($warnTime) return view('a2f')->with('error', 'time');
            else return view('a2f');
        $token = bin2hex(random_bytes(3));
        $expir = now()->addMinutes(5);
        try {
            $sms = new SmsController(
                "Votre code d'authentification miliboo est ".$token,
                "+".$client->telportableclient
            );
            $client->a2ftoken = $token;
            $client->a2fexpir = $expir;
            $client->save();
            return view('a2f');
        }
        catch (\Exception $e) {
            Log::alert("Erreur lors de l'envoi d'un sms : ", [$e]);
            return view('a2f')->with('error', 'send');
        }
    }

    public static function a2fLogin(Request $request) {
        $client = $_SESSION["a2f"];
        if (!$client || !$client->a2f || $_SESSION["client"])
            return redirect()->route('compte');
        $request->validate([
            "token" => "required|string"
        ]);
        $client->checkTokens();
        if ($client->a2ftoken && $client->a2ftoken == $request->token) {
            $_SESSION["a2f"] = null;
            $_SESSION["client"] = $client;
            $client->a2ftoken = null;
            $client->a2fexpir = null;
            $client->save();
            if (isset($_SESSION["remember"]) && $_SESSION["remember"]) {
                $cookie = LoginController::remember($client);
                return redirect()->route('espaceclient')->cookie($cookie);
            }
            return redirect()->route('espaceclient');
        }
        return view('a2f')->with('error', 'token');
    }
}

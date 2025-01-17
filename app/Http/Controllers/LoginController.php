<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\CookieController;

class LoginController extends Controller
{
    public function index() {
        if ($_SESSION["client"]) return redirect('/espaceclient');
        return view('compte');
    }

    public function tryLogin(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
            'remember' => 'nullable|string',
        ]);
        $client = Client::auth($request->email, $request->password);
        if ($client === null) {
            $_SESSION["client"] = null;
            return redirect()->back()->with('error', "login");
        }
        if ($client->a2f) {
            $_SESSION["a2f"] = $client;
            $_SESSION["remember"] = $request->remember;
            return redirect()->route('a2f');
        }
        $_SESSION["client"] = $client;
        $cookie = null;
        if ($request->remember) {
            $cookie = self::remember($client);
        }
        if ($cookie) return redirect('/espaceclient')->withCookie($cookie);
        return redirect('/espaceclient');
    }

    public static function remember($client) {
        if ($client->remembertoken === null) {
            $token = bin2hex(random_bytes(128));
            $client->remembertoken = $token;
            $client->limitetoken = now()->addMonths(2);
            $client->save();
        }
        $data = array($client->emailclient, $client->remembertoken);
        return CookieController::setCookie('cookieIdSecurite', $data, 2, "mois", false);
    }

    public static function tryLoginByToken($email, $token) {
        $client = Client::loginByToken($email, $token);
        if (!$client) {
            CookieController::delCookie("cookieIdSecurite", false);
        }
        return $client;
    }

    public static function logOut() {
        $_SESSION["client"] = null;
        $cookie = CookieController::delCookie("cookieIdSecurite", false);
        return redirect('/compte')->cookie($cookie);
    }

    public static function createForm(Request $request) {
        $request->validate([
            'email' => 'required|email'
        ]);
        $client = Client::getByEmail($request->email);
        if ($client) return redirect()->back()->with('error', "create");
        return redirect('creationcompte')->with('email', $request->email);
    }

    public static function resetPassword(Request $request) {
        $request->validate([
            'email' => 'required|email',
        ]);
        $client = Client::getByEmail($request->email);
        if (!$client) return redirect()->back()->with('error', "client");
        $client->checkTokens();
        if ($client->resetmdptoken) {
            return redirect()->back()->with('error', "time");
        }
        $client->resetmdptoken = bin2hex(random_bytes(32));
        $client->resetmdpexpir = now()->addMinutes(5);
        $client->save();

        $data = [
            'prenomclient' => $client->prenomclient,
            'nomclient' => $client->nomclient,
            'emailclient' => $client->emailclient,
            'id' => $client->idclient,
            'token' => $client->resetmdptoken,
        ];

        $mail = new MailController("Mot de passe oublié", "mail.resetmdpmail", $data);
        $mail->sendTo($client->emailclient);
        return redirect()->route('modifmdp');
    }

    public static function loginByReset($id, $token) {
        $client = Client::find($id);
        if (!$client) return redirect()->route('reset')->with('error', "client");
        $client->checkTokens();
        if (!$client->resetmdptoken || $client->resetmdptoken != $token)
            return redirect()->route('reset')->with('error', "token");
        $_SESSION["client"] = $client;
        $client->resetmdptoken = null;
        $client->resetmdpexpir = now()->addMinutes(15);
        $client->save();
        return redirect()->route('modifmdp');
    }
}

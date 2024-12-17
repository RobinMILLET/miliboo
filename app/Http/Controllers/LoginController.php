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
        return redirect('/compte');
    }

    public static function createForm(Request $request) {
        $request->validate([
            'email' => 'required|email'
        ]);
        $client = Client::where('emailclient', $request->email)->first();
        if ($client) return redirect()->back()->with('error', "create");
        return redirect('creationcompte')->with('email', $request->email);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class CookieController extends Controller
{
    private static $unites = [
        0.1666666666 => ["s", "sec", "secs", "second", "seconds"],
        1 => ["m", "mn", "min", "mins", "minute", "minutes"],
        60 => ["h", "hr", "hrs", "hour", "hours", "heur", "heurs", "heure", "heures"],
        1440 => ["d", "day", "days", "j", "jour", "jours"],
        10080 => ["w", "week", "weeks", "S", "sem", "semaine", "semaines"],
        43200 => ["M", "month", "months", "mois"],
        525600 => ["Y", "year", "years", "an", "ans", "annee", "annees"]
    ];

    public static function convertir($duree, $unite) {
        if (!$unite) return $duree;
        foreach (self::$unites as $key => $value) {
            if (in_array($unite, $value)) {
                return $duree * $key;
            }
        }
        if (!ctype_lower($unite)) {
            return self::convertir($duree, strtolower($unite));
        }
        return $duree;
    }

    public static function setCookie($cle, $valeur, $duree, $unite = null) {
        $valeur = json_encode($valeur);
        $duree = self::convertir($duree, $unite);
        $cookie = Cookie::make($cle, $valeur, $duree);
        return response()->json(["message" => "Cookie '".$cle."' mis à jour."])->cookie($cookie);
    }

    public static function getCookie($cle, $route = false) {
        $valeur = Cookie::get($cle);
        $valeur = json_decode($valeur, true);
        if (!$route) return $valeur;
        return response()->json(["message" => "Cookie '".$cle."' récupéré.", "valeur" => $valeur]);
    }

    public static function delCookie($cle)
    {
        Cookie::queue(Cookie::forget($cle));
        return response()->json(["message" => "Cookie '".$cle."' supprimé."]);
    }
}

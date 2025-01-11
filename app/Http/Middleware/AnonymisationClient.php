<?php

namespace App\Http\Middleware;

use App\Http\Controllers\CookieController;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Cookie;
use App\Http\Controllers\LoginController;
use App\Models\Client;
use DateInterval;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Log;
use App\Models\CarteBancaire;

class AnonymisationClient
{
    private static $delaiEnAnnee = 2;

    public function handle(Request $request, Closure $next)
    {
        $clients = Client::where("nomclient", "!=", "");
        foreach ($clients as $client) {
            if ($client->derniereutilisation < date_sub(now(), new DateInterval("P".self::$delaiEnAnnee."Y"))) {
                $client->anonym();
            }
        }
        $cb = CarteBancaire::where("dateexpirationcarte", "<", now())->get();
        Log::alert("Anonymisation de ".$cb->count()." cartes bancaires expirées.");
        Log::alert("!!! anonymisation CB automatique désactive (Middleware/AnonymisationClient/31) !!!.");
        //$cb->map->anonym();
        return $next($request);
    }
}

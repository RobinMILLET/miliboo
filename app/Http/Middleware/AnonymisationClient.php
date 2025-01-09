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

class AnonymisationClient
{
    private static $delaiEnAnnee = 2;

    public function handle(Request $request, Closure $next)
    {
        $clients = Client::all()->where("nomclient", "!=", "");
        foreach ($clients as $client) {
            if ($client->derniereutilisation < date_sub(now(), new DateInterval("P".self::$delaiEnAnnee."Y"))) {
                $client->anonym();
            }
        }
        return $next($request);
    }
}

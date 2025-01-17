<?php

namespace App\Http\Middleware;

use App\Http\Controllers\CookieController;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Cookie;
use App\Http\Controllers\LoginController;
use App\Models\Client;
use Illuminate\Auth\Events\Login;

class InitializeClient
{
    public function handle(Request $request, Closure $next)
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if (!isset($_SESSION["client"])) {
            $_SESSION["client"] = null;
            $cookie = CookieController::getRequestCookie($request, "cookieIdSecurite"); //array(email, token)
            if ($cookie) {
                $_SESSION["client"] = LoginController::tryLoginByToken($cookie[0], $cookie[1]);
            }
        }
        else if ($_SESSION["client"]) {
            // Update client if it changed
            $_SESSION["client"] = Client::find($_SESSION["client"]->idclient);
            if ($_SESSION["client"]->nomclient == "") {
                LoginController::logOut();
            }
            else {
                $_SESSION["client"]->derniereutilisation = now();
                $_SESSION["client"]->save();
            }
        }
        return $next($request);
    }
}

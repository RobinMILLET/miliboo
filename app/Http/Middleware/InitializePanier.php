<?php

namespace App\Http\Middleware;

use App\Http\Controllers\CookieController;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Log;


class InitializePanier
{
    public function handle(Request $request, Closure $next)
    {
        $connected = $_SESSION['client'] ?? null;

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if (!isset($_SESSION["panier"]) || !$_SESSION["panier"]) {
            $cookie = CookieController::getRequestCookie($request, "cookieConservationPanier");
            if ($connected) {
                if ($cookie) {
                    $_SESSION["panier"] = $cookie; // fusion panier avec db ?
                }
                else {
                    $_SESSION["panier"] = array(array(),array()); // récup panier depuis db ?
                }
            }
            else {
                if ($cookie) {
                    $_SESSION["panier"] = $cookie;
                }
                else {
                    $_SESSION["panier"] = array(array(),array());
                }
            }
        }

        return $next($request);
    }
}

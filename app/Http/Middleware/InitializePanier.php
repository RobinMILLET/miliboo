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
        if (!isset($_SESSION["panier"])) {
            $cookie = CookieController::getRequestCookie($request, "cookieConservationPanier");
            if ($connected) {
                if ($cookie) {
                    // Fusion paniers
                }
                else {
                    $_SESSION["panier"] = null;
                }
            }
            else {
                if ($cookie) {
                    $_SESSION["panier"] = json_decode($cookie, true);
                }
                else {
                    $_SESSION["panier"] = array();
                }
            }
        }

        return $next($request);
    }
}

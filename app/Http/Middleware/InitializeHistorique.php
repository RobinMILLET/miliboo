<?php

namespace App\Http\Middleware;

use App\Http\Controllers\CookieController;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Cookie;


class InitializeHistorique
{
    public function handle($request, Closure $next)
    {
        $connected = false; // Si utilisateur connecté

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if (!isset($_SESSION["historiqueConsultation"])) {
            $cookie = Cookie::get("cookieDernieresConsultations");
            if ($connected) {
                if ($cookie) {
                    // 
                }
                else {
                    $_SESSION["historiqueConsultation"] = null;
                }
            }
            else {
                if ($cookie) {
                    $_SESSION["historiqueConsultation"] = json_decode($cookie, true);
                }
                else {
                    $_SESSION["historiqueConsultation"] = array();
                }
            }
        }

        return $next($request);
    }
}

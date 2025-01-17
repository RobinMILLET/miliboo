<?php

namespace App\Http\Middleware;

use App\Http\Controllers\CookieController;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Cookie;


class InitializeHistorique
{
    public function handle(Request $request, Closure $next)
    {
        $connected = $_SESSION['client'] ?? null;

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if (!isset($_SESSION["historiqueConsultation"]) ||
                $_SESSION["historiqueConsultation"] == null) {
            $cookie = $request->cookie("cookieDernieresConsultations");
            if ($connected) {
                if ($cookie) {
                    $_SESSION["historiqueConsultation"] = json_decode($cookie, true);
                }
                else {
                    $_SESSION["historiqueConsultation"] = array();
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

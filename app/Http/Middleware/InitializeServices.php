<?php

namespace App\Http\Middleware;

use App\Http\Controllers\CookieController;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Cookie;
use App\Http\Controllers\LoginServicesController;
use App\Models\Client;
use App\Models\ServiceMiliboo;
use Illuminate\Auth\Events\Login;

class InitializeServices
{
    public function handle(Request $request, Closure $next)
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION["admin"])) {
            $_SESSION["admin"] = null;

            $rememberToken = $request->cookie('admin_remember_token');
            if ($rememberToken) {
                $admin = ServiceMiliboo::where('remembertoken', $rememberToken)->first();
                if ($admin) {
                    $_SESSION['admin'] = $admin;
                }
            }
        }

        return $next($request);
    }
}

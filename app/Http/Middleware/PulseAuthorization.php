<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PulseAuthorization
{
    public function handle(Request $request, Closure $next): Response
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION["admin"]) || $_SESSION["admin"] === null) {
            abort(403, 'Unauthorized access to Pulse dashboard');
        }

        return $next($request);
    }
}

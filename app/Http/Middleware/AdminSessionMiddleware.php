<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminSessionMiddleware
{
        public function handle(Request $request, Closure $next)
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['admin']) || $_SESSION['admin'] === null) {
            return redirect('/admin/login');
        }

        return $next($request);
    }
}

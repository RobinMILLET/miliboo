<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;

class LogRequests
{
    public function handle($request, Closure $next)
    {
        //Log::info('Request URL: ' . $request->fullUrl());
        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerifyIsUserMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->email !== "admin@admin.com") {
            return $next($request);
        }
        abort(403, "You are not authorized to access this page.");
    }
}

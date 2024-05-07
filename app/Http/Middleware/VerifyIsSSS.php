<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerifyIsSSS
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user() && Auth::user()->role->value === 3) {
            return $next($request);
        }
        abort(403, "You are not authorized to access this page.");
    }
}

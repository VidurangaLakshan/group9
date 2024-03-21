<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerifyIsAdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user() && Auth::user()->email === "admin@admin.com") {
            return $next($request);
        }
        abort(403, "You are not authorized to access this page.");
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user() && (Auth::user()->role->value == 1 || Auth::user()->role->value == 4 || (Auth::user()->role->value == 7 && Auth::user()->degree_level == 6) || (Auth::user()->role->value == 7 && Auth::user()->degree_level == 7) || (Auth::user()->role->value == 7 && Auth::user()->degree_level == 8) || (Auth::user()->role->value == 7 && Auth::user()->degree_level == 9) || (Auth::user()->role->value == 7 && Auth::user()->degree_level == 10))) {
            return $next($request);
        }
        abort(404);
    }
}

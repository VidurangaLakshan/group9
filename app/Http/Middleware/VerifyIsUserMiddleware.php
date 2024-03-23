<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerifyIsUserMiddleware
{
    public function handle(Request $request, Closure $next)
    {
//        if (auth()->user()->role->name === "Student") {
//            return $next($request);
//        }

        if (auth()->user()->role->value === 6 && auth()->user()->approved == 1) {

            return $next($request);

        } elseif (auth()->user()->role->value === 5) {

            return $next($request);

        } elseif (auth()->user()->role->value === 4) {

            return $next($request);

        } elseif (auth()->user()->role->value === 3) {

            return $next($request);
        }
            else {
                abort(403, "You are not authorized to access this page.");
            }
    }
}

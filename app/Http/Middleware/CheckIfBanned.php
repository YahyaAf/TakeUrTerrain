<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckIfBanned
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->banned === 1) {
            return response()->view('banneds.banned');
        }

        return $next($request);
    }
}

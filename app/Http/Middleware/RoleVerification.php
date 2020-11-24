<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleVerification
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ( Auth::check() && ((Auth()->user()->role === 'professor') || (Auth()->user()->role === 'director')) ) {
            return $next($request);
        } else {
            return abort(404);
        }
    }
}

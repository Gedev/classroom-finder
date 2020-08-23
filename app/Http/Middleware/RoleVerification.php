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
        if (Auth::check() && ((auth()->user()->role == 'professor') || (auth()->user()->role == 'director'))) {
            return $next($request);
        } else {
            return redirect()->route('welcome');
        }
    }
}

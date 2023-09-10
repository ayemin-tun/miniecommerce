<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class checkAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->user()->role == 'admin' || auth()->user()->role == 'superadmin') {
            return $next($request);
        } else {
            return redirect()->route('home')->with('superadmin-error', 'Your account is not supter admin');
        }
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect()->route('showLogin')->with('error', 'Silakan login terlebih dahulu.');
        }

        if (Auth::user()->role === 's') {
            return $next($request);
        }

        return redirect()->route('showLogin')->with('error', 'Anda tidak memiliki akses');
    }
}

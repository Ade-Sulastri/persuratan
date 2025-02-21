<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class SuperAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $superAdminNIP = config('superadmin.super_admin.nip');
        $superAdminRole = config('superadmin.super_admin.role');

        $user = session('user');

        if ($user && $user['nip'] === $superAdminNIP && $user['role'] === $superAdminRole) {
            return $next($request);
        }

        return redirect()->route('showLogin')->with('error', 'Anda tidak memiliki akses');
    }
}

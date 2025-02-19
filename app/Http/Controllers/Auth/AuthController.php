<?php

namespace App\Http\Controllers\auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    function showRegistrasi()
    {
        return view('auth.registrasi');
    }

    function registrasi(Request $request)
    {
        $user = new User();
        $user->nip = $request->nip;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->kode_satker = $request->kode_satker;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('showLogin')->with('success', 'Registrasi Berhasil');
    }

    function showLogin()
    {
        return view('auth.login');
    }

    function submitLogin(Request $request)
    {
        $data = $request->only('nip', 'password');

        $superAdmin = config('superadmin.super_admin');
        if ($data['nip'] == $superAdmin['nip'] && $data['password'] === $superAdmin['password']) {
            return redirect()->route('dashboardSuperAdmin');
        }

        // jika bukan super admin
        if (Auth::attempt($data)) {
            $request->session()->regenerate();

            if (Auth::user()->role === 's') {
                return redirect()->route('dashboardSupervisor');
            } else {
                return redirect()->route('dashboardOperator');
            }
        } else {
            return redirect()->back()->with('error', 'Nip atau Password salah');
        }
    }

    function logout()
    {
        Auth::logout();

        return redirect()->route('showLogin');
    }
}

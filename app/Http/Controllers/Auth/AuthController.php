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
        // Validasi input dengan password confirmation
        $request->validate([
            'nip' => 'required|unique:t_user,nip|min:18|max:18',
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:t_user,email',
            'kode_satker' => 'required|numeric|digits:6',
            'password' => 'required|min:8|confirmed', 
        ]);

        // Simpan data user baru
        $user = new User();
        $user->nip = $request->nip;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->kode_satker = $request->kode_satker;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('showLogin')->with('success', 'Registrasi berhasil! Silakan login.');
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
            session([
                'user' => [
                    'nip' => $superAdmin['nip'],
                    'role' => $superAdmin['role'],
                ],
            ]);
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

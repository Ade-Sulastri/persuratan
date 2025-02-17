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
        // Validasi Input
        $request->validate([
            'nip' => 'required|numeric|unique:t_user,nip', // Sudah mengarah ke 't_user'
            'email' => 'required|email|unique:t_user,email', // Sudah benar
            'username' => 'required|string',
            'kode_satker' => 'required|integer',
            'password' => 'required|string|min:6',
        ], [
            'nip.unique' => 'NIP sudah digunakan, silakan gunakan NIP lain.',
            'email.unique' => 'Email sudah terdaftar, gunakan email lain.',
        ]);

        $user = new User();
        $user->nip = (int) $request->nip;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->kode_satker = (int) $request->kode_satker;
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
        $credentials = $request->only('nip', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('dashboardSupervisor');
        } else {
            return redirect()->back()->with('error', 'NIP atau Password salah');
        }
    }

    function logout()
    {
        Auth::logout();
        return redirect()->route('showLogin');
    }

    function checkNip(Request $request)
    {
        $exists = User::where('nip', $request->nip)->exists(); // Pasti ke t_user
        return response()->json(['exists' => $exists]);
    }
}

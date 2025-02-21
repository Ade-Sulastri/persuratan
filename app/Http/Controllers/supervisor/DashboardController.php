<?php

namespace App\Http\Controllers\supervisor;

use App\Http\Controllers\Controller;
use App\Models\Surat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    function dashboardSupervisor()
    {
        $users = User::where('role', 'o')->get();
        $totalSurat = Surat::all();
        $suratMasuk = Surat::where('status', 'm')->get();
        $suratKeluar = Surat::where('status', 'k')->get();

        return view('supervisor.dashboard', compact('users', 'totalSurat', 'suratMasuk', 'suratKeluar'));
    }
}

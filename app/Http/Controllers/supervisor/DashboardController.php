<?php

namespace App\Http\Controllers\supervisor;

use App\Http\Controllers\Controller;
use App\Models\Surat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    function dashboardSupervisor() {
        $users = User::all();
        $totalSurat = Surat::all();
        
        return view('supervisor.dashboard', compact('users','totalSurat'));
    }
}

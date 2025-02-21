<?php

namespace App\Http\Controllers\operator;

use App\Models\Surat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardOperatorController extends Controller
{
    public function dashboardOperator()
    {
        $nipOperator = Auth::user()->nip;

        $suratMasuk = Surat::where('status', 'm')->where('nip_user', $nipOperator)->get();
        $suratKeluar = Surat::where('status', 'k')->where('nip_user', $nipOperator)->get();
        
        return view('operator.dashboard-operator', compact('suratMasuk', 'suratKeluar'));
    }
}

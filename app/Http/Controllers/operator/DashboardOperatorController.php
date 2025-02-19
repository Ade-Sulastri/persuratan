<?php

namespace App\Http\Controllers\operator;

use App\Models\Surat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardOperatorController extends Controller
{
    public function dashboardOperator()
    {

        $suratMasuk = Surat::where('status', 'm')->get();
        $suratKeluar = Surat::where('status', 'k')->get();
        
        return view('operator.dashboard-operator', compact('suratMasuk', 'suratKeluar'));
    }
}

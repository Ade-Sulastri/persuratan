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

        $suratMasuk = Surat::join('t_user', 'd_surat.nip_user', '=', 't_user.nip')->where('d_surat.status', 'm')->where('t_user.kode_satker', Auth::user()->kode_satker)->select('d_surat.*')->get();
        $suratKeluar = Surat::join('t_user', 'd_surat.nip_user', '=', 't_user.nip')->where('d_surat.status', 'k')->where('t_user.kode_satker', Auth::user()->kode_satker)->select('d_surat.*')->get();
        
        return view('operator.dashboard-operator', compact('suratMasuk', 'suratKeluar'));
    }
}

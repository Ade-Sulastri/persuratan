<?php

namespace App\Http\Controllers\supervisor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuratKeluarController extends Controller
{
    function suratKeluarSupervisor() {
        return view('components.supervisor.menu.surat-keluar');
    }
}

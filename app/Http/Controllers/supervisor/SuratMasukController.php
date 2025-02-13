<?php

namespace App\Http\Controllers\supervisor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuratMasukController extends Controller
{
    function suratMasukSupervisor() {
        return view('components.supervisor.menu.surat-masuk');
    }
}

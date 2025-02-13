<?php

namespace App\Http\Controllers\supervisor;

use App\Models\User;
use App\Models\Surat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SuratMasukController extends Controller
{
    function suratMasukSupervisor() {
        $user = User::all();
        $dataSurat = Surat::all();
       
        return view('components.supervisor.menu.surat-masuk', compact('user', 'dataSurat'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SuratMasukController extends Controller
{

    function dataSurat() {
        $dataSurat = Surat::all();

        dd($dataSurat);

        return view('home', compact('dataSurat'));
    }
}

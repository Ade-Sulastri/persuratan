<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    function home() {
        $dataSurat = Surat::all();

        // dd($dataSurat);
        return view('supervisor.dashboard', compact('dataSurat'));
    }
}

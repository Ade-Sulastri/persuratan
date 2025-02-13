<?php

namespace App\Http\Controllers\supervisor;

use App\Http\Controllers\Controller;
use App\Models\Surat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TambahSuratController extends Controller
{
    function tambahSurat()
    {
        return view('components.supervisor.menu.tambah-surat');
    }

    function submitSurat(Request $request)
    {
        $validasiData = Validator::make(
            $request->all(),
            [
                'no_surat' => 'required|string|max:255',
                'tanggal_surat' => 'required|date_format:format',
                'perihal' => 'required|string|max:255',
                'file' => 'required|string|max:255',
            ]
        );

        if ($validasiData->fails()) {
            return redirect()->back()->withErrors($validasiData)->withInput();
        }

        $surat = new Surat();
        $surat->no_surat = $request->no_surat;
        $surat->tanggal_surat = $request->
    }
}

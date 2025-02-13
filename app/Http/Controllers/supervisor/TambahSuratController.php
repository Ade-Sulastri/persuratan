<?php

namespace App\Http\Controllers\supervisor;

use App\Http\Controllers\Controller;
use App\Models\Surat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TambahSuratController extends Controller
{
    function tambahSurat()
    {
        $user = Auth::user();
        return view('components.supervisor.menu.tambah-surat');
    }

    function submitSurat(Request $request)
    {
        $validasiData = Validator::make(
            $request->all(),
            [
                'no_surat' => 'required|string|max:255',
                'tanggal_surat' => 'required|data|date_format:Y-m-d',
                'perihal' => 'required|string|max:255',
                'file' => 'required|string|max:255',
                // 'nip' => Auth::user()->nip_user,
            ]
        );

        // if ($validasiData->fails()) {
        //     return redirect()->back()->withErrors($validasiData)->withInput();
        // }

        $surat = new Surat();
        $surat->no_surat = $request->no_surat;
        $surat->tanggal_surat = $request->tanggal_surat;
        $surat->perihal = $request->perihal;
        $surat->file = $request->file;
        $surat->save();

        return redirect()->route('suratMasukSupervisor')->with('success', 'Data berhasil ditambahkan');
    }
}

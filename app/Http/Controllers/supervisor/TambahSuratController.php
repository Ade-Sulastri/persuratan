<?php

namespace App\Http\Controllers\supervisor;

use App\Models\Surat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Middleware\IsAuth;

class TambahSuratController extends Controller
{
    function tambahSurat()
    {
        $user = Auth::user();
        return view('components.supervisor.menu.tambah-surat');
    }

    function submitSurat(Request $request)
    {
        // Validasi input
        $request->validate([
            'no_surat' => 'required|string',
            'tanggal_surat' => 'required|date',
            'perihal' => 'required|string',
        ]);

        // Menyimpan file
        $file = $request->file('file');
        $fileName = $file->hashName();
        $file->storeAs('uploads', $fileName);

        $surat = new Surat();
        $surat->no_surat = $request->no_surat;
        $surat->tanggal_surat = $request->tanggal_surat;
        $surat->perihal = $request->perihal;
        $surat->nip_user = Auth::user()->nip;
        $surat->original_file_name = $file->getClientOriginalName(); 
        $surat->generated_file_name = $fileName; 
        $surat->save();

        return redirect()->route('tambahSurat')->with('success', 'Data berhasil ditambahkan');
    }

    function deleteSurat($id)
    {
        $surat = Surat::find($id);
        $surat->delete();

        return redirect()->route('suratMasukSupervisor')->with('success', 'Surat Berhasil di Hapus');
    }
}

<?php

namespace App\Http\Controllers\operator;

use App\Models\Surat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TambahSuratController extends Controller
{
    // bakal di hapus
    function tambahSurat()
    {
        $user = Auth::user();
        return view('components.operator.menu.tambah-surat');
    }

    // tambah surat masuk
    public function tambahSuratMasuk(Request $request) {

        dd($request->all());
        // Validasi input
        $request->validate([
            'no_surat' => 'required|string',
            'tanggal_surat' => 'required|date',
            'perihal' => 'required|string',
            // 'file' => 'required|'
        ]);

        // Menyimpan file
        $file = $request->file('file');
        $fileName = $file->hashName();
        $file->storeAs('uploads', $fileName);

        $surat = new Surat();
        $surat->no_surat = $request->no_surat;
        $surat->tanggal_surat = $request->tanggal_surat;
        $surat->perihal = $request->perihal;
        $surat->status = 'm';
        $surat->nip_user = Auth::user()->nip;
        $surat->original_file_name = $file->getClientOriginalName();
        $surat->generated_file_name = $fileName;
        $surat->save();

        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }

    // tambah surat keluar
    public function tambahSuratKeluar(Request $request) {
        // dd($request->all());
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
        $surat->status = 'k';
        $surat->nip_user = Auth::user()->nip;
        $surat->original_file_name = $file->getClientOriginalName();
        $surat->generated_file_name = $fileName;
        $surat->save();

        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }

    // bakal di hapus
    function submitSurat(Request $request)
    {
        // Validasi input
        $request->validate([
            'no_surat' => 'required|string',
            'tanggal_surat' => 'required|date',
            'perihal' => 'required|string',
            'status' => 'required|alpha',
        ]);

        // Menyimpan file
        $file = $request->file('file');
        $fileName = $file->hashName();
        $file->storeAs('uploads', $fileName);

        $surat = new Surat();
        $surat->no_surat = $request->no_surat;
        $surat->tanggal_surat = $request->tanggal_surat;
        $surat->perihal = $request->perihal;
        // $surat->status = $request->status;
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

    function updateSurat(Request $request, $id) {
        $idSurat = Surat::find($id);

        
    }
}

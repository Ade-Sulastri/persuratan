<?php

namespace App\Http\Controllers\operator;

use App\Models\Surat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SuratOperatorController extends Controller
{
    // SURAT MASUK
    public function suratMasukOperator()
    {
        // ambil nip user
        $nipOperator = Auth::user()->nip;
        $dataSurat = Surat::where('status', 'm')
            ->where('nip_user', $nipOperator)
            ->get();

        return view('components.operator.menu.surat-masuk-operator', compact('dataSurat'));
    }

    // SURAT KELUAR
    public function suratKeluarOperator()
    {
        $nipOperator = Auth::user()->nip;
        $dataSurat = Surat::where('status', 'k')->where('nip_user', $nipOperator)->get();

        return view('components.operator.menu.surat-keluar-operator', compact('dataSurat'));
    }

    function downloadSuratOperator($filename)
    {
        $fileRecord = Surat::where('generated_file_name', $filename)->first();

        if (!$fileRecord) {
            abort(404, 'File tidak ditemukan');
        }

        $filePath = storage_path("app/private/uploads/{$fileRecord->generated_file_name}");

        if (!file_exists($filePath)) {
            abort(404, 'File tidak ditemukan dalam sistem');
        }

        return response()->download($filePath, $fileRecord->original_file_name);
    }

    // tambah surat masuk
    public function tambahSuratMasuk(Request $request)
    {

        // dd($request->all());
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
    public function tambahSuratKeluar(Request $request)
    {
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

    function updateSuratOperator(Request $request, $id) {
        $dataSurat = Surat::find($id);

        if (!$dataSurat) {
            return redirect()->back()->with('error', 'Surat tidak ditemukan');
        }

        $dataSurat->no_surat = $request->no_surat;
        $dataSurat->tanggal_surat = $request->tanggal_surat;
        $dataSurat->perihal = $request->perihal;

        if ($request->hasFile('file')) {
            // Hapus file lama jika ada
            $oldFilePath = storage_path("app/private/uploads/{$dataSurat->generated_file_name}");
            if (file_exists($oldFilePath)) {
                unlink($oldFilePath);
            }

            // dd($oldFilePath);

            // Proses file baru
            $file = $request->file('file');
            $fileName = $file->hashName();

            // Simpan file baru
            $file->storeAs('uploads', $fileName);

            // Update informasi file
            $dataSurat->original_file_name = $file->getClientOriginalName();
            $dataSurat->generated_file_name = $fileName;
        }

        $dataSurat->save();

        return redirect()->back()->with('success', 'Surat Berhasil di Update');
    }

    // bakal di hapus
    public function deleteSuratOperator($id)
    {
        $suratId = Surat::find($id);
        $suratId->delete();

        return redirect()->back()->with('success', 'Surat Berhasil di Hapus');
    }
}

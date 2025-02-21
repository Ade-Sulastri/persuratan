<?php

namespace App\Http\Controllers\supervisor;

use App\Models\User;
use App\Models\Surat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class SuratSupervisorController extends Controller
{
    // surat masuk
    function suratMasukSupervisor()
    {
        $user = User::all();
        $dataSuratKeluar = Surat::where('status', 'm')->get();

        return view('components.supervisor.menu.surat-masuk', compact('user', 'dataSuratKeluar'));
    }

    // surat keluar
    function suratKeluarSupervisor()
    {
        $dataSuratKeluar = Surat::where('status', 'k')->get();
        return view('components.supervisor.menu.surat-keluar', compact('dataSuratKeluar'));
    }

    function deleteSurat($id)
    {
        $surat = Surat::find($id);
        $surat->delete();

        return redirect()->back()->with('success', 'Surat Berhasil di Hapus');
    }

    function downloadSurat($filename)
    {
        $fileRecord = Surat::where('generated_file_name', $filename)->first();

        // dd($fileRecord);
        if (!$fileRecord) {
            abort(404, 'File tidak ditemukan dalam database.');
        }

        $filePath = storage_path("app/private/uploads/{$fileRecord->generated_file_name}");

        // dd($filePath);

        if (!file_exists($filePath)) {
            abort(404, 'File tidak ditemukan dalam sistem.');
        }

        return response()->download($filePath, $fileRecord->original_file_name);
    }

    public function updateSurat(Request $request, $id)
    {
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
}

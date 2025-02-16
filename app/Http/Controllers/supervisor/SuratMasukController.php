<?php

namespace App\Http\Controllers\supervisor;

use App\Models\User;
use App\Models\Surat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SuratMasukController extends Controller
{
    function suratMasukSupervisor()
    {
        $user = User::all();
        $dataSurat = Surat::all();

        return view('components.supervisor.menu.surat-masuk', compact('user', 'dataSurat'));
    }

    function deleteSurat($id)
    {
        $surat = Surat::find($id);
        // return redirect()->route('suratMasukSupervisor')->with('confirm', 'Apakah anda ingin yakin menghapus surat? ');
        $surat->delete();

        return redirect()->route('suratMasukSupervisor')->with('success', 'Surat Berhasil di Hapus');
    }

    function editSurat() {

    }

    function downloadSurat($filename)
    {
        $fileRecord = Surat::where('generated_file_name', $filename)->first();
        // dd($fileRecord);
        if (!$fileRecord) {
            abort(404, 'File tidak ditemukan dalam database.');
        }

        $filePath = storage_path("app/private/uploads/{$fileRecord->generated_file_name}");

        if (!file_exists($filePath)) {
            abort(404, 'File tidak ditemukan dalam sistem.');
        }

        return response()->download($filePath, $fileRecord->original_file_name);
    }
}

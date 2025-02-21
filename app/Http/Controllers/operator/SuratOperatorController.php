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

    public function deleteSuratOperator($id)
    {
        $suratId = Surat::find($id);
        $suratId->delete();

        return redirect()->back()->with('success', 'Surat Berhasil di Hapus');
    }
}

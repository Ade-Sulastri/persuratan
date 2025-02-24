<?php

namespace App\Http\Controllers\super_admin;

use App\Models\User;
use App\Models\Surat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class SuperAdminController extends Controller
{
    public function dashboardSuperAdmin()
    {
        $dataUsers = User::all();
        $dataSuratMasuk = Surat::where('status', 'm')->get();
        $dataSuratKeluar = Surat::where('status', 'k')->get();
        $dataAdmin = User::where('role', 's')->get();

        return view('superadmin.dashboard-super-admin', compact('dataUsers', 'dataSuratMasuk', 'dataSuratKeluar', 'dataAdmin'));
    }

    public function tambahAdmin(Request $request) {
        // dd($request->all());
        // validasi data input
        $request->validate([
            'nip' => 'required|unique:t_user,nip|min:18|max:18',
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:t_user,email',
            'kode_satker' => 'required|numeric',
            'password' => 'required|min:8',
            'role' => 'required|alpha'
        ]);

        $dataAdmin = new User();
        $dataAdmin->nip = $request->nip;
        $dataAdmin->username = $request->username;
        $dataAdmin->email = $request->email;
        $dataAdmin->kode_satker = $request->kode_satker;
        $dataAdmin->password = Hash::make($request->password);
        $dataAdmin->role = $request->role;
        $dataAdmin->save();

        return redirect()->back()->with('success', 'Data Admin Berhasil di Tambahkan');
    }

    public function deleteAdmin($nip) {
        $nipAdmin = User::where('nip', $nip)->first();
        $nipAdmin->delete();

        return redirect()->back()->with('success', 'Admin Berhasil di Hapus');
    }

    public function updateAdmin(Request $request, $nip) {

        // dd($request->all());
        $nipAdmin = User::where('nip', $nip)->first();
        // dd($nipAdmin);

        if(!$nipAdmin) {
            return redirect()->back()->with('error', 'Nip Admin Tidak Ditemukan');
        }

        $nipAdmin->nip = $request->nip;
        $nipAdmin->username = $request->username;
        $nipAdmin->email = $request->email;
        $nipAdmin->kode_satker = $request->kode_satker;
        $nipAdmin->role = $request->role;
        $nipAdmin->save();

        return redirect()->back()->with('success', 'Data Admin Berhasil di Edit');
    }
}

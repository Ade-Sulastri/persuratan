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

    public function tambahAdmin(Request $request)
    {
        try {
            // Same validation as before
            $request->validate([
                'nip' => 'required|unique:t_user,nip|min:18|max:18',
                'username' => 'required|string|max:255',
                'email' => 'required|email|unique:t_user,email',
                'kode_satker' => 'required|numeric',
                'password' => 'required|min:8',
                'role' => 'required|alpha'
            ]);

            // Same saving logic as before
            $dataAdmin = new User();
            $dataAdmin->nip = $request->nip;
            $dataAdmin->username = $request->username;
            $dataAdmin->email = $request->email;
            $dataAdmin->kode_satker = $request->kode_satker;
            $dataAdmin->password = Hash::make($request->password);
            $dataAdmin->role = $request->role;
            $dataAdmin->save();

            return redirect()->back()->with('success', 'Data Admin Berhasil di Tambahkan');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->validator)->withInput()->with('openTambahAdminModal', true);
        }
    }

    public function deleteAdmin($nip)
    {
        $nipAdmin = User::where('nip', $nip)->first();
        $nipAdmin->delete();

        return redirect()->back()->with('success', 'Admin Berhasil di Hapus');
    }

    public function updateAdmin(Request $request, $nip)
    {
        try {
            $request->validate([
                'nip' => 'required|numeric|digits:18|unique:t_user,nip,' . $nip . ',nip',
                'username' => 'required|string|max:255',
                'email' => 'required|email|unique:t_user,email,' . $nip . ',nip',
                'kode_satker' => 'required|numeric|digits:6',
                'role' => 'required|string|size:1|in:s,o',
            ]);

            $nipAdmin = User::where('nip', $nip)->first();
            $nipAdmin->nip = $request->nip;
            $nipAdmin->username = $request->username;
            $nipAdmin->email = $request->email;
            $nipAdmin->kode_satker = $request->kode_satker;
            $nipAdmin->role = $request->role;
            $nipAdmin->save();

            return redirect()->back()->with('success', 'Data Admin Berhasil di Edit');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->validator)->withInput()
                ->with('openUpdateAdminModal', true)
                ->with('editNip', $nip); // Pass the original NIP for form action
        }
    }
}

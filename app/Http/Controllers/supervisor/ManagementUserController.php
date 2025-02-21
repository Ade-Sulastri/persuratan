<?php

namespace App\Http\Controllers\supervisor;

use App\Models\User;
use App\Models\Surat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ManagementUserController extends Controller
{
    function managementUser()
    {
        $dataUser = User::where('role', 'o')->get();

        return view('components.supervisor.menu.management-user', compact('dataUser'));
    }

    // delete user
    public function deleteUser($nip)
    {
        $dataUserNip = User::find($nip);

        if(!$dataUserNip) {
            return redirect()->back()->with('error', 'User tidak ditemukan');
        }

        try {
            $dataUserNip->delete();
            return redirect()->back()->with('success', 'Data Berhasil di Hapus');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus data');
        }

    }

    // update user
    public function updateUser(Request $request, $nip)
    {
        $dataUser = User::find($nip);
        if (!$dataUser) {
            return redirect()->route('managementUser')->with('error', 'User not found');
        }

        $dataUser->username = $request->username;
        $dataUser->email = $request->email;
        $dataUser->tanggal_nonaktif = $request->tanggal_nonaktif;
        $dataUser->kode_satker = $request->kode_satker;
        $dataUser->save();

        return redirect()->route('managementUser')->with('success', 'Data User Berhasil di Hapus');
    }
}

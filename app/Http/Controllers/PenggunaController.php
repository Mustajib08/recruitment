<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class PenggunaController extends Controller
{
    public function pengguna(Request $request)
    {
        $users = User::orderBy('level')->paginate(10);
        return view('admin.kelola_pengguna.pengguna', [
            'title' => 'Pengguna',
            'users' => $users,
        ]);
    }

    public function proses_delete_pengguna(Request $request)
    {
        User::where('id', $request->delete_pengguna)->delete();

        Alert::toast('Berhasil Menghapus Pengguna', 'success')->width('auto')->timerProgressBar();
        return back();
    }

    public function proses_daftar_admin(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'nama' => 'required',
            'nomor_telepon' => 'required|numeric|digits_between:11,13',
            'nama_pengguna' => 'required',
            'kata_sandi' => 'required',
        ]);

        if ($validasi->fails()) {
            Alert::toast('Gagal Melakukan Pendaftaran', 'error')->width('auto')->timerProgressBar();
            return back();
        }

        User::create([
            'nama' => $request->nama,
            'nomor_telepon' => $request->nomor_telepon,
            'username' => $request->nama_pengguna,
            'level' => $request->level,
            'password' => bcrypt($request->kata_sandi),
        ]);

        Alert::toast('Berhasil Melakukan Pendaftaran', 'success')->width('auto')->timerProgressBar();
        return back();
    }

    public function proses_update_pengguna(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'nama' => 'required',
            'nomor_telepon' => 'required|numeric|digits_between:11,13',
            'nama_pengguna' => 'required',
        ]);

        if ($validasi->fails()) {
            Alert::toast('Gagal Melakukan Pembaruan', 'error')->width('auto')->timerProgressBar();
            return back();
        }

        if ($request->kata_sandi !== null) {
            User::where('id', $request->id_pengguna)->update([
                'nama' => $request->nama,
                'nomor_telepon' => $request->nomor_telepon,
                'username' => $request->nama_pengguna,
                'level' => $request->level,
                'password' => bcrypt($request->kata_sandi),
            ]);
        } else {
            User::where('id', $request->id_pengguna)->update([
                'nama' => $request->nama,
                'nomor_telepon' => $request->nomor_telepon,
                'username' => $request->nama_pengguna,
                'level' => $request->level,
            ]);
        }

        Alert::toast('Berhasil Melakukan Pembaruan', 'success')->width('auto')->timerProgressBar();
        return back();
    }
}

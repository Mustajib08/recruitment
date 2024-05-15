<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login', [
            'title' => 'Halaman Masuk'
        ]);
    }

    public function proses_login(Request $request)
    {
        // dd($request->all());
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('admin');
        }

        Alert::toast('Nama Pengguna dan Kata Sandi Salah !', 'error')->width('auto')->timerProgressBar();
        return back();
    }

    public function register()
    {
        return view('auth.register', [
            'title' => 'Halaman Pendaftaran'
        ]);
    }

    public function proses_daftar(Request $request)
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
            'password' => bcrypt($request->kata_sandi),
        ]);

        Alert::toast('Berhasil Melakukan Pendaftaran', 'success')->width('auto')->timerProgressBar();
        return redirect()->to(route('login'));
    }
}

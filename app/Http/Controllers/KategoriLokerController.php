<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriLoker;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class KategoriLokerController extends Controller
{
    public function kategori_loker(Request $request)
    {
        return view('admin.kategori_loker.kategori_loker', [
            'title' => 'Kategori Loker',
            'kategori_loker' => KategoriLoker::all()
        ]);
    }

    public function proses_tambah_kategori_loker(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'kategori' => 'required',
            'keterangan' => 'required',
        ]);

        if ($validasi->fails()) {
            Alert::toast('Gagal Menambahkan Kategori', 'error')->width('auto');
            return back();
        }

        KategoriLoker::create($request->all());

        Alert::toast('Berhasil Menambahkan Kategori', 'success')->width('auto');
        return back();
    }
}

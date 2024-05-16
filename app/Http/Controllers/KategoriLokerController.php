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
            'kategori_loker' => KategoriLoker::latest()->get()
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

    public function proses_delete_kategori(Request $request)
    {
        KategoriLoker::where('id', $request->delete_kategori)->delete();

        Alert::toast('Berhasil Menghapus Kategori', 'success')->width('auto');
        return back();
    }

    public function proses_update_kategori(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'kategori' => 'required',
            'keterangan' => 'required',
        ]);

        if ($validasi->fails()) {
            Alert::toast('Gagal Memperbarui Kategori', 'error')->width('auto');
            return back();
        }

        KategoriLoker::find($request->id_kategori)->update([
            'kategori' => $request->kategori,
            'keterangan' => $request->keterangan
        ]);

        Alert::toast('Berhasil Memperbarui Kategori', 'success')->width('auto');
        return back();
    }
}

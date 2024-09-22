<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriLoker;
use App\Models\Loker;
use App\Models\Pertanyaan;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class KelolaLokerController extends Controller
{
    public function kelola_loker(Request $request)
    {
        return view('admin.kelola_loker.kelola_loker', [
            'title' => 'Kelola Loker',
            'kategori_loker' => KategoriLoker::latest()->get(),
            'lokers' => Loker::with('kategori_loker')->latest()->get(),
        ]);
    }

    public function proses_tambah_loker(Request $request)
    {
        // dd($request->all());
        $validasi = Validator::make($request->all(), [
            'nama_loker' => 'required',
            'kategori' => 'required',
            'tanggal_dibuka' => 'required',
            'berakhir' => 'required',
            'salari' => 'required',
            'tipe' => 'required',
            'deskripsi' => 'required',
        ]);

        if ($validasi->fails()) {
            Alert::toast('Gagal Menambahkan Lowongan', 'error')->width('auto');
            return back();
        }

        Loker::create([
            'kategori_id' => $request->kategori,
            'nama_loker' => $request->nama_loker,
            'sub_loker' => $request->deskripsi,
            'tanggal_buka' => $request->tanggal_dibuka,
            'tanggal_tutup' => $request->berakhir,
            'salary' => $request->salari,
            'tipe_bekerja' => $request->tipe,
            'deskripsi_loker' => $request->deskripsi,
            'status' => 'pending'
        ]);

        Alert::toast('Berhasil Menambahkan Lowongan', 'success')->width('auto');
        return back();
    }

    public function proses_delete_loker(Request $request)
    {
        Loker::where('id', $request->delete_loker)->delete();

        Alert::toast('Berhasil Menghapus Lowongan Kerja', 'success')->width('auto');
        return back();
    }

    public function proses_update_loker(Request $request)
    {
        // dd($request->all());
        $validasi = Validator::make($request->all(), [
            'nama_loker' => 'required',
            'kategori' => 'required',
            'tanggal_dibuka' => 'required',
            'berakhir' => 'required',
            'salari' => 'required',
            'tipe' => 'required',
            'deskripsi' => 'required',
        ]);

        if ($validasi->fails()) {
            Alert::toast('Gagal Memperbarui  Lowongan', 'error')->width('auto');
            return back();
        }

        Loker::find($request->id_loker)->update([
            'kategori_id' => $request->kategori,
            'nama_loker' => $request->nama_loker,
            'sub_loker' => $request->deskripsi,
            'tanggal_buka' => $request->tanggal_dibuka,
            'tanggal_tutup' => $request->berakhir,
            'salary' => $request->salari,
            'tipe_bekerja' => $request->tipe,
            'deskripsi_loker' => $request->deskripsi,
        ]);

        Alert::toast('Berhasil Memperbarui Lowongan', 'success')->width('auto');
        return back();
    }

    public function detail_loker(Loker $loker)
    {
        return view('admin.kelola_loker.detail_loker', [
            'title' => 'Detail Lowongan Kerja',
            'loker' => $loker,
            'pertanyaans' => Pertanyaan::where('loker_id', $loker->id)->get(),
        ]);
    }

    // proses tambah pertanyaan
    public function proses_tambah_pertanyaan(Request $request)
    {
        // dd($request->all());
        $validasi = Validator::make($request->all(), [
            'pertanyaan' => 'required',
        ]);

        if ($validasi->fails()) {
            Alert::toast('Gagal Menambahkan Pertanyaan', 'error')->width('auto');
            return back();
        }

        Pertanyaan::create($request->all());

        Alert::toast('Berhasil Menambahkan Pertanyaan', 'success')->width('auto');
        return to_route('detail_loker', $request->loker_id)->withFragment('cardPertanyaan');
    }

    // delete pertanyaan
    public function proses_delete_pertanyaan(Request $request)
    {
        Pertanyaan::where('id', $request->delete_pertanyaan)->delete();

        Alert::toast('Berhasil Menghapus Pertanyaan ', 'success')->width('auto');
        return to_route('detail_loker', $request->id_loker)->withFragment('cardPertanyaan');
    }

    // perbarui pertanyaan
    public function proses_update_pertanyaan(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'pertanyaan' => 'required',
        ]);

        if ($validasi->fails()) {
            Alert::toast('Gagal Memperbarui Pertanyaan', 'error')->width('auto');
            return back();
        }

        Pertanyaan::find($request->pertanyaan_id)->update($request->all());

        Alert::toast('Berhasil Memperbarui Pertanyaan', 'success')->width('auto');
        return to_route('detail_loker', $request->loker_id)->withFragment('cardPertanyaan');
    }
}

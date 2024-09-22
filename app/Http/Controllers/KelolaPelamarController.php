<?php

namespace App\Http\Controllers;

use App\Models\Jawaban;
use App\Models\ApplyNow;
use App\Models\Pertanyaan;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
class KelolaPelamarController extends Controller
{
    public function kelola_pelamar(Request $request)
    {
        $pelamar = ApplyNow::latest()->paginate(10);
        return view('admin.kelola_pelamar.kelola_pelamar', [
            'title' => 'Kelola Pelamar',
            'kelola_pelamar' => $pelamar
        ]);
    }

    public function detail_pelamar(ApplyNow $applyNow)
    {
        return view('admin.kelola_pelamar.detail_pelamar', [
            'title' => 'Detail Pelamar',
            'pelamar' => $applyNow,
            'pertanyaan_jawaban' => Pertanyaan::where('loker_id', $applyNow->loker->id)->get(),
        ]);
    }

    public function update_status(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'status' => 'required',
            'pelamar_id' => 'required'
        ]);

        if ($validasi->fails()) {
            Alert::toast('Gagal Menambahkan Kategori', 'error')->width('auto');
            return back();
        }

        // KategoriLoker::create($request->all());
        $applyNow = ApplyNow::find($request->pelamar_id); // Fetch the record first

        $applyNow->update([
            'status' => $request->status // Perform the update
        ]);
        $loker_name = $applyNow->loker['nama_loker'];
        $user_id = $applyNow['user_id'];
        $description = $applyNow['status'];
        
        Notification::create([
            'user_id' => $user_id, 
            'description' => $description,
            'loker_name' => $loker_name,
        ]);        

        // $applyNow->status = $request->status;
        Alert::toast('Berhasil Mengupdate Status Pelamar', 'success')->width('auto');
        return back();
    }
}

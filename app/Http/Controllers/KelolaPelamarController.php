<?php

namespace App\Http\Controllers;

use App\Models\Jawaban;
use App\Models\ApplyNow;
use App\Models\Pertanyaan;
use Illuminate\Http\Request;

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
}

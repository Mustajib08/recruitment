<?php

namespace App\Http\Controllers;

use App\Models\Loker;
use App\Models\ApplyNow;
use App\Models\Jawaban;
use App\Models\Pertanyaan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class ApplyNowController extends Controller
{
    public function index(Request $request, Loker $loker)
    {
        if (!empty(ApplyNow::where('loker_id', $loker->id)->where('user_id', auth()->user()->id)->first()->cv_user)) {
            $data_apply = ApplyNow::where('loker_id', $loker->id)->where('user_id', auth()->user()->id)->first();
        } else {
            $data_apply = '';
        }

        $pertanyaan = Pertanyaan::where('loker_id', $loker->id)->get();
        // dd(Jawaban::where('user_id', auth()->user()->id)->where('pertanyaan_id', $pertanyaan->id)->get());
        return view('user.applynow.index', [
            'title' => 'Apply Now',
            'loker' => $loker,
            'data_apply' => $data_apply,
            'pertanyaan' => $pertanyaan,
            // 'jawaban' => Jawaban::where('user_id', auth()->user()->id)->where('loker_id', $loker->id)->get(),
        ]);
    }

    public function upload_berkas(Request $request)
    {
        // Validasi hanya untuk file PDF
        $request->validate([
            'file' => 'required|mimes:pdf|max:2048', // hanya file PDF yang diperbolehkan, maksimal 2MB
            'loker_id' => 'required',
            'user_id' => 'required',
            'alamat' => 'required',
        ]);
        
        
        // Simpan file dan dapatkan path-nya
        $path = $request->file('file')->store('cv_users', 'public');

        // Simpan path di database
        ApplyNow::create([
            'loker_id' => $request->loker_id,
            'user_id' => $request->user_id,
            'cv_user' => $path,
            'alamat' => $request->alamat
        ]);

        toast('Berhasil Melengkapi Berkas Persyaratan', 'success');
        return back();
    }


    public function jawaban(Request $request)
    {
        $data = $request->all();
        foreach ($data['pertanyaan'] as $pertanyaanId => $jawaban) {
            Jawaban::create([
                'user_id' => auth()->user()->id,
                'pertanyaan_id' => $pertanyaanId,
                'jawaban' => $jawaban,
            ]);
        }

        toast('Jawaban Tersimpan, Silahkan Menunggu Keputusan HRD melalui Whatsapp / Email', 'success');
        return redirect()->back();
    }

    public function batal_upload_cv(Request $request)
    {
        ApplyNow::where('id', $request->idApplyNow)->delete();

        toast('CV batal di upload', 'success', 'text');
        return back();
    }

    public function jawab_pertanyaan(Request $request, Loker $loker)
    {
        $jawaban = Jawaban::where('user_id', auth()->user()->id)
            ->join('pertanyaans', 'pertanyaans.id', '=', 'jawabans.pertanyaan_id')
            ->where('pertanyaans.loker_id', $loker->id)
            ->get();

        return view('user.applynow.jawab_pertanyaan', [
            'title' => 'Jawab Pertanyaan',
            'pertanyaan' => Pertanyaan::where('loker_id', $loker->id)->get(),
            'jawaban' => $jawaban
        ]);
    }
}


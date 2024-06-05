<?php

namespace App\Http\Controllers;

use App\Models\Loker;
use App\Models\ApplyNow;
use App\Models\Jawaban;
use App\Models\Pertanyaan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

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
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $path = $request->file('image')->store('cv_users', 'public');
        ApplyNow::create([
            'loker_id' => $request->loker_id,
            'user_id' => $request->user_id,
            'cv_user' => $path,
            'alamat' => $request->alamat
        ]);

        Alert::toast('Berhasil Melengkapi Berkas Persyaratan', 'success');
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

        Alert::toast('Jawaban Tersimpan, Silahkan Menunggu Keputusan HRD melalui Whatsapp / Email', 'success');
        return redirect()->back();
    }
}

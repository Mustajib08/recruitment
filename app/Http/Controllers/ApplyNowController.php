<?php

namespace App\Http\Controllers;

use App\Models\Loker;
use App\Models\ApplyNow;
use Illuminate\Http\Request;

class ApplyNowController extends Controller
{
    public function index(Request $request, Loker $loker)
    {
        return view('user.applynow.index', [
            'title' => 'Apply Now',
            'loker' => $loker,
        ]);
    }

    public function upload_berkas(Request $request)
    {
        // dd($request->all());
        $path = $request->file('cv')->store('cv_users');
        return $path;
        ApplyNow::create([
            'loker_id' => $request->loker_id,
            'user_id' => $request->user_id,
            'cv_user' => $path,
        ]);
    }
}

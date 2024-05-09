<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KategoriLokerController extends Controller
{
    public function kategori_loker(Request $request)
    {
        return view('admin.kategori_loker.kategori_loker', [
            'title' => 'Kategori Loker',
        ]);
    }
}

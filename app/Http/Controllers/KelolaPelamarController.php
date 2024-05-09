<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KelolaPelamarController extends Controller
{
    public function kelola_pelamar(Request $request)
    {
        return view('admin.kelola_pelamar', [
            'title' => 'Kelola Pelamar',
        ]);
    }
}

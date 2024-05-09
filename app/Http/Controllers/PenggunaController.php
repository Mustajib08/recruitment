<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    public function pengguna(Request $request)
    {
        return view('admin.pengguna', [
            'title' => 'Pengguna',
        ]);
    }
}

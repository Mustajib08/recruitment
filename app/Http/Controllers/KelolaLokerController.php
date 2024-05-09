<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KelolaLokerController extends Controller
{
    public function kelola_loker(Request $request)
    {
        return view('admin.kelola_loker', [
            'title' => 'Kelola Loker',
        ]);
    }
}

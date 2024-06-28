<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Loker;
use App\Models\ApplyNow;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.index', [
            'title' => 'Dashboard Admin',
            'total_loker' => Loker::count(),
            'total_pelamar' => ApplyNow::count(),
            'total_akun' => User::count(),
            'users' => User::where('level', 'admin')->get()
        ]);
    }
}

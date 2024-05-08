<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login', [
            'title' => 'Halaman Masuk'
        ]);
    }

    public function register()
    {
        return view('auth.register', [
            'title' => 'Halaman Pendaftaran'
        ]);
    }
}

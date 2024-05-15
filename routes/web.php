<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KategoriLokerController;
use App\Http\Controllers\KelolaLokerController;
use App\Http\Controllers\KelolaPelamarController;
use App\Http\Controllers\PenggunaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

/* ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
/* Route User Cari Pekerjaan */

Route::get('/', function () {
    return view('user.home');
});

Route::get('/cari-loker', function () {
    return view('user.index');
})->name('cari_loker');

Route::get('/detail_loker', function () {
    return view('user.detail_loker');
})->name('detail_loker');

Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'proses_login'])->name('proses_login');

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'proses_daftar'])->name('proses_daftar');

Route::prefix('/find-job')->group(function () {
});
/* ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */

Route::middleware('auth')->group(function () {

    /* ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
    /* Route Admin */
    Route::prefix('admin')->controller(AdminController::class)->group(function () {
        Route::get('/', 'index')->name('admin.index');
    });
    /* ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */

    /* ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
    /* Kategori Loker */
    Route::prefix('kategori_loker')->controller(KategoriLokerController::class,)->group(function () {
        Route::get('/', 'kategori_loker')->name('kategori_loker');
        Route::post('/', 'proses_tambah_kategori_loker')->name('proses_tambah_kategori_loker');
    });
    /* ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */

    /* ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
    /* Kolola Loker */
    Route::prefix('kelola_loker')->controller(KelolaLokerController::class,)->group(function () {
        Route::get('/', 'kelola_loker')->name('kelola_loker');
    });
    /* ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */

    /* ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
    /* Kolola Pelamar */
    Route::prefix('kelola_pelamar')->controller(KelolaPelamarController::class,)->group(function () {
        Route::get('/', 'kelola_pelamar')->name('kelola_pelamar');
    });
    /* ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */

    /* ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
    /* Pengguna */
    Route::prefix('pengguna')->controller(PenggunaController::class,)->group(function () {
        Route::get('/', 'pengguna')->name('pengguna');
    });
    /* ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
});
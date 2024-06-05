<?php

use App\Models\Loker;
use App\Models\KategoriLoker;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApplyNowController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\KelolaLokerController;
use App\Http\Controllers\KategoriLokerController;
use App\Http\Controllers\KelolaPelamarController;
use App\Http\Middleware\AdminCheck;
use App\Http\Middleware\UserCheck;

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
    return view('user.index', [
        'kategori_lokers' => KategoriLoker::all(),
        'lokers' => Loker::all(),
    ]);
})->name('cari_loker');

Route::get('/cari_loker/{loker:id}/detail', function (Loker $loker) {
    return view('user.detail_loker', [
        'loker' => $loker
    ]);
})->name('detail_loker_user');

Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'proses_login'])->name('proses_login');

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'proses_daftar'])->name('proses_daftar');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::prefix('/find-job')->group(function () {
});

/* ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
/* Route Apply Now */
Route::middleware(UserCheck::class)->prefix('applynow')->controller(ApplyNowController::class)->group(function () {
    Route::get('/{loker:id}/loker', 'index')->name('applynow');
    Route::post('/upload_berkas', 'upload_berkas')->name('upload_berkas');
    Route::post('/simpan_jawaban', 'jawaban')->name('simpan_jawaban');
});
/* ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */

/* ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */

Route::middleware(AdminCheck::class)->group(function () {

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
        Route::delete('/', 'proses_delete_kategori')->name('proses_delete_kategori');
        Route::post('/proses_update_kategori', 'proses_update_kategori')->name('proses_update_kategori');
    });
    /* ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */

    /* ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
    /* Kolola Loker */
    Route::prefix('kelola_loker')->controller(KelolaLokerController::class,)->group(function () {
        Route::get('/', 'kelola_loker')->name('kelola_loker');
        Route::post('/', 'proses_tambah_loker')->name('proses_tambah_loker');
        Route::delete('/', 'proses_delete_loker')->name('proses_delete_loker');
        Route::post('/proses_update_loker', 'proses_update_loker')->name('proses_update_loker');
        Route::get('/{loker:id}/detail', 'detail_loker')->name('detail_loker');
        Route::post('/proses_tambah_pertanyaan', 'proses_tambah_pertanyaan')->name('proses_tambah_pertanyaan');
        Route::delete('/proses_delete_pertanyaan', 'proses_delete_pertanyaan')->name('proses_delete_pertanyaan');
        Route::post('/proses_update_pertanyaan', 'proses_update_pertanyaan')->name('proses_update_pertanyaan');
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

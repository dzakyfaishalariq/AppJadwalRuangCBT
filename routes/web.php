<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\SystemController;
use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('guest')->group(function () {
    Route::get('/', [WebController::class, 'index'])->name('login');
    Route::get('/registrasi', [WebController::class, 'registrasi']);
    Route::post('/registrasi_system', [LoginController::class, 'registrasi_system']);
    Route::post('/login', [LoginController::class, 'login']);
});

Route::middleware('auth')->group(function () {
    Route::get('/dashbord', [WebController::class, 'dashbord']);
    Route::get('/logout', [LoginController::class, 'logout']);
    Route::get('/informasi_pilihan', [WebController::class, 'informasi_pilihan']);
    Route::post('/pesan', [SystemController::class, 'pesan']);
    Route::post('/hapus_{id}', [SystemController::class, 'hapus']);
    Route::put('/update_keterangan_{id}', [SystemController::class, 'update_keterangan']);
    Route::get('/cetak_laporan', [WebController::class, 'cetak_pilihan']);
});

Route::middleware('auth:admin')->group(function () {
    Route::get('/dashboard_admin', [WebController::class, 'dashboard_admin']);
    Route::get('/hapus_data_history', [SystemController::class, 'hapus_data_history']);
    Route::get('/manajemen_user', [WebController::class, 'manajemen_user']);
    Route::post('/manajemen_user_cari', [WebController::class, 'manajemen_user']);
    Route::post('/tambah_data_user_admin', [SystemController::class, 'tambah_data_user_admin']);
    Route::get('/hapus_data_user_{id}', [SystemController::class, 'hapus_data_user']);
    Route::put('/update_data_user_admin_{id}', [SystemController::class, 'update_data_user_admin']);
    Route::get('/manajemen_pemesanan', [WebController::class, 'manajemen_pemesanan']);
    Route::get('/cetak_manajemen_pemesanan_{id}', [WebController::class, 'cetak_manajemen_pemesanan']);
    Route::post('/manajemen_pemesanan_acc', [SystemController::class, 'manajemen_pemesanan_acc']);
    Route::get('/hapus_manajemen_pemesanan_{id}', [SystemController::class, 'hapus_manajemen_pemesanan']);
    Route::get('/reset_pemesanan_{id}', [SystemController::class, 'reset_pemesanan']);
    Route::get('/manajemen_jatwal', [WebController::class, 'manajemen_jatwal']);
    Route::post('/manajemen_jatwal_cari', [WebController::class, 'manajemen_jatwal']);
    Route::put('/perbarui_jam_{id}', [SystemController::class, 'perbarui_jam']);
    Route::get('/cetak_laporan_admin', [WebController::class, 'cetak_laporan_admin']);
    Route::get('/grafik_laporan', [WebController::class, 'grafik_laporan']);
    Route::get('/logout_admin', [LoginController::class, 'logout_admin']);
});

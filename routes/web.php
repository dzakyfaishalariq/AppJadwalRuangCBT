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
});

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\History;
use App\Models\RuanganPilihUser;
use App\Models\JatwalRuanganTersedia;

class WebController extends Controller
{
    // Area Login
    public function index()
    {
        $title = "Login";
        return view('login', ['title' => $title]);
    }
    public function registrasi()
    {
        $title = "Registrasi";
        return view('registrasi', ['title' => $title]);
    }
    public function dashbord()
    {
        $data_senin = JatwalRuanganTersedia::where('hari', 'Senin')->get();
        $data_selasa = JatwalRuanganTersedia::where('hari', 'Selasa')->get();
        $data_rabu = JatwalRuanganTersedia::where('hari', 'Rabu')->get();
        $data_kamis = JatwalRuanganTersedia::where('hari', 'Kamis')->get();
        $data_jumat = JatwalRuanganTersedia::where('hari', 'Jumat')->get();
        $data_sabtu = JatwalRuanganTersedia::where('hari', 'Sabtu')->get();
        $data_minggu = JatwalRuanganTersedia::where('hari', 'Minggu')->get();
        $title = "Dashbord";
        return view('dashbord_user', [
            'title' => $title,
            'data_senin' => $data_senin,
            'data_selasa' => $data_selasa,
            'data_rabu' => $data_rabu,
            'data_kamis' => $data_kamis,
            'data_jumat' => $data_jumat,
            'data_sabtu' => $data_sabtu,
            'data_minggu' => $data_minggu
        ]);
    }
    public function informasi_pilihan()
    {
        $title = 'Pilihan Anda';
        return view('informasi_pilih', ['title' => $title]);
    }
    public function cetak_pilihan()
    {
        $title = "Cetak Laporan";
        return view('cetak_laporan', ['title' => $title]);
    }
    public function dashboard_admin()
    {
        $title = "Admin";
        $data_jumlah = [
            User::all()->count(),
            JatwalRuanganTersedia::all()->count() - RuanganPilihUser::all()->count(),
            RuanganPilihUser::all()->count(),
            History::latest()->get(),
        ];
        return view('dasbord_admin', ['title' => $title, 'data_jumlah' => $data_jumlah]);
    }
    public function manajemen_user()
    {
        $title = "Manajemen User";
        $data = User::latest()->get();
        return view('manajemen_user', ['title' => $title, 'data' => $data]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $data_senin = JatwalRuanganTersedia::where('hari', 'Monday')->get();
        $data_selasa = JatwalRuanganTersedia::where('hari', 'Tuesday')->get();
        $data_rabu = JatwalRuanganTersedia::where('hari', 'Wednesday')->get();
        $data_kamis = JatwalRuanganTersedia::where('hari', 'Thursday')->get();
        $data_jumat = JatwalRuanganTersedia::where('hari', 'Friday')->get();
        $data_sabtu = JatwalRuanganTersedia::where('hari', 'Saturday')->get();
        $data_minggu = JatwalRuanganTersedia::where('hari', 'Sunday')->get();
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
}

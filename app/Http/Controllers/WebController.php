<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\History;
use Illuminate\Http\Request;
use App\Models\RuanganPilihUser;
use Illuminate\Support\Facades\Auth;
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
        $data = RuanganPilihUser::where('user_id', Auth::user()->id)->paginate(4);
        return view('informasi_pilih', ['title' => $title, 'data_pilihan' => $data]);
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
            History::latest()->with('user')->paginate(7),
        ];
        return view('dasbord_admin', ['title' => $title, 'data_jumlah' => $data_jumlah]);
    }
    public function manajemen_user()
    {
        $title = "Manajemen User";
        if (request()->has('user')) {
            $data = User::where('nama', 'LIKE', '%' . request('user') . '%')->orWhere('prodi', 'LIKE', '%' . request('user') . '%')->orWhere('tingkat', 'LIKE', '%' . request('user') . '%')->paginate(4);
        } else {
            $data = User::latest()->paginate(4);
        }
        return view('manajemen_user', ['title' => $title, 'data' => $data]);
    }
    public function manajemen_pemesanan()
    {
        $title = "Manajemen pemesanan";
        $data = User::latest()->get();
        return view('manajemen_pemesanan', ['title' => $title, 'data' => $data]);
    }
    public function manajemen_jatwal()
    {
        if (request()->has('cari')) {
            $title = "Manajemen Jatwal";
            $data = JatwalRuanganTersedia::where('hari', 'LIKE', '%' . request('cari') . '%')->paginate(5);
            return view('manajemen_jatwal', ['title' => $title, 'data' => $data]);
        } else {
            $title = "Manajemen Jatwal";
            $data = JatwalRuanganTersedia::paginate(7);
            return view('manajemen_jatwal', ['title' => $title, 'data' => $data]);
        }
    }
    public function cetak_laporan_admin()
    {
        $title = "Cetak Laporan Admin";
        $data = History::all();
        return view('cetak_laporan_admin', ['title' => $title, 'data' => $data]);
    }
    public function grafik_laporan()
    {
        $title = "Gerafik laporan";
        $data = User::all();
        $nama = [];
        $jumlah_dipilih = [];
        foreach ($data as $d) {
            $nama[] = $d->nama;
            $jumlah_dipilih[] = $d->ruanganpilihuser->count();
        }
        //dd($nama,$jumlah_dipilih);
        return view('grafik_laporan', ['title' => $title, 'nama' => $nama, 'jumlah_dipilih' => $jumlah_dipilih]);
    }
    public function cetak_manajemen_pemesanan(User $id)
    {
        $title = "Cetak Pemesanan";
        $data = $id->ruanganpilihuser;
        $nama = $id->nama;
        $prodi = $id->prodi;
        return view('cetak_manajemen_pemesanan', ['title' => $title, 'data' => $data, 'nama' => $nama, 'prodi' => $prodi]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\RuanganPilihUser;
use App\Models\JatwalRuanganTersedia;

class SystemController extends Controller
{
    //pesanan ruangan user
    public function pesan(Request $request)
    {
        $data = new RuanganPilihUser;
        //data untuk RuanganPilihUser
        $data->user_id = (int)$request->user_id;
        $data->sesi = $request->sesi;
        $data->jam_awal = $request->jam_awal;
        $data->jam_akhir = $request->jam_akhir;
        $data->keterangan = $request->keterangan;
        $data->status = (bool)$request->status;
        $data->tanggal_pesan = $request->tanggal_pesan;
        $data->save();
        //data untuk jatwal_ruangan_tersedias
        JatwalRuanganTersedia::where('id', (int)$request->jadwal_id)->update(['status' => (bool)$request->status]);
    }
}

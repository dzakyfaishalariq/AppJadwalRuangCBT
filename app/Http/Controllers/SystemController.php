<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\RuanganPilihUser;
use App\Models\JatwalRuanganTersedia;
use Illuminate\Support\Facades\Validator;

class SystemController extends Controller
{
    //pesanan ruangan user
    public function pesan(Request $request)
    {
        //data untuk RuanganPilihUser
        $data = new RuanganPilihUser;
        $rules = [
            'user_id' => 'required|integer',
            'jatwalruangantersedia_id' => 'required|integer|unique:ruangan_pilih_users',
            'sesi' => 'required|integer',
            'jam_awal' => 'required',
            'jam_akhir' => 'required',
            'keterangan' => 'required',
            'status' => 'required|boolean',
            'tanggal_pesan' => 'required',
            'hari' => 'required',
        ];
        $text = [
            'jatwalruangantersedia_id.unique' => 'maaf jadwal sudah di pesan sama orang lain harap memilih jadwal yang kosong lainnya',
        ];
        $validasi = Validator::make($request->all(), $rules, $text);
        if ($validasi->fails()) {
            return redirect()->intended('/dashbord')->with('pesan', $validasi->errors()->first());
        }
        $data->user_id = (int)$request->user_id;
        $data->jatwalruangantersedia_id = (int)$request->jatwalruangantersedia_id;
        $data->sesi = $request->sesi;
        $data->jam_awal = $request->jam_awal;
        $data->jam_akhir = $request->jam_akhir;
        $data->keterangan = $request->keterangan;
        $data->status = (bool)$request->status;
        $data->tanggal_pesan = $request->tanggal_pesan;
        $data->hari = $request->hari;
        $nilai = $data->save();
        //data untuk jatwal_ruangan_tersedias
        if ($nilai) {
            JatwalRuanganTersedia::where('id', (int)$request->jatwalruangantersedia_id)->update(['status' => (bool)$request->status]);
            return redirect()->intended('/dashbord')->with('pesan', 'Data anda sudah di pesan');
        } else {
            return redirect()->intended('/dashbord')->with('pesan', 'maaf data anda belum terpesan');
        }
    }
    public function hapus(Request $request, RuanganPilihUser $id)
    {
        JatwalRuanganTersedia::where('id', (int)$request->jatwalruangantersedia_id)->update(['status' => 0]);
        $id->delete();
        return redirect()->intended('/informasi_pilihan');
    }
    public function update_keterangan(Request $request, RuanganPilihUser $id)
    {
        $id->keterangan = $request->keterangan;
        $id->save();
        return redirect()->intended('/informasi_pilihan');
    }
}

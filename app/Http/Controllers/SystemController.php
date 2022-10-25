<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\RuanganPilihUser;
use App\Models\JatwalRuanganTersedia;
use App\Models\History;

use Illuminate\Support\Facades\Validator;

class SystemController extends Controller
{
    //pesanan ruangan user
    public function pesan(Request $request)
    {
        //sambilan memasukan data history
        $history = new History;
        $history->user_id = (int)$request->user_id;
        $history->jatwalruangantersedia_id = (int)$request->jatwalruangantersedia_id;
        $history->hari = $request->hari;
        $history->tanggal_pemesanan = $request->tanggal_pesan;
        $history->tanggal_pemakaian = $request->tanggal_pemakaian;
        $history->jam_awal = $request->jam_awal;
        $history->jam_akhir = $request->jam_akhir;
        $history->keterangan = $request->keterangan;
        $history->prodi = $request->prodi;
        $nilai2 = $history->save();
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
            'acc' => 'required|boolean',
            'tanggal_pesan' => 'required',
            'tanggal_pemakaian' => 'required',
            'hari' => 'required',
        ];
        $text = [
            'jatwalruangantersedia_id.unique' => 'maaf jadwal sudah di pesan sama orang lain harap memilih jadwal yang kosong lainnya',
        ];
        $validasi = Validator::make($request->all(), $rules, $text);
        // digunakan untuk antisipasi nantinya dalam memilih jatwal yang tertindih di dalam system
        if ($validasi->fails()) {
            return redirect()->intended('/dashbord')->with('error', $validasi->errors()->first());
        }
        $data->user_id = (int)$request->user_id;
        $data->jatwalruangantersedia_id = (int)$request->jatwalruangantersedia_id;
        $data->sesi = $request->sesi;
        $data->jam_awal = $request->jam_awal;
        $data->jam_akhir = $request->jam_akhir;
        $data->keterangan = $request->keterangan;
        $data->status = (bool)$request->status;
        $data->acc = (bool)$request->acc;
        $data->tanggal_pesan = $request->tanggal_pesan;
        $data->tanggal_pemakaian = $request->tanggal_pemakaian;
        $data->hari = $request->hari;
        $nilai = $data->save();
        //data untuk jatwal_ruangan_tersedias
        if ($nilai && $nilai2) {
            JatwalRuanganTersedia::where('id', (int)$request->jatwalruangantersedia_id)->update(['status' => (bool)$request->status]);
            return redirect()->intended('/dashbord')->with('pesan', 'Data anda sudah di pesan');
        } else {
            return redirect()->intended('/dashbord')->with('error', 'maaf data anda belum terpesan');
        }
    }
    public function hapus(Request $request, RuanganPilihUser $id)
    {
        JatwalRuanganTersedia::where('id', (int)$request->jatwalruangantersedia_id)->update(['status' => 0]);
        $id->delete();
        return redirect()->intended('/informasi_pilihan')->with(['pesan' => 'Data Sudah di hapus']);
    }
    public function update_keterangan(Request $request, RuanganPilihUser $id)
    {
        $id->keterangan = $request->keterangan;
        $id->save();
        return redirect()->intended('/informasi_pilihan')->with(['pesan' => 'Keterangan Sudah di Ubah']);
    }
    public function tambah_data_user_admin(Request $request)
    {
        $data = new User;
        $rules = [
            'prodi' => 'required',
            'nama' => 'required',
            'tingkat' => 'required|integer',
            'email' => 'required|email:rfc,dns|unique:users',
            'password' => 'required'
        ];
        $text = [
            'prodi.required' => 'Data tidak boleh kosong',
            'nama.required' => 'Data tidak boleh kosong',
            'tingkat.required' => 'Data tidak boleh kosong',
            'email.required' => 'Data tidak boleh kosong',
            'email.email' => 'Buat email yang benar',
            'email.unique' => 'Email sudah ada yang punya harap isi lagi data dan gunakan email lainnya',
            'password.required' => 'Data tidak boleh kosong',
        ];
        $validasi = Validator::make($request->all(), $rules, $text);
        if ($validasi->fails()) {
            return redirect()->intended('/manajemen_user')->with('error', $validasi->errors()->first());
        }
        $data->prodi = $request->prodi;
        $data->nama = $request->nama;
        $data->tingkat = (int)$request->tingkat;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $nilai = $data->save();
        if ($nilai) {
            return redirect()->intended('/manajemen_user')->with('pesan', 'Data terkirim');
        } else {
            return redirect()->intended('/manajemen_user')->with('error', 'Data Belum Terkirim');
        }
    }
    public function hapus_data_user(User $id)
    {
        $id->delete();
        return redirect()->intended('/manajemen_user');
    }
    public function update_data_user_admin(Request $request, User $id)
    {
        $rules = [
            'prodi' => 'required',
            'nama' => 'required',
            'tingkat' => 'required|integer',
            'email' => 'email:rfc,dns',
            'password' => 'required'
        ];
        $text = [
            'prodi.required' => 'Data tidak boleh kosong',
            'nama.required' => 'Data tidak boleh kosong',
            'tingkat.required' => 'Data tidak boleh kosong',
            'email.required' => 'Data tidak boleh kosong',
            'email.email' => 'Buat email yang benar',
            'password.required' => 'Data tidak boleh kosong',
        ];
        $validasi = Validator::make($request->all(), $rules, $text);
        if ($validasi->fails()) {
            return redirect()->intended('/manajemen_user')->with('error', $validasi->errors()->first());
        }
        $id->prodi = $request->prodi;
        $id->nama = $request->nama;
        $id->tingkat = (int)$request->tingkat;
        $id->email = $request->email;
        $id->password = bcrypt($request->password);
        $nilai = $id->save();
        if ($nilai) {
            return redirect()->intended('/manajemen_user')->with('pesan', 'Data Berhasil Di edit!');
        } else {
            return redirect()->intended('/manajemen_user')->with('error', 'Data Belum Teredit!');
        }
    }
    public function manajemen_pemesanan_acc(Request $request)
    {
        $data = new RuanganPilihUser;
        foreach ($data->all() as $d) {
            if ($request->{$d->id} == "1") {
                $d->acc = (bool)$request->{$d->id};
                $d->save();
            }
            if ($request->{$d->id} == "0") {
                $d->acc = (bool)$request->{$d->id};
                $d->save();
            }
        }
        return redirect()->intended('/manajemen_pemesanan');
    }
    public function hapus_manajemen_pemesanan(Request $request, RuanganPilihUser $id)
    {
        JatwalRuanganTersedia::where('id', $id->jatwalruangantersedia_id)->update(['status' => 0]);
        $id->delete();
        return redirect()->intended('/manajemen_pemesanan');
    }
    public function edit_manajemen_pemesanan(Request $request, RuanganPilihUser $id)
    {
        $id->keterangan = $request->keterangan;
        $id->save();
        return redirect()->intended('/manajemen_pemesanan');
    }
    public function perbarui_jam(Request $request, JatwalRuanganTersedia $id)
    {
        $id->jam_awal = $request->jam_awal;
        $id->jam_akhir = $request->jam_akhir;
        $id->save();
        return redirect()->intended('/manajemen_jatwal');
    }
    public function reset_pemesanan(User $id)
    {
        foreach ($id->ruanganpilihuser as $d) {
            JatwalRuanganTersedia::where('id', $d->jatwalruangantersedia_id)->update(['status' => 0]);
            $d->delete();
        }
        return redirect()->intended('/manajemen_pemesanan');
    }
    public function hapus_data_history()
    {
        $data = History::latest()->get();
        foreach ($data as $d) {
            $d->delete();
        }
        return redirect()->intended('/dashboard_admin')->with('pesan', 'Data berhasil di hapus');
    }
}

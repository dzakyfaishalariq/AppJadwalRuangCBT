<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    // daftar user (Registrasi)
    public function registrasi_system(Request $request)
    {
        $data = new User;
        $rules = [
            'prodi' => 'required',
            'nama' => 'required',
            'tingkat' => 'required|integer',
            'username' => 'required',
            'email' => 'email:rfc,dns',
            'password' => 'required'
        ];
        $text = [
            'prodi.required' => 'Data tidak boleh kosong',
            'nama.required' => 'Data tidak boleh kosong',
            'tingkat.required' => 'Data tidak boleh kosong',
            'username.required' => 'Data tidak boleh kosong',
            'email.required' => 'Data tidak boleh kosong',
            'email.email' => 'Buat email yang benar',
            'password.required' => 'Data tidak boleh kosong',
        ];
        $validasi = Validator::make($request->all(), $rules, $text);
        if ($validasi->fails()) {
            return redirect()->intended('/registrasi')->with('pesan', $validasi->errors()->first());
        }
        $data->prodi = $request->prodi;
        $data->nama = $request->nama;
        $data->tingkat = (int)$request->tingkat;
        $data->username = $request->username;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $nilai = $data->save();
        if ($nilai) {
            return redirect()->intended('/')->with('pesan', 'data sudah di daftarkan segera lakukan login');
        } else {
            return redirect()->intended('/')->with('pesan', 'Maaf data belum masuk silahkan lakukan registrasi');
        }
    }
    //validasi
    public function login(Request $request)
    {
        $validasi = $request->validate([
            'username' => 'required|min:3',
            'password' => 'required',
        ]);
        if (Auth::attempt($validasi)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashbord');
        } else if (Auth::guard('admin')->attempt($validasi)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard_admin');
        }
        return back()->with('pesan', 'maaf username dan password anda salah');
    }
    //logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->intended('/');
    }
    public function logout_admin(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->intended('/');
    }
}

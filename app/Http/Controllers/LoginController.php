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
        // $rules = [
        //     'prodi' => 'required',
        //     'nama' => 'required',
        //     'tingkat' => 'required|integer',
        //     'username' => 'required',
        //     'email' => 'email:rfc,dns',
        //     'password' => 'required'
        // ];
        // $text = [
        //     'prodi.required' => 'Data tidak boleh kosong',
        //     'nama.required' => 'Data tidak boleh kosong',
        //     'tingkat.required' => 'Data tidak boleh kosong',
        //     'username.required' => 'Data tidak boleh kosong',
        //     'email.required' => 'Data tidak boleh kosong',
        //     'email.email' => 'Buat email yang benar',
        //     'password.required' => 'Data tidak boleh kosong',
        // ];
        // $validasi = Validator::make($request->all(), $rules, $text);
        // if ($validasi->fails()) {
        //     return redirect()->intended('/registrasi')->with('pesan', $validasi->errors()->first());
        // }
        $request->validate([
            #prodi hanya menerima huruf, titik dan spasi
            'prodi' => 'required|regex:/^[a-zA-Z\s.]+$/|string|min:4',
            // 'prodi' => 'required|string|min:4',
            #nama hanya menerima huruf, spasi
            'nama' => 'required|regex:/^[a-zA-Z\s]+$/|string|min:4',
            // 'nama' => 'required|string|min:4',
            'tingkat' => 'required|integer',
            // username hanya menerima huruf,angka
            'username' => 'required|regex:/^[a-zA-Z0-9]+$/|string|min:4|max:20',
            // 'username' => 'required|min:4',
            //email hanya menerima email yang benar, huruf, angka, titik, dan underscore
            'email' => 'required|email:rfc,dns|regex:/^[a-zA-Z0-9._]+@[a-zA-Z0-9]+\.[a-zA-Z0-9.]+$/|string|min:4',
            // 'email' => 'required|email:rfc,dns',
            //password hanya menerima huruf, angka, titik, dan underscore
            'password' => 'required|regex:/^[a-zA-Z0-9._]+$/|string|min:6|max:20',
            // 'password' => 'required|min:6'
        ]);
        $data->prodi = $request->prodi;
        $data->nama = $request->nama;
        $data->tingkat = (int)$request->tingkat;
        $data->username = $request->username;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $nilai = $data->save();
        if ($nilai) {
            return redirect()->intended('/')->with('pesan_registrasi', 'data sudah di daftarkan segera lakukan login');
        } else {
            return redirect()->intended('/')->with('pesan', 'Maaf data belum masuk silahkan lakukan registrasi');
        }
    }
    //validasi
    public function login(Request $request)
    {
        $validasi = $request->validate([
            'username' => 'required|regex:/^[a-zA-Z0-9]+$/|string|min:4|max:20',
            'password' => 'required|regex:/^[a-zA-Z0-9._]+$/|string|min:6|max:20',
        ]);
        if (Auth::attempt($validasi)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashbord');
        } else if (Auth::guard('admin')->attempt($validasi)) {
            $request->session()->regenerate();
            // return redirect()->intended('/dashboard_admin');
            return redirect('/dashboard_admin');
        }
        return back()->with('pesan', 'maaf username dan password anda salah');
    }
    //logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
    public function logout_admin(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}

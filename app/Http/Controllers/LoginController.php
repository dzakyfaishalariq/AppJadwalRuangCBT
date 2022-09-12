<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //validasi
    public function login(Request $request)
    {
        $validasi = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        if (Auth::attempt($validasi)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashbord');
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
}

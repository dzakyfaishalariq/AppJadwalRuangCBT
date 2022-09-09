<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        $title = "Dashbord";
        return view('dashbord_user', ['title' => $title]);
    }
}

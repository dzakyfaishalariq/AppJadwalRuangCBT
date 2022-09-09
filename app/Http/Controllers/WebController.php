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
}

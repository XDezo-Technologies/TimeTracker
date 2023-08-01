<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class frontendController extends Controller
{
    public function ok()
    {
        return view('ok');
    }
    public function index()
    {
        return view('frontend.dashboard');
    }
    public function profilepage()
    {
        return view('frontend.profile');
    }
}

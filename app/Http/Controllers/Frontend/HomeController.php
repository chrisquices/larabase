<?php

namespace App\Http\Controllers\Frontend;

class HomeController extends Controller
{
    public function index()
    {
        return view('frontend.home.index');
    }
}

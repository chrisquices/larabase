<?php

namespace App\Http\Controllers\Backend;

class DashboardController extends Controller
{
    public function index()
    {
        return view('backend.dashboard.index');
    }

    public function redirectToIndex()
    {
        return to_route('backend.dashboard.index');
    }
}

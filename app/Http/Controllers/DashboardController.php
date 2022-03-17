<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth:web');
    // }
    public function __construct() {
        auth()->setDefaultDriver('web');
     }

    public function index()
    {
        return view('dashboard.index');
    }
}

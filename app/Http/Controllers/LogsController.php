<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Logs;

class LogsController extends Controller
{

    public function __construct() {
        auth()->setDefaultDriver('web');
    }


    public function index()
    {
        // dd("hey");
        $logs = Logs::all()->sortByDesc("id");; 
        return view('dashboard.index', compact('logs'));
    }
}

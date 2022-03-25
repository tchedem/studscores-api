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

    //  public function api_email($user_email, $clientMesssage) {
        public function api_email() {
            $name = 'username';
            return view("mail", compact('name'));
            $user_email = "hountluc@gmail.com";

            dd($user_email);
            $data = array('name'=>"StudScore API");
            Mail::send('mail', $data, function($message) use($user_email, $clientMesssage) { dd($user_email);
                $message->to('hountluc@gmail.com', 'Tutorials Point')->subject
                ('Rapport Laravel HTML Testing Mail');
            $message->from('lhountondji@sbin.bj','Virat Gandhi');
            });
    }
}

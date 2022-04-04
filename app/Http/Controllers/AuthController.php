<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('web', ['except' => ['login']]);
    // }
    public function __construct() {
        auth()->setDefaultDriver('web');
     }

    public function register(){
        return view('security.register');
    }

    public function login(){
        //return view('admin.login');
        return view('security.login');
    }

    public function reset_password(){
        return view('security.passwords.reset_password');
    }

    public function authenticate(Request $request)
    {
        $request -> validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
// dd($request);
        // return redirect()->route('logs');
        if(auth()->attempt($request->only('email', 'password'))){ //auth() est une helper
            return redirect()->route('logs');
            // return redirect()->route('dashboard');
        }

        redirect()->back()->withErrors('Les identifiants sont incorrects.');
    }

    public function logout(){
        auth()->logout();
        return redirect()->route('login');
    }

}

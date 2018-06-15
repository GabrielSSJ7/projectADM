<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //


    public function __construct()
    {
        //$this->middleware('auth:mylogin');
    }

    public function home()
    {
        return view('user.login');
    }

    public function index()
    {
        echo "Está em dashboard";
    }

    public function Login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        //print_r($credentials);

        if (Auth::guard('custom')->attempt($credentials)){
            return redirect()->intended('/dashboard');
        }

        return "Not logged";
    }

    public function logout(){
        Auth::guard('custom')->logout();
        return redirect("/");
    }
}

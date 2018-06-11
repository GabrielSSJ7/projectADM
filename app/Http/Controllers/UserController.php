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
        //dd($request->all());

//        if (Auth::guard('mylogin')->attempt(['email'=>$request->email, 'password'=> $request->password])){
//            echo "Logado";
//        }

        $credentials = $request->only('email', 'password');



        if (Auth::guard('mylogin')->attempt($credentials)) {
            // Authentication passed...
            return "Logado";
        }


        //return redirect()->back()->withErrors(['Login inválido']);
    }
}

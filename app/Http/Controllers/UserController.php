<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //

    public function __construct()
    {
        //$this->middleware('auth');
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

        $credentials = [
            'email' => $request->get('email'),
            'password' => $request->get('password')
        ];

        try {
            Auth::attempt($credentials, false);
            return redirect('dashboard');
        } catch (Exception $e) {
            $e->getMessage();
        }


    }
}

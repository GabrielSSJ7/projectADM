<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //

    public function index()
    {
        return view("user.register");
    }

    public function cadastrar(Request $request)
    {
        $mensagens = [
          'required'=> 'O campo :attribute é necessário',
          'min'=> 'Sua senha deve conter no mínimo :min caractéres'
        ];

        $this->validate($request, [
            'nome' => 'required',
            'email' => 'required',
            'password' => 'required|min:6'
        ], $mensagens);

        $admin = new \App\Adm;

        $admin->name = $request->nome;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        $admin->lvl_ac = 1;

        $admin->save();

        return redirect('/');
    }
}

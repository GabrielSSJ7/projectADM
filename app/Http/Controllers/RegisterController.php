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
        $mensagens = ['required' => 'O campo :attribute é necessário',
            'min' => 'Sua senha deve conter no mínimo :min caractéres',
            'email' => 'Você deve digitar um email válido'];

        $this->validate($request, [
            'nome' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6'
        ], $mensagens);

        $admin = new \App\Adm;

        $admin->name = $request->nome;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        $admin->lvl_ac = 1;

        if ($admin->save()) {
            return redirect()->route('login')->with(["status"=>"Usuário cadastrado com sucesso"]);
        }

        return redirect()->route('login')->withErrors(["status"=>"Não foi possível cadastrar este usuário"]);

    }
}

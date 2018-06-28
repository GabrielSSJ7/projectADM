<?php

namespace App\Http\Controllers;

use App\Adm;
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


        if (!$this->CheckDataIfExist($request->email, 'email')) {
            if ($admin->save()) {

                $caixa = new \App\Caixa;

                $caixa->user_id = $admin->id;
                $caixa->saldo = 0;

                $caixa->save();
                return redirect()->route('logar')->with(["status" => "Usuário cadastrado com sucesso"]);

            }

            return redirect()->route('login')->withErrors(["status" => "Não foi possível cadastrar este usuário"]);
        }
        else{
            return redirect()->back()->withErrors(["status" => "E-mail: ". $request->email. " já está em uso por outro usuário."])
                ->withInput(['nome'=> $request->nome, 'email'=> $request->email]);
        }


    }


    private function CheckDataIfExist($email, $column)
    {
        $adm = Adm::where($column, '=', $email)->count();

        if ($adm >= 1)
            return true;
        else
            return false;
    }
}

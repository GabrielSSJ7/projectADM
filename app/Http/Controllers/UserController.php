<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //


    public function __construct()
    {
        
    }

    public function home()
    {
        if (Auth::guard('custom')->check()) {
            # code...
            return redirect()->route('painel.principal');
        }else{
            return view('user.login');    
        }
        
    }

    public function index()
    {
        echo "Está em dashboard";
    }

    public function Login(Request $request)
    {
        //Definindo as regras do formulário
        $rules = ["email"=>"required|email", "password"=>"required|min:6"];
        //Definindo as mensagens caso o formulário seja reprovado
        $mensagens = ['required'=> 'O campo :attribute é necessário',
            'min'=> 'Sua senha deve conter no mínimo :min caractéres',
            'email'=> 'Você deve digitar um email válido'];

        //Validando formulário
        $this->validate($request,$rules,$mensagens);

        //Se o formulário estiver correto, definindo credenciais de acesso
        $credentials = $request->only('email', 'password');

        //Checando se o que foi digitado está no banco
        if (Auth::guard('custom')->attempt($credentials)){
            // Se for autenticado, redirecionar para o painel
            return redirect()->intended('/dashboard');
        }
        //Se não for autenticado, redirecionar para a página anterior.
        return redirect()->back()->withInput(["email" => $request->email])
        ->withErrors(array("message"=>"Usuário não encontrado"));
    }

    public function logout()
    {
        Auth::guard('custom')->logout();
        return redirect("/");
    }
}

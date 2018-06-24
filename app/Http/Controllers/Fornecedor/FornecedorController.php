<?php

namespace App\Http\Controllers\Fornecedor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use DB;

class FornecedorController extends Controller
{
    //

    public function meusFornecedoresIndex(){

    	$user = Auth::guard('custom')->id();
        $fornecedor = DB::table('fornecedor')->leftJoin('user', 'fornecedor.user_id', '=', 'user.id')
            ->where('fornecedor.user_id', '=', $user)->get();        

    	return view('fornecedor.meus-fornecedores', ["fornecedores"=> $fornecedor]);
    }

     public function editFornecedoresIndex(){

    	$user = Auth::guard('custom')->id();
        $fornecedor = DB::table('fornecedor')->leftJoin('user', 'fornecedor.user_id', '=', 'user.id')
            ->where('fornecedor.user_id', '=', $user)->get();        

    	return view('fornecedor.meus-fornecedores', ["fornecedores"=> $fornecedor]);
    }

    public function addFornecedor(Request $request){
    	$rules = [
    		'NomeFornecedor'=> 'required',
    		'TelefoneFornecedor' => 'max:15'
    	];

    	$messages = [
			'required' => 'O campo :attribute é necessário',
			'numeric' => 'Digite apenas números para o campo :attribute',
			'min'=> 'O campo :attribute tem que ter no mínimo :min dígitos',
			'max'=> 'O campo :attribute tem que ter no maximo :max dígitos'
    	];

    	$this->validate($request, $rules, $messages);

    	$user_id = Auth::guard('custom')->id();
    	$fornecedor = new \App\Fornecedor;

    	$fornecedor->nome = $request->NomeFornecedor;
    	$fornecedor->endereco = $request->EnderecoFornecedor;
    	$fornecedor->telefone = $request->TelefoneFornecedor;
    	$fornecedor->user_id = $user_id;

    	if ($fornecedor->save()) {
    		# code...
    		return redirect()->route('add.fornecedor')->with(['status'=>'Fornecedor cadastrado com sucesso.']);
    	}

    	return redirect()->route('add.fornecedor')->withErrors("Não foi possível cadastrar este fornecedor.");
    }
}

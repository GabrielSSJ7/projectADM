<?php

namespace App\Http\Controllers\Fornecedor;

use App\Fornecedor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class FornecedorController extends Controller
{
    //

    public function meusFornecedoresIndex()
    {

        $user = Auth::guard('custom')->id();
        $fornecedor = DB::table('fornecedor')->leftJoin('user', 'fornecedor.user_id', '=', 'user.id')
            ->where('fornecedor.user_id', '=', $user)->get();

        return view('fornecedor.meus-fornecedores', ["fornecedores" => $fornecedor]);
    }

    public function editFornecedoresIndex($id)
    {

        $fornecedor = DB::table('fornecedor')->select('product.nome as pnome', 'fornecedor.nome as fnome',
            'product.cod as pcod', 'product.preco_fornecedor as preco', 'product.preco as vpreco',
            'fornecedor.endereco', 'fornecedor.telefone', 'fornecedor.cod_forn')->join('product', 'fornecedor.cod_forn', '=',
            'product.cod_forn')->where('fornecedor.cod_forn', '=', $id)->get();

        //dd($fornecedor);

        return view('fornecedor.edit-fornecedor', ["fornecedor" => $fornecedor]);
    }

    public function addFornecedor(Request $request)
    {
        $rules = [
            'NomeFornecedor' => 'required',
            'TelefoneFornecedor' => 'max:15'
        ];

        $messages = [
            'required' => 'O campo :attribute é necessário',
            'numeric' => 'Digite apenas números para o campo :attribute',
            'min' => 'O campo :attribute tem que ter no mínimo :min dígitos',
            'max' => 'O campo :attribute tem que ter no maximo :max dígitos'
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
            return redirect()->route('add.fornecedor')->with(['status' => 'Fornecedor cadastrado com sucesso.']);
        }

        return redirect()->route('add.fornecedor')->withErrors("Não foi possível cadastrar este fornecedor.");
    }


    public function getFornForProduct()
    {
        $user = Auth::guard('custom')->id();
        $fornecedor = DB::table('fornecedor')->where('fornecedor.user_id', '=', $user)->get();


        return response()->json($fornecedor);
    }

    public function EditDataFornecedor(Request $request)
    {

        $fornecedor = Fornecedor::find($request->cod_forn);

        $fornecedor->nome = $request->nome;
        $fornecedor->endereco = $request->endereco;
        $fornecedor->telefone = $request->telefone;

        $response = array("nome" => $request->nome, "telefone" => $request->telefone, "endereco" => $request->endereco);

        json_encode($response);

        if ($fornecedor->save())
            return response()->json([$response, ['status' => 'ok']]);
        else
            return response()->json(['status'=>'erro']);

    }
}


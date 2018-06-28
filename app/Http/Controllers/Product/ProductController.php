<?php

namespace App\Http\Controllers\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    //


    public function index()
    {
        $user = Auth::guard('custom')->id();
        $produtos = DB::table('product')->select('product.nome as pnome', 'product.cod', 'product.preco',
            'product.preco_fornecedor','stock.qtde' ,'fornecedor.nome as fnome')
            ->leftJoin('user', 'product.cod_user', '=', 'user.id')
            ->leftJoin('stock', 'product.cod', '=', 'stock.cod_prod')
            ->leftJoin('fornecedor', 'product.cod_forn', '=', 'fornecedor.cod_forn')
            ->where('product.cod_user', '=', $user)->get();
        //dd($produtos);
        return view('product.products', ['products' => $produtos]);
    }

    public function edit($id)
    {

        $produto = DB::table('product')->where('cod', $id)->get()->first();

        return view("product.edit", ["product" => $produto]);
    }

    public function EditProduct(Request $request)
    {
        try {
            DB::table('product')->where('cod', $request->get('cod'))->update([
                'nome' => $request->get('nome'),
                'preco' => $request->get('preco')
            ]);

            return redirect('myproducts');
        } catch (\Exception $e) {
           return $e->getMessage();
        }
    }

    public function DeleteProduct($id){

//        if (DB::table('product')->where('cod', '=', $id)->delete())
//            return response()->json(['status' => 1]);
//        else
//            return response()->json(['status'=> 0]);

        if (DB::table('product')->where('cod', '=', $id)->delete())
            return redirect()->back();
        else
            return redirect()->back();
    }

    public function CreateProduct(Request $request)
    {

         //dd($request->fornecedor);

        $rules = [
            'nome' => 'required',
            'preco' => 'required|numeric',
            'PrecoCompra' => 'required|numeric',
            'fornecedor' => 'required'
        ];

        $mensagens = [
            'required' => 'O campo :attribute é necessário',
            'numeric' => 'O campo :attribute deve conter apenas números'
            ];

        $this->validate($request, $rules, $mensagens);

        $Product = new \App\Produto;
        $Product->nome = $request->nome;
        $Product->preco = $request->preco;
        $Product->preco_fornecedor = $request->PrecoCompra;
        $Product->cod_forn = $request->fornecedor;
        $Product->cod_user = Auth::guard('custom')->id();
        $Product->save();

        $prod_id = $Product->id;

        $Stock = new \App\Stock;
        $Stock->cod_prod = $prod_id;

        if (!empty($request->qtde))
            $Stock->qtde = $request->qtde;
        else
            $Stock->qtde = 0;

        $Stock->save();

        return redirect()->route('view.produtos');
    }
}

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
        $produtos = DB::table('product')->leftJoin('user', 'product.cod_user', '=', 'user.id')
            ->leftJoin('stock', 'product.cod', '=', 'stock.cod_prod')
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
            $e->getMessage();
        }
    }

    public function CreateProduct(Request $request)
    {

       // dd(Auth::guard('custom')->id());

        $Product = new \App\Produto;
        $Product->nome = $request->nome;
        $Product->preco = $request->preco;
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

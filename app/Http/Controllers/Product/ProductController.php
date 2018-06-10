<?php

namespace App\Http\Controllers\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    //


    public function index(){
       $produtos = DB::table('product')->leftJoin('stock','product.cod', '=', 'stock.cod_prod')
       ->get();
       return view('product.products', ['products' => $produtos]);
    }

    public function edit($id){

        $produto = DB::table('product')->where('cod', $id)->get()->first();

        return view("product.edit", ["product"=>$produto]);
    }

    public function EditProduct(Request $request){
         try{
             DB::table('product')->where('cod', $request->get('cod'))->update([
                 'nome'=>$request->get('nome'),
                 'preco'=>$request->get('preco')
             ]);

            return redirect('myproducts');
         }catch (\Exception $e){
             $e->getMessage();
         }
    }

    public function CreateProduct(Request $request){
        $Product = new \App\Produto;

        $Product->nome = $request->nome;

        $Product->preco = $request->preco;

        $Product->save();

        return redirect('myproducts');
    }
}

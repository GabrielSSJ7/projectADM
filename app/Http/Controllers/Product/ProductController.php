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
}

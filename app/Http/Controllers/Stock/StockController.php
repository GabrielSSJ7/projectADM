<?php

namespace App\Http\Controllers\Stock;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class StockController extends Controller
{
    //
    public function SellIndex()
    {

        return view('stock.sell');
    }

    public function getProduct(Request $request)
    {
        $cod = $request->get('cod');
        $response = DB::table('product')->leftJoin('stock', 'product.cod', '=', 'stock.cod_prod')
            ->where("cod", $cod)->get();
        $response = json_decode($response);

        if (!empty($response)){
            return response()->json([$response, ["status"=>"ok"]]);
        }else
        {
            return response()->json([$response, ["status"=>"error"]]);
        }
        //return response()->json([$response, ["status"=>"ok"]]);
    }


}

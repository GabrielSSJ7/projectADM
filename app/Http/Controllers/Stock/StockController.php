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

    public function EnterIndex()
    {

        return view('stock.enter');
    }

    public function getProduct(Request $request)
    {
        $cod = $request->get('cod');
        $response = DB::table('product')->leftJoin('stock', 'product.cod', '=', 'stock.cod_prod')
            ->where("cod", $cod)->get();
        $response = json_decode($response);

        if (!empty($response)) {
            return response()->json([$response, ["status" => "ok"]]);
        } else {
            return response()->json([$response, ["status" => "error"]]);
        }
        //return response()->json([$response, ["status"=>"ok"]]);
    }

    public function enterProduct(Request $request)
    {
        $entrada = new \App\Entrada;

        $entrada->cod_esto = $request->cod_esto;
        $entrada->qtde = $request->qtde;

        $entrada->save();

        $stock = DB::table('stock')->where('cod_esto', $entrada->cod_esto)->get();

        //dd($stock->first()->qtde);
        $finalQtde = $stock->first()->qtde + $entrada->qtde;

        DB::table('stock')->where('cod_esto', $entrada->cod_esto)->update(["qtde" => $finalQtde]);

        return redirect('myproducts');

    }

    public function sellProduct(Request $request)
    {
        $saida = new \App\Saida;

        $saida->cod_esto = $request->cod_esto;
        $saida->qtde = $request->qtde;

        $saida->save();

        $stock = DB::table('stock')->where('cod_esto', $saida->cod_esto)->get();

        //dd($stock->first()->qtde);
        $finalQtde = $stock->first()->qtde - $saida->qtde;

        DB::table('stock')->where('cod_esto', $saida->cod_esto)->update(["qtde" => $finalQtde]);

        return redirect('myproducts');

    }


}

<?php

namespace App\Http\Controllers\Stock;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StockController extends Controller
{
    //
    public function SellIndex(){

        return view('stock.sell');
    }

}

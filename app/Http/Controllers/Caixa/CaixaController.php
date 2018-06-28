<?php

namespace App\Http\Controllers\Caixa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;

class CaixaController extends Controller
{
    //

    public function dashboardIndex()
    {

    	$id = Auth::guard('custom')->id();

        $caixa = DB::table('caixa')->where('user_id', '=', $id)->get();
        //dd($caixa->first()->saldo);

        return view('dashboard', ['caixa'=> $caixa]);
    }
}

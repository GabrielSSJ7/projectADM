<?php

namespace App\Http\Controllers\Caixa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CaixaController extends Controller
{
    //

    public function dashboardIndex()
    {

        $caixa = \App\Caixa::all()->first();

       // dd($caixa->first()->user_id);

        return view('dashboard', ['caixa'=> $caixa]);
    }
}

<?php

namespace App\Http\Controllers\Stock;

use App\Entrada;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StockController extends Controller
{
    //
    public function SellIndex()
    {
        $user = Auth::guard('custom')->id();
        setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
        //date_default_timezone_set('America/Sao_Paulo');



        $table = DB::table('saida')->select('nome', 'saida.created_at as data', 'saida.qtde as quantidade'
            , 'stock.qtde as qtde_atual', 'saida.qtde_old', 'preco')
            ->join('stock', 'saida.cod_esto', '=', 'stock.cod_prod')
            ->join('product', 'stock.cod_esto', '=', 'product.cod')
            ->join('user', 'product.cod_user', '=', 'user.id')
            ->where('product.cod_user', '=', $user)
            ->orderBy('data', 'desc')->get();

        return view('stock.sell', ['dados' => $table]);
    }

    public function EnterIndex()
    {
        $user = Auth::guard('custom')->id();
        setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
        date_default_timezone_set('America/Sao_Paulo');

        $table = DB::table('entrada')->select('nome', 'entrada.created_at as data', 'entrada.qtde as quantidade',
            'stock.qtde as qtde_atual', 'entrada.qtde_old','preco')
            ->join('stock', 'entrada.cod_esto', '=', 'stock.cod_prod')
            ->join('product', 'stock.cod_esto', '=', 'product.cod')
            ->join('user', 'product.cod_user', '=', 'user.id')
            ->where('product.cod_user', '=', $user)
            ->orderBy('data')->get();

        return view('stock.enter', ['dados' => $table]);
    }

    public function getProduct(Request $request)
    {
        $user = Auth::guard('custom')->id();
        //Código vindo do formulário
        $cod = $request->get('cod');
        //Buscando produto no banco baseado em seu código
        $response = DB::table('product')
            ->leftJoin('stock', 'product.cod', '=', 'stock.cod_prod')
            ->where("cod", $cod)
            ->where('product.cod_user', '=', $user)
            ->get();

        //Convertendo a resposta JSON
        $response = json_decode($response);

        if (!empty($response))
            return response()->json([$response, ["status" => "ok"]]);
        else
            return response()->json([$response, ["status" => "error"]]);


    }

    public function enterProduct(Request $request)
    {
        //Definindo regras do formulário
        $rules = ['qtde' => 'required'];

        //Definindo mensagens de erro caso formulário seja inválido
        $mensagens = ['required' => 'O campo :attribute é necessário'];

        //Validando formulário
        $this->validate($request, $rules, $mensagens);

        //Instanciando classe entrada
        $entrada = new \App\Entrada;

        //Definindo os dados passados pela requisição no modelo
        $entrada->cod_esto = $request->cod_esto;
        $entrada->qtde = $request->qtde;


        //Buscando o produto no estoque através do código do estoque
        $stock = DB::table('stock')->where('cod_esto', $entrada->cod_esto)->get();

        //dd($stock->first()->qtde);

        $finalQtde = $stock->first()->qtde + $entrada->qtde;

        $entrada->qtde_old = $stock->first()->qtde;

        //Salvando dados no banco de dados
        $entrada->save();

        DB::table('stock')->where('cod_esto', $entrada->cod_esto)->update(["qtde" => $finalQtde]);

        //Retornando status da venda
        return redirect()->route('view.entrada.produto')->with(['status' => 'Sucesso']);

    }

    public function sellProduct(Request $request)
    {
        //Definindo regras do formulário
        $rules = [
            'qtde' => 'required'
        ];

        //Definindo mensagens de erro caso formulário seja inválido
        $mensagens = [
            'required' => 'O campo :attribute é necessário'
        ];

        dd($request);

        //Validando formulário
        $this->validate($request, $rules, $mensagens);

        // Instanciando modelo de Saída
        $saida = new \App\Saida;

        //Definindo os dados passados pela requisição no modelo
        $saida->cod_esto = $request->cod_esto;
        $saida->qtde = $request->qtde;

        //Buscando o produto no estoque através do código do estoque
        $stock = DB::table('stock')->where('cod_esto', $request->cod_esto)->get();

        //Inserindo a quantidade atual na tabela SAIDA
        $saida->qtde_old = $stock->first()->qtde;

        //dd($stock->first()->qtde);

        //Vendo se há produto em estoque
        if ($stock->first()->qtde <= 0) {
            return ['status' => "Produto em falta"];
        }
        //Subtraindo qtde do estoque pela qtde que definida no formulário
        $finalQtde = $stock->first()->qtde - $saida->qtde;

        /*if ($finalQtde < 0) {

            dd($finalQtde);
        } else {

          return  var_dump($finalQtde);
        }*/

         if ($finalQtde >= 0) {
             //Salvando dados no banco de dados na tabela SAIDA
             $saida->save();

             //Atualizando a quantidade do produto no banco de dados
             DB::table('stock')->where('cod_esto', $saida->cod_esto)->update(["qtde" => $finalQtde]);



             //Retornando status da venda
             return redirect()->route('view.saida.produto')->with(['status' => 'Sucesso']);
         }

        return redirect()->route('view.saida.produto')->with(['status' => 'Você não tem produto suficiente para vender. Qtde do produto: '.$stock->first()->qtde]);
    }


    public function registroEntrada()
    {
        setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
        date_default_timezone_set('America/Sao_Paulo');
        $table = Entrada::all();

        //dd(strftime('%A, %d de %B de %Y', strtotime($table)));
        dd($table);
    }


}

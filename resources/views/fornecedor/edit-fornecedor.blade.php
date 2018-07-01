@extends('template.app')

@section('content')
    @if(count($fornecedor) > 0)
        <div class="card" style="margin-top: 2%;">
            <div class="card-header">
                <div class="container">
                    <div class="row" style="margin-bottom: 10px">
                        <input type="hidden" id="_token" value="{{csrf_token()}}">
                        <input type="hidden" id="cod_forn" value="{{$fornecedor->first()->cod_forn}}">
                        <div class="col-sm">
                            <div class="row">
                                <h2 style="margin-right: 2%;"><strong>Fornecedor: </strong></h2><h2 id="h2-nome-fornecedor">{{$fornecedor->first()->fnome}}</h2><span id="span-nome-fornecedor"
                                                                                                                                     class="span-fornecedor-input"></span>
                            </div>

                        </div>

                        <div class="col-sm">
                            <button style="float:right" class="btn btn-outline-dark " id="btn-edit-fornecedor">Editar
                            </button>
                            <button style="float:right; display: none;" class="btn btn-outline-dark " id="btn-save-fornecedor">Salvar
                            </button>
                        </div>

                    </div>

                    <div class="row" style="margin-bottom: 10px;">
                        <strong style="margin-right: 1%;">Endereço: </strong><span id="span-endereco-fornecedor"
                                                         class="span-fornecedor-input">{{$fornecedor->first()->endereco}}</span>
                    </div>

                    <div class="row" >
                        <strong style="margin-right: 1%;">Telefone: </strong><span id="span-telefone-fornecedor"
                                                         class="span-fornecedor-input">{{$fornecedor->first()->telefone}}</span>
                    </div>

                </div>


            </div>
            <div class="error"></div>

            <div class="container">
                <div class="card-body">
                    <div class="row">
                        <h4>Produtos fornecidos</h4>
                    </div>
                    <div class="row">
                        @foreach($fornecedor as $produto)
                            <div class="card" style="margin: 0 5px;">
                                <div class="card-body">
                                    <input class="id-produto" type="hidden" value="{{$produto->pcod}}">
                                    <h5><strong>Nome: </strong>{{$produto->pnome}}</h5>
                                    <i style="float:right;cursor: pointer" class="delete-produto-">

                                        <a href="/{{$produto->pcod}}/deleteproduct">

                                            <img src="{{asset('images/dustbin.png')}}" width="24" alt=""></a></i>

                                    <a href="{{url("/$produto->pcod/editproduct")}}"><i class="material-icons"
                                                                                       style="float:right;margin-right:  20px;"><img
                                                src="{{asset('images/baseline_edit_black_18dp.png')}}">
                                        </i></a>

                                    <p><strong>Código:</strong> {{$produto->pcod}}</p>
                                    <p><strong>Preço de venda: </strong>R$<?php
                                        //Vendo se possui ponto, se possuir indica que há números flutuantes
                                        $index = strrpos($produto->vpreco, ".");
                                        if (isset($index) && !empty($index)) {
                                            $product_float_lenght = strlen(substr($produto->vpreco, strrpos($produto->vpreco, ".") + 1));
                                            if ($product_float_lenght == 1) {
                                                echo substr_replace($produto->vpreco, "0", $index + 2);
                                            } else {
                                                echo $produto->vpreco;
                                            }
                                        } else {
                                            echo $produto->vpreco . ".00";
                                        }
                                        ?></p>
                                    <p class="card-text"><strong>Preço de compra: </strong>R$<?php
                                        //Vendo se possui ponto, se possuir indica que há números flutuantes
                                        $index = strrpos($produto->preco, ".");
                                        if (isset($index) && !empty($index)) {
                                            $product_float_lenght = strlen(substr($produto->preco, strrpos($produto->preco, ".") + 1));
                                            if ($product_float_lenght == 1) {
                                                echo substr_replace($produto->preco, "0", $index + 2);
                                            } else {
                                                echo $produto->preco;
                                            }
                                        } else {
                                            echo $produto->preco . ".00";
                                        }
                                        ?></p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @else

        <div class="card" style="margin-top: 2%;">
            <div class="card-header">
                <h2></h2>
            </div>


            <div class="error"></div>

            <div class="container">


                <div class="card-body">
                    <div class="row">
                        <h4>Produtos fornecidos</h4>
                    </div>
                    <div class="row">
                        <div class="card">
                            <div class="card-body">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    @endif


@endsection

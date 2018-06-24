@extends('template.app')

@section('content')

    <div class="card" style="margin-top: 2%;">
        <div class="card-header">
            <h2>{{$fornecedor->first()->fnome}}</h2>
        </div>

        <div class="container">


            <div class="card-body">
                <div class="row">
                    <h4>Produtos fornecidos</h4>
                </div>
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <h5><strong>Nome: </strong>{{$fornecedor->first()->pnome}}</h5>
                            <i style="float:right;cursor: pointer" class="delete-produto-fornecedor"><img src="{{asset('images/dustbin.png')}}" width="24" alt="" ></i>
                            <p class="card-text"><strong>Preço: </strong>R$<?php
                                //Vendo se possui ponto, se possuir indica que há números flutuantes
                                $index = strrpos($fornecedor->first()->preco, ".");
                                if (isset($index) && !empty($index)) {
                                    $product_float_lenght = strlen(substr($fornecedor->first()->preco, strrpos($fornecedor->first()->preco, ".") + 1));
                                    if ($product_float_lenght == 1) {
                                        echo substr_replace($fornecedor->first()->preco, "0", $index + 2);
                                    } else {
                                        echo $fornecedor->first()->preco;
                                    }
                                } else {
                                    echo $fornecedor->first()->preco . ".00";
                                }
                                ?></p>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection

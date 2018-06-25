@extends('template.app')

@section('content')
    @if(count($fornecedor) > 0)
        <div class="card" style="margin-top: 2%;">
            <div class="card-header">
                <h2>{{$fornecedor->first()->fnome}}</h2>
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
                                    <p class="card-text"><strong>Preço varejo: </strong>R$<?php
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

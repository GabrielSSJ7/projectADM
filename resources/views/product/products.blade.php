@extends('template.app')

@section('content')

    <div class="row">
        @if(!empty($products) && isset($products))
            @foreach($products as $product)
                <div class="col-sm-4">
                    <div class="card" style="width: 18rem;margin: 2% auto; height: 14rem">
                        <div class="card-body">
                            <h5 class="card-title" style="text-align: center">{{$product->nome}}</h5>
                            <h5 class="card-title">Código do produto: {{$product->cod}}</h5>
                            <a href="{{url("/$product->cod/editproduct")}}"><i class="material-icons"
                                                                               style="float:right"><img
                                        src="{{asset('images/baseline_edit_black_18dp.png')}}">
                                </i></a>
                            <p class="card-text"><strong>Preço: </strong>R$<?php
                                //Vendo se possui ponto, se possuir indica que há números flutuantes
                                $index = strrpos($product->preco, ".");
                                if (isset($index) && !empty($index)) {
                                    $product_float_lenght = strlen(substr($product->preco, strrpos($product->preco, ".") + 1));
                                    if ($product_float_lenght == 1) {
                                        echo substr_replace($product->preco, "0", $index + 2);
                                    } else {
                                        echo $product->preco;
                                    }
                                } else {
                                    echo $product->preco . ".00";
                                }
                                ?></p>

                            @if(!empty($product->qtde))
                                <p class="card-text"><strong>Quantidade: </strong>{{$product->qtde}}</p>
                            @else
                                <p class="card-text"><strong>Quantidade: </strong><span
                                        style="color: red">em falta</span>
                                </p>
                                {{--<a href="#" class="btn btn-primary">Go somewhere</a>--}}
                            @endif
                        </div>
                    </div>
                </div>

            @endforeach
            <div class="col-sm-4" style="cursor: pointer" data-toggle="modal" data-target="#exampleModalCenter">
                <div class="card" style="width: 18rem;margin: 2% auto; height: 14rem;">
                    <div class="card-body" style="margin: 20% auto">
                        <h5 class="card-title" style="text-align: center; ">Adicionar produto</h5>
                    </div>
                </div>
            </div>
        @else

        @endif

    </div>






@endsection

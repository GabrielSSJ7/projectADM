@extends('template.app')

@section('content')
    <div class="row">
        @foreach($products as $product)
            <div class="col-sm-4">
                <div class="card" style="width: 18rem;margin-top: 2%;">
                    <div class="card-body">
                        <h5 class="card-title" style="text-align: center">{{$product->nome}}</h5>
                        <h5 class="card-title">Código do produto: {{$product->cod}}</h5>
                        <a href="#"><i class="material-icons" style="float:right"><img src="{{asset('images/baseline_edit_black_18dp.png')}}">
                            </i></a>
                        <p class="card-text"><strong>Preço: </strong>{{$product->preco}}</p>
                        @if(!empty($product->qtde))
                        <p class="card-text"><strong>Quantidade: </strong>{{$product->qtde}}</p>
                        @else
                            <p class="card-text"><strong>Quantidade: </strong><span style="color: red">em falta</span></p>
                        {{--<a href="#" class="btn btn-primary">Go somewhere</a>--}}
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>



@endsection

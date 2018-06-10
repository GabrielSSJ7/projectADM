@extends('template.app')

@section('content')

    <div class="card" style="margin-top: 2%;">
        <div class="card-header">
            Painel
        </div>
        <div class="card-body">
            <div class="row">
                <a href="{{url('myproducts')}}" class="btn btn-light col-sm-2">
                    <img src="{{asset('images/warehouse.png')}}" class="img-fluid"><br>
                   <span style="text-align: center">Meus Produtos</span>
                </a>
            </div>
        </div>
    </div>

@endsection

@extends('template.app')

@section('content')

    <div class="card" style="margin-top: 2%;">
        <div class="card-header">
            Painel
        </div>
        <div class="card-body">
            <div class="row">
                <div style="padding: 0 5px;" class="col-sm-2">
                    <a href="{{url('myproducts')}}" class="btn btn-light ">
                        <img src="{{asset('images/warehouse.png')}}" class="img-fluid"><br>
                        <span style="text-align: center">Meus Produtos</span>
                    </a>
                </div>

                <div style="padding: 0 5px;" class="col-sm-2">
                    <a href="{{url('outstock')}}" class="btn btn-light ">
                        <img src="{{asset('images/money.png')}}" class="img-fluid"><br>
                        <span style="text-align: center">Vender</span>
                    </a>
                </div>

            </div>
        </div>
    </div>

@endsection

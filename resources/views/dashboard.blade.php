@extends('template.app')

@section('content')

    <div class="card" style="margin-top: 2%;">
        <div class="card-header">
            Painel
        </div>
        <div class="card-body">
            <div class="row">
                <div style="padding: 0 5px;" class="col-sm-2 ">
                    <a href="{{route('view.produtos')}}" class="btn btn-outline-dark dashboard-item">
                        <img src="{{asset('images/warehouse.png')}}" class="img-fluid"><br>
                        <span style="text-align: center">Meus Produtos</span>
                    </a>
                </div>

                <div style="padding: 0 5px;" class="col-sm-2 ">
                    <a href="{{route('view.saida.produto')}}" class="btn btn-outline-dark dashboard-item">
                        <img src="{{asset('images/money.png')}}" class="img-fluid"><br>
                        <span style="text-align: center">Vender</span>
                    </a>
                </div>

                <div style="padding: 0 5px;" class="col-sm-2 ">
                    <a href="{{route('view.entrada.produto')}}" class="btn btn-outline-dark dashboard-item">
                        <img src="{{asset('images/barcode.png')}}" class="img-fluid"><br>
                        <span style="text-align: center">Entrada</span>
                    </a>
                </div>

                <div style="padding: 0 5px;" class="col-sm-2 ">
                    <a href="{{route('view.meus.fornecedores')}}" class="btn btn-outline-dark dashboard-item">
                        <img src="{{asset('images/delivery-truck.png')}}" class="img-fluid"><br>
                        <span style="text-align: center">Fornecedores</span>
                    </a>
                </div>

            </div>
        </div>
    </div>

@endsection

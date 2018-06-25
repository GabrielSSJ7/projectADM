@extends('template.app')

@section('content')
    <div class="row">
        <div class="col-sm-9">
            <div class="row">
                <div class="card" style="margin-top: 2%;">
                    <div class="card-header">
                        Painel
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3 ">
                                <a href="{{route('view.produtos')}}" class="btn btn-outline-dark dashboard-item">
                                    <img src="{{asset('images/warehouse.png')}}" class="img-fluid"><br>
                                    <p>Meus Produtos</p>
                                </a>
                            </div>

                            <div class="col-sm-3 ">
                                <a href="{{route('view.saida.produto')}}" class="btn btn-outline-dark dashboard-item">
                                    <img src="{{asset('images/money.png')}}" class="img-fluid"><br>
                                    <p>Vender</p>
                                </a>
                            </div>

                            <div class="col-sm-3 ">
                                <a href="{{route('view.entrada.produto')}}" class="btn btn-outline-dark dashboard-item">
                                    <img src="{{asset('images/barcode.png')}}" class="img-fluid"><br>
                                    <p>Entrada</p>
                                </a>
                            </div>

                            <div class="col-sm-3 ">
                                <a href="{{route('view.meus.fornecedores')}}"
                                   class="btn btn-outline-dark dashboard-item">
                                    <img src="{{asset('images/delivery-truck.png')}}" class="img-fluid"><br>
                                    <p>Fornecedores</p>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-3" style="margin-top: 1.5%;">
            <div class="card">
                <div class="card-title">
                    <h4 style="text-align: center">Caixa</h4>
                </div>
                <div class="card-body">
                    <p style="font-size: 80%; text-align: center"><strong>Seu saldo:</strong> R${{$caixa->saldo}}</p>
                </div>
            </div>
        </div>
    </div>

@endsection

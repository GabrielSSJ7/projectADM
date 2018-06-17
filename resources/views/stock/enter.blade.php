@extends('template.app')

@section('content')

    <div class="card formEntradaSaida"  style="">
        <div class="card-header">
            <strong>Entrada</strong>
        </div>
        <div class="card-body ">
            <form role="form" action="{{route("entrada.produto")}}" method="post">
                <input type="hidden" value="{{csrf_token()}}" id="token" name="_token">
                <input type="hidden" id="cod_esto" name="cod_esto">
                <div class="row">
                    <div class="col-sm-2">
                        <label for="name">Código:</label>
                        <input type="number" class="form-control" id="cod_entrada" name="cod">
                    </div>

                    <div class="col-sm-6">
                        <label for="address">Nome:</label>
                        <input type="address" class="form-control" id="nome" name="nome" disabled>
                    </div>

                    <div class="col-sm-2">
                        <label for="qtde">Qtde:</label>
                        <input type="number" class="form-control" id="qtde" name="qtde" disabled>
                    </div>

                    <div class="col-sm-2">
                        <label for="qtde">Preço(R$):</label>
                        <input type="number" class="form-control" id="preco" name="preco" disabled>
                    </div>
                </div>

                <button style="margin-top: 2%;float: right;" type="submit" class="btn btn-outline-success">Finalizar
                </button>
            </form>
        </div>
    </div>

    <style>th{
            text-align: center;
        }</style>


    <div class="col-sm-12" style="margin: 0 auto">
        <table class="table table-dark table-hover table-responsive">
            <thead>
            <tr>
                <th>Produto</th>
                <th>Data</th>
                <th>Qtde entrada</th>
                <th>Qtde na data</th>
                <th>Qtde atual</th>
            </tr>
            </thead>
            <tbody>
            @foreach($dados as $dado)
                <tr>
                    {{--{{strftime('%A, %d de %B de %Y - %H:%mhrs', strtotime($dado->created_at))}}--}}
                    <th>{{$dado->nome}}</th>
                    <th>{{strftime("%d de %B de %Y às %R",strtotime($dado->data))}}</th>
                    <th>{{$dado->quantidade}}</th>
                    <th>{{$dado->qtde_old}}</th>
                    <th>{{$dado->qtde_atual}}</th>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>


    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                <style>#qtde {
                        border-color: red;
                    }</style>
            </ul>
        </div>
    @endif
    <div class="error">

    </div>
    <script src="{{asset("js/stock.js")}}"></script>

@endsection

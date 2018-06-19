@extends('template.app')

@section('content')


    <div class="card formEntradaSaida">
        <div class="card-header">
            <strong>Saída </strong>
        </div>
        <div class="card-body ">
            <form role="form" action="{{route("saida.produto")}}" method="post">
                <input type="hidden" value="{{csrf_token()}}" id="token" name="_token">
                <input type="hidden" id="cod_esto" name="cod_esto">
                <div class="row">
                    <div class="col-sm-2">
                        <label for="name">Código:</label>
                        <input type="number" class="form-control" id="cod_saida" name="cod">
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

                @if (session('status'))
                    <p style="float:left; color:#4e555b;padding: 2% 1%;
                        background-color: #abdde5;margin-top: 1%;">{{ session('status')}}</p>
                @endif
                <button style="margin-top: 2%;float: right; " type="submit" class="btn btn-outline-success">Finalizar
                </button>

            </form>
        </div>
    </div>

    <style>th {
            text-align: center;
        }</style>

    <div class="table-responsive">
        <table style="width:80%;margin: 0 auto" class="table table-sm table-dark table-hover table-bordered">
            <thead>
            <tr>
                <th>Produto</th>
                <th>Data</th>
                <th>Qtde</th>
                <th>Estoq/data</th>
                <th>Estoq Atual</th>
                <th>Valor</th>
            </tr>
            </thead>
            <tbody>
            @foreach($dados as $dado)
                <tr>
                    {{--{{strftime('%A, %d de %B de %Y - %H:%mhrs', strtotime($dado->created_at))}}--}}
                    <td scope="row">{{$dado->nome}}</td>
                    <td>{{trim(strftime("%d de %B de %Y às %H:%Mhrs",strtotime($dado->data)))}}</td>
                    <td>{{$dado->quantidade}}</td>
                    <td>{{$dado->qtde_old}}</td>
                    <td>{{$dado->qtde_atual}}</td>
                    <td><?php $preco = $dado->quantidade * $dado->preco; echo $preco?></td>
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

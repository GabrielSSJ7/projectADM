@extends('template.app')

@section('content')

    <div class="card" style="margin: 2% auto; width: 80%;">
        <div class="card-header">
            <strong>Entrada</strong>
        </div>
        <div class="card-body ">
            <form role="form" action="{{url("enterproduct")}}" method="post">
                <input type="hidden" value="{{csrf_token()}}" id="token" name="_token">
                <input type="hidden" id="cod_esto" name="cod_esto">
                <div class="row">
                    <div class="col-sm-2">
                        <label for="name">Código:</label>
                        <input type="number" class="form-control" id="cod" name="cod">
                    </div>

                    <div class="col-sm-6">
                        <label for="address">Nome:</label>
                        <input type="address" class="form-control" id="nome" name="nome" disabled>
                    </div>

                    <div class="col-sm-2">
                        <label for="qtde">Qtde:</label>
                        <input type="number" class="form-control" id="qtde" name="qtde" >
                    </div>

                    <div class="col-sm-2">
                        <label for="qtde">Preço(R$):</label>
                        <input type="number" class="form-control" id="preco" name="preco" disabled>
                    </div>
                </div>

                <button style="margin-top: 2%;float: right;" type="submit" class="btn btn-outline-success">Finalizar</button>
            </form>
        </div>
    </div>


    <div class="error">

    </div>
    <script src="{{asset("js/stock.js")}}"></script>

@endsection

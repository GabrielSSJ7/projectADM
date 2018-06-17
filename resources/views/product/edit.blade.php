@extends('template.app')

@section('content')

    <div class="card" id="editForm">
        <div class="card-header">
            <strong>Alterar produto</strong>
            <p style="float: right;">Cod: {{$product->cod}}</p>
        </div>

        <div class="card-body ">
            <form action="{{route("editar.produto")}}" method="post">
                {{csrf_field()}}
                <input type="hidden" name="cod" value="{{$product->cod}}">
                <div class="form-group">
                    <label for="nome" style="padding-right: 1%;">Nome:</label>
                    <input type="text" name="nome" class="form-control" value="{{$product->nome}}">
                </div>
                <div class="form-group">
                    <label for="nome" style="padding-right: 1%;">Preço(R$):</label>
                    <input type="text" name="preco" class="form-control" value="{{$product->preco}}">
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-dark" style="float: right" value="Alterar">
                </div>
            </form>
        </div>
    </div>

@endsection

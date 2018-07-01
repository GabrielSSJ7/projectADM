@extends('template.app')

@section('content')
    @if(session('status'))
        <div class="alert alert-success" style="margin-top: 1%; ">
            <div class="row" style="text-align: center">
                <h5 class="col-sm-12" style="color: #4e555b">{{session('status')}}</h5>
            </div>
        </div>
    @endif

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
                    <input id="inputNome" type="text" name="nome" class="form-control" value="{{$product->nome}}">
                    @if($errors->has('nome'))
                        <p style="color:red">{{$errors->first('nome')}}</p>
                        <style>#inputNome{border-color:red}</style>
                    @endif
                </div>
                <div class="form-group">
                    <label for="nome" style="padding-right: 1%;">Preço de venda(R$):</label>
                    <input id="inputPreco" type="text" name="preco" class="form-control" value="{{$product->preco}}">
                    @if($errors->has('preco'))
                        <p style="color:red">{{$errors->first('preco')}}</p>
                        <style>#inputPreco{border-color:red}</style>
                    @endif
                </div>

                <div class="form-group">
                    <label for="nome" style="padding-right: 1%;">Preço de compra(R$):</label>
                    <input id="inputPrecoCompra" type="text" name="PrecoCompra" class="form-control" value="{{$product->preco_fornecedor}}">
                    @if($errors->has('PrecoCompra'))
                        <p style="color:red">{{$errors->first('PrecoCompra')}}</p>
                        <style>#inputPrecoCompra{border-color:red}</style>
                    @endif

                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-dark" style="float: right" value="Alterar">
                </div>
            </form>
        </div>
    </div>

@endsection

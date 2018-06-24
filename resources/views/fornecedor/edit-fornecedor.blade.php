@extends('template.app')

@section('content')

    <div class="card" style="margin-top: 2%;">
        <div class="card-header">
            <h2>{{$fornecedor->first()->nome}}</h2>
        </div>

        <div class="container">


            <div class="card-body">
                <div class="row">
                    <h4>Produtos fornecidos</h4>

                </div>
            </div>
        </div>
    </div>

@endsection

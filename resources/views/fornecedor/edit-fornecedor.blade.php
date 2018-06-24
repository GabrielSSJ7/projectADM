@extends('template.app')

@section('content')

<div class="card" style="margin-top: 2%;">
    <div class="card-header">
        {{$fornecedor->nome}}
    </div>

    <div class="container">

    
    <div class="card-body">
        <div class="row">
            @foreach($fornecedores as $fornecedor)
            
                <div  class="card col-sm-4" style=" cursor: pointer; margin: 0 10px;">
                    <div class="card-body">
                        <h5><strong>Fornecedor:</strong> {{$fornecedor->nome}}</h5>
                        <a href="{{url("/$fornecedor->cod_forn/editfornecedor")}}"><i class="material-icons"
                                                                               style="float:right"><img
                                        src="{{asset('images/baseline_edit_black_18dp.png')}}">
                                </i></a>
                        @if(!empty($fornecedor->endereco) && isset($fornecedor->endereco))
                            <p><strong>Endereço: </strong>{{$fornecedor->endereco}}</p>
                        @endif
                        @if(!empty($fornecedor->telefone) && isset($fornecedor->telefone))
                            <p><strong>Telefone: </strong>{{$fornecedor->telefone}}</p>
                        @endif
                    </div>
                </div>
                
            @endforeach

            <div  class="card col-sm-4" style=" cursor: pointer;" data-toggle="modal" data-target="#fornecedorModal">
              <div class="card-body">
                    <a href="{{route('logar')}}"><h5 style="text-align: center;margin-top:30%;">Adicionar Fornecedor</h5></a>
              </div>
              
            </div>
        </div>
    </div>
    </div>
</div>

    @endsection

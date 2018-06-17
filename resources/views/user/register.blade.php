@extends('template.app')

@section('content')
    <style>


    </style>

    <div class="card" id="card-login" style="">
        <div class="row" style="text-align: center">
            <h1 class="col-sm-12" style="color: #4e555b">Cadastrar</h1>
        </div>


        <form action="{{route('user.cadastrar')}}" method="post">
            <input type="hidden" value="{{csrf_token()}}" name="_token">
            <div class="row">
                <div class="form-group col-sm-10 center">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" id="inputNome" name="nome" value="{{old('nome')}}">
                    @if($errors->has('nome'))
                        <p style="color:red">{{$errors->first('nome')}}</p>
                        <style>#inputNome{border-color:red}</style>
                    @endif
                </div>
                <div class="form-group col-sm-10 center">
                    <label for="email">E-mail</label>
                    <input type="text" class="form-control" id="inputEmail" name="email" value="{{old('email')}}">
                    @if($errors->has('email'))
                        <p style="color:red">{{$errors->first('email')}}</p>
                        <style>#inputEmail{border-color:red}</style>
                    @endif
                </div>
                <div class="form-group col-sm-10 center">
                    <label for="email">Senha</label>
                    <input type="password" class="form-control" id="inputPassword" name="password">
                    @if($errors->has('password'))
                        <p style="color:red">{{$errors->first('password')}}</p>
                        <style>#inputPassword{border-color:red}</style>
                    @endif
                </div>

                <div class="form-group col-sm-10 center">
                    <input class="btn btn-dark" style="float:right; margin-top: 2%;" type="submit" value="Cadastrar">
                </div>
            </div>

        </form>

    </div>

@endsection

@extends('template.app')

@section('content')
    <style>
        body {
            background: #4e555b

        }

        #card-login {
            width: 50%;
            margin: 10% auto;
            padding: 10px;
        }

        .center {
            margin: 0 auto;
        }

        @media only screen and (max-width: 800px) {
            #card-login {
                width: 100%;
            }
        }
    </style>

    <div class="card" id="card-login" style="">
        <div class="row" style="text-align: center">
            <h1 class="col-sm-12" style="color: #4e555b">Entrar</h1>
        </div>

        <form action="{{url('/logar')}}" method="post">
            <input type="hidden" value="{{csrf_token()}}" name="_token">
            <div class="row">
                <div class="form-group col-sm-10 center">
                    <label for="email">E-mail</label>
                    <input type="text" class="form-control" name="email">
                </div>
                <div class="form-group col-sm-10 center">
                    <label for="email">Senha</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <div class="form-group col-sm-10 center">
                    <a href="#">Esqueceu sua senha?</a>
                    <input class="btn btn-dark" style="float:right; margin-top: 2%;" type="submit" value="Entrar">
                </div>
            </div>

        </form>

    </div>

@endsection

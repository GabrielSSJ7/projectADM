<html>
<head>

    <title>ADM</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
          integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link href="{{asset("css/app_blade.css")}}" rel="stylesheet">
    </link>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="{{asset('js/_app.js')}}"></script>
    @if(\Illuminate\Support\Facades\Request::routeIs('view.produtos'))
        <script>
            $(document).ready(function () {
                $.ajax({
                    url: "getforn",
                    dataType: 'html',
                    type: 'get',
                    data: {_token: $("#token").val()},
                    success: function (msg) {
                        var listjson = JSON.parse(msg);
                        console.log(listjson[0]);
                        var x = 0;
                        var select = document.getElementById('inputGroupSelect01');
                        //select.html('');

                        for (x = 0; x < listjson.length; x++) {
                            var opt = document.createElement('option');
                            opt.value = listjson[x].cod_forn;
                            opt.innerHTML = listjson[x].nome;
                            select.appendChild(opt);
                            //$("#inputGroupSelect01").append("<options value="+ listjson[x].nome +">"+listjson[x].nome+"</options>");
                        }
                    },
                    error: function (msg) {
                        $(".error").html(msg['responseText']);
                    }
                });
            });
        </script>
    @endif
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">ADM</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{route('painel.principal')}}">Inicio <span
                        class="sr-only">(current)</span></a>
            </li>
            @if(\Illuminate\Support\Facades\Auth::check())
                <li class="nav-item ">
                    <a class="nav-link" href="{{route('view.produtos')}}">Meus produtos</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{route('view.saida.produto')}}">Vender</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{route('view.entrada.produto')}}">Entrada</a>
                </li>
        </ul>
        @else
        </ul>
        <ul class="navbar-nav justify-content-end">
            <li class="nav-item">
                <a class="nav-link" href="{{route("view.user.cadastro")}}" style="cursor: pointer">Cadastrar-se</a>
            </li>
        </ul>
        @endif

        @if(\Illuminate\Support\Facades\Request::routeIs('view.produtos'))
            <ul class="navbar-nav justify-content-end">
                <li class="nav-item">
                    <a class="nav-link nav-add-produto" style="cursor: pointer" data-toggle="modal"
                       data-target="#exampleModalCenter">Adicionar
                        Produto</a>
                </li>
            </ul>
        @endif

        @if(\Illuminate\Support\Facades\Auth::guard('custom')->check())
            <ul class="navbar-nav justify-content-end">


                <div class="dropdown">
                    <li class="nav-item" id="dropdownMenuButton" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false" style="cursor: pointer">
                        <a class="nav-link dropdown-toggle">{{\Illuminate\Support\Facades\Auth::guard('custom')->user()->name}}</a>
                    </li>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li class="nav-item">
                            <a class="nav-link dropdown-item" href="{{route("deslogar")}}" style="cursor: pointer">Logout</a>
                        </li>
                    </div>
                </div>
            </ul>
    @endif

    <!--<form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>-->
    </div>
</nav>

@if ($errors->any())
    <div class="container">
        <div class="alert alert-danger" style="margin-top: 1%;">
            <h3>Ops:</h3>
            <ol>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ol>
        </div>
    </div>
@endif


<div class="container">
    @yield('content')
</div>

<!-- Modal Add Produto -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Adicionar novo produto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route("criar.produto")}}" method="post">
                <div class="modal-body">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="">Nome:</label>
                        <input type="text" class="form-control" name="nome">
                    </div>
                    <div class="form-group" id="div-select-fornecedor">
                        <select class="custom-select" id="inputGroupSelect01" name="fornecedor">
                            <option disabled selected>Escolha um fornecedor...</option>
                        </select>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-4">
                            <label for="">Preço final:</label>
                            <input type="text" class="form-control" name="preco">
                        </div>
                        <div class="col-sm-4">
                            <label for="">Preço compra:</label>
                            <input type="text" class="form-control" name="PrecoCompra">
                        </div>
                        <div class="col-sm-4">
                            <label for="">Qtde:</label>
                            <input type="text" class="form-control" name="qtde">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary">Finalizar</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal Add Fornecedores -->
<div class="modal fade" id="fornecedorModal" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Adicionar novo fornecedor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route("add.fornecedor")}}" method="post">
                <div class="modal-body">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="">Nome:</label>
                        <input type="text" class="form-control" name="NomeFornecedor">
                    </div>
                    <div class="form-group">
                        <label for="">Endereço(opcional):</label>
                        <input type="text" class="form-control" name="EnderecoFornecedor">
                    </div>
                    <div class="form-group">
                        <label for="">Telefone(opcional):</label>
                        <input type="text" class="form-control" name="TelefoneFornecedor">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary">Finalizar</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"
        integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
        crossorigin="anonymous"></script>
</body>
</html>

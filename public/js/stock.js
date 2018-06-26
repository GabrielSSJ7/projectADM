$(document).ready(function (e) {

    $("#cod_saida").keyup(function () {

        $.ajax({
            url: "getproduct",
            dataType: 'html',
            type: 'post',
            data: {cod: $("#cod_saida").val(), _token: $("#token").val()},
            success: function (msg) {
                console.log(msg);
                var listjson = JSON.parse(msg);


                if (listjson[1].status == "ok") {
                    $("#nome").val(listjson[0][0].nome);
                    $("#preco").val(listjson[0][0].preco);
                    $("#cod_esto").val(listjson[0][0].cod_esto);
                    if (listjson[0][0].qtde > 0) {
                        $("#qtde").prop('disabled', false);
                        $(".btn").prop('disabled', false);
                        $(".error").empty();
                    } else {
                        $("#nome").val(listjson[0][0].nome);
                        $("#preco").val(listjson[0][0].preco);
                        $("#cod_esto").val(listjson[0][0].cod_esto);
                        $("#qtde").prop('disabled', true);
                        $(".btn").prop('disabled', true);
                        //  $("#qtde").css("border-color","red");
                        $(".error").html("<div class='alert alert-danger'>Produto em falta</div>");
                    }

                } else if (listjson[1].status == "falta") {
                    $("#nome").val(listjson[0][0].nome);
                    $("#preco").val(listjson[0][0].preco);
                    $("#cod_esto").val(listjson[0][0].cod_esto);
                    $("#qtde").prop('disabled', true);
                    $(".btn").prop('disabled', true);
                    //  $("#qtde").css("border-color","red");
                    $(".error").html("<div class='alert alert-danger'>Produto em falta</div>");
                } else {
                    $("#nome").val('');
                    $("#preco").val('');
                    $("#cod_esto").val('');
                    $("#qtde").prop('disabled', true);
                    $(".btn").prop('disabled', false);
                    $(".error").empty();
                }
            },
            error: function (msg) {
                $(".error").html(msg['responseText']);
            }
        });

    });

    $("#cod_entrada").keyup(function () {

        $.ajax({
            url: "getproduct",
            dataType: 'html',
            type: 'post',
            data: {cod: $("#cod_entrada").val(), _token: $("#token").val()},
            success: function (msg) {
                console.log(msg);
                var listjson = JSON.parse(msg);


                if (listjson[1].status == "ok") {
                    $("#nome").val(listjson[0][0].nome);
                    $("#preco").val(listjson[0][0].preco_fornecedor);
                    $("#cod_esto").val(listjson[0][0].cod_esto);
                    $("#qtde").prop('disabled', false);
                }else {
                    $("#nome").val('');
                    $("#preco").val('');
                    $("#cod_esto").val('');
                    $("#qtde").prop('disabled', true);
                    $(".btn").prop('disabled', false);
                    $(".error").empty();
                }
            },
            error: function (msg) {
                $(".error").html(msg['responseText']);
            }
        });

    });


    $("#sell-form").on('submit', function () {

        return false;
    });

});

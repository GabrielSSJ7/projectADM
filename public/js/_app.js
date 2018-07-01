$(document).ready(function (e) {

    $(".delete-produto-fornecedor").on('click', function () {

        var id_prod = $(".id-produto").val();
        $.ajax({
            url: "/" + id_prod + "/deleteproduct",
            dataType: 'html',
            type: 'get',
            success: function (msg) {
                var listjson = JSON.parse(msg);
                console.log(listjson);
            },
            error: function (msg) {
                $(".error").html(msg['responseText']);
            }
        });
    });

    $("#btn-edit-fornecedor").on('click', function () {
        $("#btn-save-fornecedor").prop('disabled', false);
        $("#btn-save-fornecedor").fadeIn();

        var text_endereco = $("#span-endereco-fornecedor").html();
        var text_telefone = $("#span-telefone-fornecedor").html();


        $("#span-nome-fornecedor")
            .html("<input type='text'  style='margin-top: 4%;' name='fnome' id='fnome' value="+$("#h2-nome-fornecedor").html()+" >");
        $("#h2-nome-fornecedor").empty();


        $("#span-endereco-fornecedor").html("<input type='text' name='fendereco' id='fendereco' value='"+ text_endereco +"' >");
        $("#span-telefone-fornecedor").html("<input type='text'name='ftelefone' id='ftelefone' value="+text_telefone+">");

        $("#btn-save-fornecedor").on('click', function () {
            var _token = $("#_token").val();
            var cod_forn = $("#cod_forn").val();
            var fnome = $("#fnome").val();
            var fendereco = $("#fendereco").val();
            var ftelefone = $("#ftelefone").val();

            $.ajax({
                url: "/editdatafornecedor",
                dataType: 'html',
                type: 'post',
                data:{"_token": _token, "cod_forn": cod_forn, "nome": fnome, "endereco": fendereco, "telefone": ftelefone},
                beforeSend: function(){
                    $("#btn-save-fornecedor").prop('disabled', true);
                },
                success: function (msg) {
                    console.log(msg);
                    var listjson = JSON.parse(msg);
                    console.log(listjson[1].status);

                    if (listjson[1].status == 'ok'){
                        $("#span-nome-fornecedor").empty();
                        $("#h2-nome-fornecedor").html(listjson[0].nome);
                        $("#span-endereco-fornecedor").html(listjson[0].endereco);
                        $("#span-telefone-fornecedor").html(listjson[0].telefone);

                        $("#btn-save-fornecedor").fadeOut();
                    }
                },
                error: function (msg) {
                    console.log(msg);
                    $(".error").html(msg['responseText']);
                }
            });
        });
    });
});

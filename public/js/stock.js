$(document).ready(function (e) {

    $("#cod").keyup(function () {

        $.ajax({
            url: "getproduct",
            dataType: 'html',
            type: 'post',
            data: {cod: $("#cod").val(), _token: $("#token").val()},
            success: function (msg) {
                var listjson = JSON.parse(msg);

                //console.log(listjson[0][0].cod_esto);

                if (listjson[1].status == "ok") {
                    $("#nome").val(listjson[0][0].nome);
                    $("#preco").val(listjson[0][0].preco);
                    $("#cod_esto").val(listjson[0][0].cod_esto);
                }else{
                    $("#nome").val('');
                    $("#preco").val('');
                    $("#cod_esto").val('');
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

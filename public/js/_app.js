$(document).ready(function (e) {

    $(".delete-produto-fornecedor").on('click', function () {
        $.ajax({
            url: "getforn",
            dataType: 'html',
            type: 'get',
            data: {_token: $("#token").val()},
            success: function (msg) {
                var listjson = JSON.parse(msg);
                console.log(listjson[0]);
            },
            error: function (msg) {
                $(".error").html(msg['responseText']);
            }
        });
    });
});

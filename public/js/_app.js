$(document).ready(function (e) {

    $(".delete-produto-fornecedor").on('click', function () {

        var id_prod = $(".id-produto").val();
        $.ajax({
            url: "/"+ id_prod + "/deleteproduct",
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
});

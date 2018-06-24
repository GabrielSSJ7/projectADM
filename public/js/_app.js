$(document).ready(function (e) {

    $("#nav-add-produto").on('click', function () {
        $.ajax({
            url: "getforn",
            dataType: 'html',
            type: 'get',
            data: {_token: $("#token").val()},
            success: function (msg) {
                var listjson = JSON.parse(msg);
                var x = 0
                for (x = 0; x < listjson.length; x++) {
                    $("#optionsForn").html("<options>"+listjson[x].nome+"</options>");
                }
            },
            error: function (msg) {
                $(".error").html(msg['responseText']);
            }
        });
    });
});

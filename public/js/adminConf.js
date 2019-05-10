$(document).ready(function () {
    $(".nav-menu li.sem").click(function () {
        $(".nav-menu li.sem").each(function () {
            $(this).removeClass("menu-active");
        });
        var valorId = $(this).attr("id");
        $(".nav-menu li.sem#" + valorId).addClass("menu-active");
        var url_atual = window.location.href;
        $.ajax({
            url: url_atual + "/" + valorId + "/",
            type: 'POST',
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function () {
                // Load
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                valorId: valorId
            }, success: function (data, textStatus, jqXHR) {
                $("#containerLoad").html(data);
            }
        });
    });

    $(".nav-menu li.sem#agenda").trigger('click');
});
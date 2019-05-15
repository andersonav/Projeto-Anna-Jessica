$("#formAdmin").submit(function (e) {
    e.preventDefault();
    var formData = new FormData(this);
    var url_atual = window.location.href;
    var tipoPageAdm = $(".nav-menu li.sem.menu-active").attr('id');
    var action = $("input[name=action]").val();
    var rota = url_atual + "/" + tipoPageAdm + "/" + action;
    $.ajax({
        url: rota,
        type: 'POST',
        data: formData,
        dataType: 'json',
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function () {

        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            $(".fechar").click();
            setTimeout(function () {
                swal({
                    title: '<strong>Operação realizada com sucesso!</strong>',
                    type: 'success',
                    showCloseButton: true,
                });
                $(".nav-menu li.sem.menu-active").trigger('click');
            }, 500);
        }, error: function (errors, textStatus, errorThrown) {

            $.each(errors.responseJSON, function (key, value) {
                $('.errors').append('<div class="ui negative message"> <i class="close icon"></i><div class="header">' + value + '</div></div>');
                $(".field." + key).addClass("error");
            });


        },
        complete: function () {

        }
    });
});

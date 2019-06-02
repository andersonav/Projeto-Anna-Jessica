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
            $(".modal").modal('hide');
            setTimeout(function () {
                Swal.fire({
                    position: 'center',
                    type: 'success',
                    title: '<strong>Operação realizada com sucesso!</strong>',
                    showConfirmButton: false,
                    timer: 2000
                });
                setTimeout(function () {
                    $('.bootstrap-select:not(.input-group-btn)').css('display', 'none');
                }, 100);
                $(".nav-menu li.sem.menu-active").trigger('click');
            }, 500);

            setTimeout(function () {
                $('.bootstrap-select:not(.input-group-btn)').css('display', 'inline-block');
            }, 2600);
        }, error: function (errors, textStatus, errorThrown) {
            $('.errors').empty();
            var erros = $.parseJSON(errors.responseText);

            $.each(erros.errors, function (key, value) {
                $(".errors").append('<div class="alert alert-danger" role="alert" id="mensagemErro">' + value + '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            });
        },
        complete: function () {

        }
    });
});

$(document).ready(function () {
    $("#myFormLogin").submit(function () {
        var dados = new FormData(this);
        $.ajax({
            url: "/login",
            type: 'POST',
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function () {

            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: dados,
            success: function (data, textStatus, jqXHR) {
                window.location = '/home';
            }, error: function (data, textStatus, errorThrown) {
                var erros = $.parseJSON(data.responseText);
                $(".mensagensErros").empty();
                $.each(erros.errors, function (key, value) {
                    $(".mensagensErros").append('<div class="alert alert-danger" role="alert" id="mensagemErro">' + value + '</div>');
                });
            },
            complete: function () {
            }
        });
    });

    $("#myFormRemmemberPass").submit(function () {
        var dados = new FormData(this);
        $.ajax({
            // Fazer rota de esqueceu senha
            url: "/password/email",
            type: 'POST',
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function () {

            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: dados,
            success: function (data, textStatus, jqXHR) {
                $(".modal").modal('hide');
                setTimeout(function () {
                    Swal.fire({
                        position: 'center',
                        type: 'success',
                        title: '<strong>Operação realizada com sucesso. Te enviamos um email para recuperação de senha!</strong>',
                        showConfirmButton: false,
                        timer: 2000
                    });
                }, 500);
            }, error: function (data, textStatus, errorThrown) {
                var erros = $.parseJSON(data.responseText);
                $(".mensagensErros").empty();
                $.each(erros.errors, function (key, value) {
                    $(".mensagensErros").append('<div class="alert alert-danger" role="alert" id="mensagemErro">' + value + '</div>');
                });
            },
            complete: function () {
            }
        });
    });
});

function closeModalLogin() {
    $("#buy-ticket-modal").modal('hide');
}
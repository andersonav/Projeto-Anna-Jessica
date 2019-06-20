$(document).ready(function () {
    getCountUsuario();
    getCountUsuarioEventoDestaque();
    getEventosRealizados();



});

function getCountUsuario() {
    var rota = window.location.href;
    $.ajax({
        url: rota + "/getUsuarios",
        type: 'POST',
        data: {

        },
        beforeSend: function () {

        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            $("#countUsuarios").html(data[0].qtdUsuario);
        }, error: function (errors, textStatus, errorThrown) {

        },
        complete: function () {

        }
    });
}

function getCountUsuarioEventoDestaque() {
    var rota = window.location.href;
    $.ajax({
        url: rota + "/getUsuariosEventoDestaque",
        type: 'POST',
        data: {

        },
        beforeSend: function () {

        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            $("#countUsuariosEventoDestaque").html(data[0].qtdUsuario);
        }, error: function (errors, textStatus, errorThrown) {

        },
        complete: function () {

        }
    });
}

function getEventosRealizados() {
    var rota = window.location.href;
    $.ajax({
        url: rota + "/getEventosRealizados",
        type: 'POST',
        data: {

        },
        beforeSend: function () {

        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            $("#eventosRealizados").html(data[0].eventosRealizados);
        }, error: function (errors, textStatus, errorThrown) {

        },
        complete: function () {

        }
    });
}
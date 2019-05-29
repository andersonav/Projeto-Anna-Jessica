$(document).ready(function () {
    $('#tabela').DataTable({
        "processing": true,
        "responsive": true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese-Brasil.json"
        }
    });
    $('#fullCalendar').fullCalendar('destroy');
    $calendar = $('#fullCalendar');

    today = new Date();
    y = today.getFullYear();
    m = today.getMonth();
    d = today.getDate();

    $calendar.fullCalendar({
        viewRender: function (view, element) {

        },
        monthNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro',
            'Outubro', 'Novembro', 'Dezembro'],
        monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Aug', 'Set', 'Out', 'Nov', 'Dez'],
        dayNames: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado'],
        dayNamesShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'],
        header: {
            left: 'title',
            center: 'month,agendaWeek,agendaDay',
            right: 'prev,next,today'
        },
        lang: 'pt-br',
        locale: 'pt-br',
        navLinks: false,
        timeFormat: 'HH:mm',
        selectable: true,
        selectHelper: true,
        eventLimit: true,
        displayEventEnd: true,
        buttonText: {
            today: 'Hoje',
            month: 'Mês',
            week: 'Semana',
            day: 'Dia'
        },
        allDayText: 'Dia Inteiro',
        allDaySlot: false,
        minTime: '07:00:00',
        maxTime: '22:30:00',
        slotDuration: '00:30:00',
        slotLabelInterval: 30,
        slotLabelFormat: 'HH:mm',
        slotMinutes: 30,
        columnFormat: 'ddd D/M',
        views: {
            month: {// name of view
                titleFormat: 'D MMM, YYYY'
                        // other view-specific options here
            },
            week: {
                titleFormat: 'D MMM, YYYY'
            },
            day: {
                titleFormat: 'D MMM, YYYY'
            }
        },
        select: function (start, end) {
            $('.errors').empty();
            $("input[name=action]").val('addAgenda');
            $("#btnAction").html("Adicionar");
            $("#titleModal").html("<b>Nova Agenda</b>");
            dateStart = $.fullCalendar.formatDate(start, "YYYY-MM-DD");
            dateEnd = $.fullCalendar.formatDate(end, "YYYY-MM-DD");
            start = $.fullCalendar.formatDate(start, "YYYY-MM-DD HH:mm:ss");
            end = $.fullCalendar.formatDate(end, "YYYY-MM-DD HH:mm:ss");
            var diaInicio = start.substr(8, 2);
            var mesInicio = start.substr(5, 2);
            var anoInicio = start.substr(0, 4);
            var inicio = diaInicio + "/" + mesInicio + "/" + anoInicio;
            var horaInicio = start.substr(11, 8);
            var horaFim = end.substr(11, 8);
            $("#data").val(dateStart);
            $("#hora_inicio").val(horaInicio);
            $("#hora_fim").val(horaFim);
            $("#data").attr('disabled', true);
            $("#hora_inicio").attr('disabled', true);
            $("#hora_fim").attr('disabled', true);
            $("#newAgenda").modal('show');
        },
        editable: true,
        // color classes: [ event-blue | event-azure | event-green | event-orange | event-red ]
//        events: function (start, end, timezone, callback) {
//            $.ajax({
//                url: "/agenda/getEventos",
//                type: 'POST',
//                data: {
//
//                },
//                success: function (data) {
//                    var events = [];
//                    dados = $.parseJSON(data);
//                    if (dados.length != 0) {
//                        for (var i = 0; i < dados.length; i++) {
//                            events.push({
//                                id: dados[i].id,
//                                title: dados[i].title,
//                                start: dados[i].start,
//                                end: dados[i].end,
//                                color: dados[i].color
//                            });
//                        }
//                        callback(events);
//                    } else {
//                        swal(
//                                'Nulo!',
//                                'Nenhum evento cadastrado!.',
//                                'error'
//                                )
//                    }
//                }
//            });
//        },
        events: [{

            }
            // more events here
        ],
        eventClick: function (event, element) {
//            $.ajax({
//                url: "/agenda/evento/getEventoById",
//                type: 'POST',
//                async: false,
//                data: {
//                    idHorario: event.id
//                }, success: function (data, textStatus, jqXHR) {
//                    data = $.parseJSON(data);
//                    var dataAniversario = data[0].data_nascimento;
//                    var diaAniversarioInicio = dataAniversario.substr(8, 2);
//                    var mesAniversarioInicio = dataAniversario.substr(5, 2);
//                    var anoAniversarioInicio = dataAniversario.substr(0, 4);
//                    var dataAniversarioFormatada = diaAniversarioInicio + "/" + mesAniversarioInicio + "/" + anoAniversarioInicio;
//
//                    var dataBD = data[0].data;
//                    var diaInicio = dataBD.substr(8, 2);
//                    var mesInicio = dataBD.substr(5, 2);
//                    var anoInicio = dataBD.substr(0, 4);
//                    var dataFormatada = diaInicio + "/" + mesInicio + "/" + anoInicio;
//                }
//            });
            $('#fullCalendar').fullCalendar('updateEvent', event);
        },
        defaultView: "agendaWeek"
    });
    $("#fullCalendar .fc-time-grid-event.fc-v-event.fc-event.fc-start fc-end .fc-content").css("cursor", "pointer");



});

function adicionarAgenda() {
    $('.errors').empty();
    $("input[name=action]").val('addAgenda');
    $("#nome").val("");
    $("#data").val("");
    $("#hora_inicio").val("");
    $("#hora_fim").val("");
    $("#cidade").val("");
    $("#btnAction").html("Adicionar");
    $("#titleModal").html("<b>Nova Agenda</b>");
}

function editarAgenda(id, nome, data, hora_inicio, hora_fim, cidade) {
    $('.errors').empty();
    $("input[name=action]").val('editAgenda');
    $("input[name=id_agenda]").val(id);
    $("#nome").val(nome);
    $("#data").val(data);
    $("#hora_inicio").val(hora_inicio);
    $("#hora_fim").val(hora_fim);
    $("#cidade").val(cidade);
    $("#btnAction").html("Editar");
    $("#titleModal").html("<b>Editar Agenda</b>");
}

function abrirSweetAgenda(id) {
    swal({
        title: 'Você confirma esta operação?',
        text: "Essa operação não poderá ser revestida!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonText: 'Cancelar',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim, eu desejo!'
    }).then((result) => {
        if (result.value) {
            if (deletarAgenda(id)) {
                swal(
                        'Apagado!',
                        'Esse dado foi removido com sucesso.',
                        'success'
                        )
            }

        }
    });

}

function deletarAgenda(id) {
    $("input[name=action]").val('deleteAgenda');
    $("input[name=id_agenda]").val(id);
    $("#btnAction").trigger('click');
}
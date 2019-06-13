$(document).ready(function () {
    $(".btnDelete").hide();
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
        navLinks: true,
        timeFormat: 'HH:mm',
        selectable: true,
        selectHelper: true,
        eventLimit: true,
        displayEventEnd: true,
        editable: false,
        selectOverlap: false,
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
            $("#imageAgendaEdit").css('display', 'none');
            $("input[name=action]").val('addAgenda');
            $("#btnAction").html("Adicionar");
            $(".btnDelete").hide();
            $("#titleModal").html("<b>Nova Agenda</b>");
            dateStart = $.fullCalendar.formatDate(start, "YYYY-MM-DD");
            dateEnd = $.fullCalendar.formatDate(end, "YYYY-MM-DD");
            start = $.fullCalendar.formatDate(start, "YYYY-MM-DD HH:mm:ss");
            end = $.fullCalendar.formatDate(end, "YYYY-MM-DD HH:mm:ss");
            $("#formAdmin input:enabled").each(function () {
                $(this).val("");
            });
            $("textarea").val("");
            if (dateStart == dateEnd) {
                var diaInicio = start.substr(8, 2);
                var mesInicio = start.substr(5, 2);
                var anoInicio = start.substr(0, 4);
                var diaFim = end.substr(8, 2);
                var mesFim = end.substr(5, 2);
                var anoFim = end.substr(0, 4);
                var inicio = diaInicio + "/" + mesInicio + "/" + anoInicio;
                var fim = diaFim + "/" + mesFim + "/" + anoFim;
                var horaInicio = start.substr(11, 8);
                var horaFim = end.substr(11, 8);
                var dataInicio = inicio + " " + horaInicio;
                var dataFim = fim + " " + horaFim;
                $("#data_inicio").val(dateStart);
                $("#data_fim").val(dateEnd);
                $("#hora_inicio").val(horaInicio);
                $("#hora_fim").val(horaFim);
                $("#data_inicio").attr('readonly', true);
                $("#data_fim").attr('readonly', true);
                $("#hora_inicio").attr('readonly', true);
                $("#hora_fim").attr('readonly', true);
                $("#newAgenda").modal('show');
            }

        },
        // color classes: [ event-blue | event-azure | event-green | event-orange | event-red ]
        events: function (start, end, timezone, callback) {
            $.ajax({
                url: "/adminConf/agenda/getEventos",
                type: 'POST',
                data: {

                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    var events = [];
                    if (data.length != 0) {
                        for (var i = 0; i < data.length; i++) {
                            events.push({
                                id: data[i].id,
                                title: data[i].title,
                                start: data[i].start,
                                end: data[i].end,
//                                color: 'red'
                            });
                        }
                        callback(events);
                    } else {
                        swal(
                                'Nulo!',
                                'Nenhum agenda cadastrado!.',
                                'error'
                                )
                    }
                }
            });
        },
        eventClick: function (event, element) {
            $(".btnDelete").show();
            $.ajax({
                url: "/adminConf/agenda/getEventoById",
                type: 'POST',
                async: false,
                data: {
                    idEvento: event.id
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data, textStatus, jqXHR) {
                    $('.errors').empty();
                    $("#imageAgendaEdit").css('display', 'block');
                    $(".btnDelete").attr('id', event.id);


                    $(".imgAgenda").attr("src", "/img/agenda/" + data[0].imagem);
                    $("input[name=action]").val('editAgenda');
                    $("input[name=id_agenda]").val(event.id);
                    $("#nome").val(data[0].nome_evento);
                    $("#data_inicio").val(data[0].data_inicio);
                    $("#data_fim").val(data[0].data_fim);
                    $("#hora_inicio").val(data[0].hora_inicio);
                    $("#hora_fim").val(data[0].hora_fim);
                    $("#cidade").val(data[0].cidade);
                    $("#descricao").val(data[0].descricao);
                    $("#data_inicio").attr('readonly', false);
                    $("#data_fim").attr('readonly', false);
                    $("#hora_inicio").attr('readonly', false);
                    $("#hora_fim").attr('readonly', false);
                    $("#btnAction").html("Editar");
                    $("#titleModal").html("<b>Editar Agenda</b>");
                    $("#newAgenda").modal('show');
                }
            });
            $('#fullCalendar').fullCalendar('updateEvent', event);
        },
        defaultView: "agendaWeek"
    });
    $("#fullCalendar .fc-time-grid-event.fc-v-event.fc-event.fc-start fc-end .fc-content").css("cursor", "pointer");
});

$(".btnDelete").click(function () {
    var valorId = $(this).attr("id");
    abrirSweetAgenda(valorId);
});

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
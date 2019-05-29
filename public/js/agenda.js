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
            dateStart = $.fullCalendar.formatDate(start, "YYYY-MM-DD");
            dateEnd = $.fullCalendar.formatDate(end, "YYYY-MM-DD");
            start = $.fullCalendar.formatDate(start, "YYYY-MM-DD HH:mm:ss");
            end = $.fullCalendar.formatDate(end, "YYYY-MM-DD HH:mm:ss");

        },
        editable: true,
        // color classes: [ event-blue | event-azure | event-green | event-orange | event-red ]
        events: function (start, end, timezone, callback) {
            $.ajax({
                url: "/agenda/getEventos",
                type: 'POST',
                data: {

                },
                success: function (data) {
                    var events = [];
                    dados = $.parseJSON(data);
                    if (dados.length != 0) {
                        for (var i = 0; i < dados.length; i++) {
                            events.push({
                                id: dados[i].id,
                                title: dados[i].title,
                                start: dados[i].start,
                                end: dados[i].end,
                                color: dados[i].color
                            });
                        }
                        callback(events);
                    } else {
                        swal(
                                'Nulo!',
                                'Nenhum evento cadastrado!.',
                                'error'
                                )
                    }
                }
            });
        },
        eventClick: function (event, element) {
//
//            $.ajax({
//                url: "class/request.php",
//                type: 'POST',
//                async: false,
//                data: {
//                    action: "getInformationsAgendamentoByIdHorario",
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
//                    swal({
//                        title: 'Informações do Agendamento',
//                        html: '<div">\n\
//                        <div class="form-group">\n\
//                        <label>Nome</label><input type="text" name="nome" readonly class="form-control" value="' + data[0].nome + '">\n\
//                        </div><div class="form-group">\n\
//                        <label>Telefone</label><input type="text" readonly name="telefone" value="' + data[0].telefone + '" class="form-control">\n\
//                        </div><div class="form-group">\n\
//                        <label>Email</label><input type="email" name="email" value="' + data[0].email + '" readonly class="form-control">\n\
//                        </div><div class="form-group">\n\
//                        <label>Data de Nascimento</label><input type="text" value="' + dataAniversarioFormatada + '" readonly name="dataAniversario" class="form-control">\n\
//                        </div>\n\
//                        </div>\n\
//                        <div class="form-group">' +
//                                '<label>Data Agendamento</label><input class="form-control" placeholder="Data" value="' + dataFormatada + '" id="data" readonly>' +
//                                '</div>' + '<div class="form-group">' +
//                                '<label>Hora Ínicio</label><input class="form-control" placeholder="Hora ínicio" value="' + data[0].hora_entrada + '" id="horaInicio" readonly>' +
//                                '</div>' + '<div class="form-group">' +
//                                '<label>Hora Fim</label><input class="form-control" placeholder="Hora ínicio" value="' + data[0].hora_saida + '" id="horaFim" readonly>' +
//                                '</div>' + '<div class="form-group">' +
//                                '<label>Serviço</label><input class="form-control" placeholder="Serviço" value="' + data[0].descricao + '" id="servicosUs" readonly>' +
//                                '</div>' + '<div class="form-group">' +
//                                '<label>Barbeiro</label><input class="form-control" placeholder="Barbeiro" value="' + data[0].barbeiro + '" id="barbeiroUs" readonly>' +
//                                '</div>',
//                        showCancelButton: false,
//                        confirmButtonClass: 'btn btn-success',
//                        confirmButtonText: 'OK',
//                        cancelButtonText: 'Cancelar',
//                        cancelButtonClass: 'btn btn-danger',
//                    }).then(function (result) {
//                        console.log(result.value);
//                        if (result.value) {
//                            //        swal({
////            title: 'Você tem certeza que deseja excluir esse agendamento?',
////            text: "Essa ação não poderá ser desfeita!",
////            type: 'warning',
////            showCancelButton: true,
////            confirmButtonColor: '#3085d6',
////            cancelButtonColor: '#d33',
////            confirmButtonText: 'Sim, eu desejo!',
////            cancelButtonText: 'Cancelar'
////        }).then((result) => {
////            if (result.value) {
////                $.ajax({
////                    type: 'POST',
////                    url: "class/request.php",
////                    data: {
////                        action: 'deletar-agendamento',
////                        id: event.id
////                    }, success: function (data, textStatus, jqXHR) {
////                        swal(
////                                'Deletado!',
////                                'O agendamento foi deletado!.',
////                                'success'
////                                )
////                        var refreshIntervalId = setInterval(function () {
////                            var pagina_atual = $("input#pagina_atual").val();
////                            $("#sidenav-overlay").trigger("click");
////                            $(".modal-backdrop").remove();
////                            $("#containerLoadInformations").empty();
////                            $("#containerLoadInformations").load("load/" + pagina_atual + ".php");
//////                    $("input[type=text]").each(function () {
//////                        $(this).val("");
//////                    });
////                            clearInterval(refreshIntervalId);
////                        }, 1500);
////                    }
////                });
////
////            }
////        }) 
//
//                        }
//
//                    })
//                            .catch(swal.noop);
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
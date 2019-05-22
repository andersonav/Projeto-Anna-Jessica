$(document).ready(function () {
    $('#tabela').DataTable({
        "processing": true,
        "responsive": true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese-Brasil.json"
        }
    });


});

function adicionarAgenda() {
    $("input[name=action]").val('addAgenda');
    $("#nome").val("");
    $("#data").val("");
    $("#hora_ini").val("");
    $("#hora_fim").val("");
    $("#cidade").val("");
    $("#btnAction").html("Adicionar");
    $("#titleModal").html("<b>Nova Agenda</b>");
}

function editarAgenda(id, nome, data, hora_inicio, hora_fim, cidade) {
    $("input[name=action]").val('editAgenda');
    $("input[name=id_agenda]").val(id);
    $("#nome").val(nome);
    $("#data").val(data);
    $("#hora_ini").val(hora_inicio);
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
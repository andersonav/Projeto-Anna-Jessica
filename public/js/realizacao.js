$(document).ready(function () {
    $('#tabela').DataTable({
        "processing": true,
        "responsive": true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese-Brasil.json"
        }
    });
});

function adicionarRealizacao() {
    $("input[name=action]").val('addRealizacao');
    $("#nome").val();
    $("#btnAction").html("Adicionar");
    $("#titleModal").html("<b>Nova Realização</b>");
}

function editarRealizacao(id, nome) {
    $("input[name=action]").val('editRealizacao');
    $("input[name=id_realizacao]").val(id);
    $("#nome").val(nome);
    $("#btnAction").html("Editar");
    $("#titleModal").html("<b>Editar Realizacao</b>");
}

function abrirSweetRealizacao(id) {
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
            if (deletarRealizacao(id)) {
                swal(
                        'Apagado!',
                        'Esse dado foi removido com sucesso.',
                        'success'
                        )
            }

        }
    });

}

function deletarRealizacao(id) {
    $("input[name=action]").val('deleteRealizacao');
    $("input[name=id_realizacao]").val(id);
    $("#btnAction").trigger('click');
}
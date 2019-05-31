$(document).ready(function () {
    $('#tabela').DataTable({
        "processing": true,
        "responsive": true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese-Brasil.json"
        }
    });


});

function adicionarApoio() {
    $("input[name=action]").val('addApoio');
    $("#nome").val();
    $("#btnAction").html("Adicionar");
    $("#titleModal").html("<b>Novo Apoio</b>");
}

function editarApoio(id, nome) {
    $("input[name=action]").val('editApoio');
    $("input[name=id_apoio]").val(id);
    $("#nome").val(nome);
    $("#btnAction").html("Editar");
    $("#titleModal").html("<b>Editar Apoio</b>");
}

function abrirSweetApoio(id) {
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
            if (deletarApoio(id)) {
                swal(
                        'Apagado!',
                        'Esse dado foi removido com sucesso.',
                        'success'
                        )
            }

        }
    });

}

function deletarApoio(id) {
    $("input[name=action]").val('deleteApoio');
    $("input[name=id_apoio]").val(id);
    $("#btnAction").trigger('click');
}
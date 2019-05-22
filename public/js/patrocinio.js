$(document).ready(function () {
    $('#tabela').DataTable({
        "processing": true,
        "responsive": true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese-Brasil.json"
        }
    });
});

function adicionarPatrocinio() {
    $('.errors').empty();
    $("input[name=action]").val('addPatrocinio');
    $("#nome").val();
    $("#btnAction").html("Adicionar");
    $("#titleModal").html("<b>Novo Patrocinio</b>");
}

function editarPatrocinio(id, nome) {
    $('.errors').empty();
    $("input[name=action]").val('editPatrocinio');
    $("input[name=id_patrocinio]").val(id);
    $("#nome").val(nome);
    $("#btnAction").html("Editar");
    $("#titleModal").html("<b>Editar Patrocinio</b>");
}

function abrirSweetPatrocinio(id) {
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
            if (deletarPatrocinio(id)) {
                swal(
                        'Apagado!',
                        'Esse dado foi removido com sucesso.',
                        'success'
                        )
            }

        }
    });

}

function deletarPatrocinio(id) {
    $("input[name=action]").val('deletePatrocinio');
    $("input[name=id_patrocinio]").val(id);
    $("#btnAction").trigger('click');
}
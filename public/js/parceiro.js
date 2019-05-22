$(document).ready(function () {
    $('#tabela').DataTable({
        "processing": true,
        "responsive": true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese-Brasil.json"
        }
    });
});

function adicionarParceiro() {
    $('.errors').empty();
    $("#imageParceiroEdit").css("display", 'none');
    $("input[name=action]").val('addParceiro');
    $("#btnAction").html("Adicionar");
    $("#titleModal").html("<b>Novo Parceiro</b>");
}

function editarParceiro(id, nome, imagem) {
    $('.errors').empty();
    $(".imageParceiro").attr("src", '/img/parceiros/' + imagem);
    $("#imageParceiroEdit").css("display", 'block');
    $("input[name=action]").val('editParceiro');
    $("input[name=id_parceiro]").val(id);
    $("#nome").val(nome);
    $("#btnAction").html("Editar");
    $("#titleModal").html("<b>Editar Parceiro<b>");
}

function abrirSweetParceiro(id) {
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
            if (deletarParceiro(id)) {
                swal(
                        'Apagado!',
                        'Esse dado foi removido com sucesso.',
                        'success'
                        )
            }

        }
    });

}

function deletarParceiro(id) {
    $("input[name=action]").val('deleteParceiro');
    $("input[name=id_parceiro]").val(id);
    $("#btnAction").trigger('click');
}
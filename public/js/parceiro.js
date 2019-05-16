$(document).ready(function () {
    $('#tabela').dataTable({
        "language": {
            "sEmptyTable": "Nenhum registro encontrado",
            "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
            "sInfoFiltered": "(Filtrados de _MAX_ registros)",
            "sInfoPostFix": "",
            "sInfoThousands": ".",
            "sLengthMenu": "_MENU_ resultados por página",
            "sLoadingRecords": "Carregando...",
            "sProcessing": "Processando...",
            "sZeroRecords": "Nenhum registro encontrado",
            "sSearch": "Pesquisar",
            "oPaginate": {
                "sNext": "Próximo",
                "sPrevious": "Anterior",
                "sFirst": "Primeiro",
                "sLast": "Último"
            },
            "oAria": {
                "sSortAscending": ": Ordenar colunas de forma ascendente",
                "sSortDescending": ": Ordenar colunas de forma descendente"
            }
        }
    });
});

function adicionarParceiro() {
    $("#imageParceiroEdit").css("display", 'none');
    $("input[name=action]").val('addParceiro');
    $("#btnAction").html("Adicionar");
    $("#titleModal").html("Novo Parceiro");
}

function editarParceiro(id, nome, imagem) {
    $(".imageParceiro").attr("src", '/img/parceiros/' + imagem);
    $("#imageParceiroEdit").css("display", 'block');
    $("input[name=action]").val('editParceiro');
    $("input[name=id_parceiro]").val(id);
    $("#nome").val(nome);
    $("#btnAction").html("Editar");
    $("#titleModal").html("Editar Parceiro");
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

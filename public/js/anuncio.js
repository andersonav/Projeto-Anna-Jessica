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


    $(".custom-file-input").on("change", function () {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
});

function adicionarAnuncio() {
    $("#imageAnuncioEdit").css("display", 'none');
    $("input[name=action]").val('addAnuncio');
    $("#btnAction").html("Adicionar");
    $("#titleModal").html("Novo Anuncio");
}

function editarAnuncio(id, nome) {
    $(".imageAnuncio").attr("src", '/img/anuncios/' + nome);
    $("#imageAnuncioEdit").css("display", 'block');
    $("input[name=action]").val('editAnuncio');
    $("input[name=id_anuncio]").val(id);
    $("#nome").val(nome);
    $("#btnAction").html("Editar");
    $("#titleModal").html("Editar Anuncio");
}

function abrirSweetAnuncio(id) {
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
            if (deletarAnuncio(id)) {
                swal(
                        'Apagado!',
                        'Esse dado foi removido com sucesso.',
                        'success'
                        )
            }

        }
    });

}

function deletarAnuncio(id) {
    $("input[name=action]").val('deleteAnuncio');
    $("input[name=id_anuncio]").val(id);
    $("#btnAction").trigger('click');
}

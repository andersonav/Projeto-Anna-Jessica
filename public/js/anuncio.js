$(document).ready(function () {
    $('#tabela').DataTable({
        "processing": true,
        "responsive": true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese-Brasil.json"
        }
    });

    $(".custom-file-input").on("change", function () {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
});

function adicionarAnuncio() {
    $('.errors').empty();
    $("#imageAnuncioEdit").css("display", 'none');
    $("input[name=action]").val('addAnuncio');
    $("#btnAction").html("Adicionar");
    $("#titleModal").html("Novo Anuncio");
}

function editarAnuncio(id, nome, id_classificacao) {
    $('.errors').empty();
    $(".imageAnuncio").attr("src", '/img/anuncios/' + nome);
    $("#imageAnuncioEdit").css("display", 'block');
    $("input[name=action]").val('editAnuncio');
    $("input[name=id_anuncio]").val(id);
    $("#nome").val(nome);
    $("#classificacao").val(id_classificacao);
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

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

function adicionarSlideshow() {
    $('.errors').empty();
    $("#imageSlideshowEdit").css("display", 'none');
    $("input[name=action]").val('addSlideshow');
    $("#btnAction").html("Adicionar");
    $("#titleModal").html("Novo Slideshow");
}

function editarSlideshow(id, nome) {
    $('.errors').empty();
    $(".imageSlideshow").attr("src", '/img/slideshow/' + nome);
    $("#imageSlideshowEdit").css("display", 'block');
    $("input[name=action]").val('editSlideshow');
    $("input[name=id_slideshow]").val(id);
    $("#nome").val(nome);
    $("#btnAction").html("Editar");
    $("#titleModal").html("Editar Slideshow");
}

function abrirSweetSlideshow(id) {
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
            if (deletarSlideshow(id)) {
                swal(
                        'Apagado!',
                        'Esse dado foi removido com sucesso.',
                        'success'
                        )
            }

        }
    });

}

function deletarSlideshow(id) {
    $("input[name=action]").val('deleteSlideshow');
    $("input[name=id_slideshow]").val(id);
    $("#btnAction").trigger('click');
}

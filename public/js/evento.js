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
    $('.newEvento').on('click', function () {
        $('.btn-light').attr('style', 'outline-color: #6c757d !important');
    });
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    });
});

//Logica para adicionar os links
var linkNum = 0;
function link() {
    linkNum++;
    var html = '<div class="input-group col-md-12 linkDiv remove' + linkNum + '">' +
        '<div class="input-group-prepend">' +
        '<span class="input-group-text" id="basic-addon1">Nome</span>' +
        '</div>' +
        '<input type="text" class="form-control" id="remove' + linkNum + '" placeholder="Ex: video" aria-label="Username" aria-describedby="basic-addon1">' +
        '<div class="input-group-prepend">' +
        '<span class="input-group-text" id="basic-addon1">Link</span>' +
        '</div>' +
        '<input type="text" class="form-control" placeholder="Ex: www.youtube.com" aria-label="Recipients username" aria-describedby="basic-addon2">' +
        '<div class="input-group-append click" onclick="removerLink(' + linkNum + ')" id="remove' + linkNum + '">' +
        '<span class="input-group-text attrRemove" id="basic-addon2">Remover</span>' +
        '</div>' +
        '</div>';
    $(html).insertAfter($(".append"));
    var contagem = $('.linkDiv').length;
    $('.link').attr('data-original-title', 'Quantidade: ' + contagem);
}

function removerLink(linkNum) {
    var removerClass = 'remove' + linkNum;
    $('.' + removerClass).fadeOut("slow");
    setTimeout(function () {
        $('.' + removerClass).remove();
        var contagem = $('.linkDiv').length;
        console.log(contagem);
        if (contagem == 0) { $('.link').attr('data-original-title', 'Nenhum link adicionado'); }
        else { $('.link').attr('data-original-title', 'Quantidade: ' + contagem); }
    }, 1000);
}
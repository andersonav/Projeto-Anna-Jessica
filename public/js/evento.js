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
var kitNum = 0;

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

function adicionarKit() {
    kitNum++;
    var titleKit = '<div class="form-group col-md-12 kitLabel">' +
        '<h5 class="modal-title" style="text-align: -webkit-center;" id="kitLabel">Novo Kit</h5>' +
        '</div>';
    var verificar = $('.col-md-12').hasClass('kitLabel');
    if (!verificar) { $(titleKit).insertAfter($(".appendKit")); }

    var html = '<div class="form-group col-md-4 kitDiv kit' + kitNum + '">' +
        '<input type="text" name="nomeKit" class="form-control" id="nomeKit"' +
        'placeholder="Nome do kit" />' +
        '</div>' +
        '<div class="input-group col-md-7 kit' + kitNum + '">' +
        '<div class="input-group-prepend">' +
        '<span class="input-group-text" id="inputGroupFileAddon'+ kitNum+5 +'">Imagem: </span>' +
        '</div>' +
        '<div class="custom-file">' +
        '<input type="file" class="custom-file-input" id="inputGroupFile'+ kitNum+5 +'"' +
        'aria-describedby="inputGroupFileAddon'+ kitNum+5 +'">' +
        '<label class="custom-file-label" for="inputGroupFile'+ kitNum+5 +'">Selecione a imagem</label>' +
        '</div>' +
        '</div>' +
        '<div class="form-group col-md-1 kit' + kitNum + '">' +
        '<button type="button" data-toggle="tooltip" onclick="removerKit(' + kitNum + ');" data-placement="top" title="Remover kit"' +
        'class="btn btn-danger adcKit"><i class="fa fa-times" aria-hidden="true"></i></button>' +
        '</div>' +
        '<div class="form-group col-md-4 kit' + kitNum + '">' +
        '<input type="text" name="valorKit" class="form-control" id="valorKit" placeholder="Valor do kit" />' +
        '</div>' +
        '<div class="form-group col-md-4 kit' + kitNum + '">' +
        '<select class="selectpicker show-tick" data-live-search="true" title="Tamanho:" multiple>' +
        '<option>PP</option>' +
        '<option>P</option>' +
        '<option>M</option>' +
        '<option>G</option>' +
        '<option>GG</option>' +
        '</select>' +
        '</div>' +
        '<div class="form-group col-md-4 kit' + kitNum + '">' +
        '<input type="text" name="descKit" class="form-control" id="descKit"' +
        'placeholder="Descrição do kit" />' +
        '</div>';
    $(html).insertAfter($(".kitLabel"));
    $('select').selectpicker();
}

function removerKit(kitNum) {
    var removerClass = 'kit' + kitNum;
    $('.' + removerClass).fadeOut("slow");
    var contagem = $('.kitDiv').length;
    if (contagem == 1) $('.kitLabel').fadeOut("slow");
    setTimeout(function () {
        $('.' + removerClass).remove();
        contagem = $('.kitDiv').length;
        if (contagem == 0) $('.kitLabel').remove();
    }, 1000);
}
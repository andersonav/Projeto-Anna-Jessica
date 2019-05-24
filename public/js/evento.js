$(document).ready(function () {
    $('#tabela').DataTable({
        "processing": true,
        "responsive": true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese-Brasil.json"
        }
    });

    $('.newEvento').on('click', function () {
        $('.btn-light').attr('style', 'outline-color: #6c757d !important');
    });
    $('[data-toggle="tooltip"]').tooltip();
});

//Logica para adicionar os links
var linkNum = 0;
var kitNum = 0;

function link() {
    linkNum++;
    var html = '<div class="input-group col-md-12 linkDiv remove' + linkNum + '">' +
        '<div class="input-group-prepend">' +
        '<span class="input-group-text" id="basic-addon' + linkNum + '">Nome</span>' +
        '</div>' +
        '<input type="text" name="nomeLinkEvento[]" class="form-control" id="remove' + linkNum + '" placeholder="Ex: video" aria-label="Username" aria-describedby="basic-addon' + linkNum + '">' +
        '<div class="input-group-prepend">' +
        '<span class="input-group-text" id="basic-addon' + linkNum + '">Link</span>' +
        '</div>' +
        '<input type="text" name="linkEvento[]" class="form-control" placeholder="Ex: www.youtube.com" aria-label="Recipients username" aria-describedby="basic-addon' + linkNum + '">' +
        '<div class="input-group-append click" onclick="removerLink(' + linkNum + ')" id="remove' + linkNum + '">' +
        '<span class="input-group-text attrRemove" id="basic-addon' + linkNum + '">Remover</span>' +
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
        if (contagem == 0) {
            $('.link').attr('data-original-title', 'Nenhum link adicionado');
        } else {
            $('.link').attr('data-original-title', 'Quantidade: ' + contagem);
        }
    }, 1000);
}

function adicionarKit() {
    kitNum++;
    var titleKit = '<div class="form-group col-md-12 kitLabel">' +
        '<h5 class="modal-title" style="text-align: -webkit-center;" id="kitLabel">Novo Kit</h5>' +
        '</div>';
    var verificar = $('.col-md-12').hasClass('kitLabel');
    if (!verificar) {
        $(titleKit).insertAfter($(".appendKit"));
    }

    var html = '<div class="form-group col-md-4 kitDiv kit' + kitNum + '">' +
        '<input type="text" name="nomeKit[]" class="form-control" id="nomeKit"' +
        'placeholder="Nome do kit" />' +
        '<input type="hidden" name="kitNum[]" class="form-control" value="' + kitNum + '"/>' +
        '</div>' +
        '<div class="input-group col-md-7 kit' + kitNum + '">' +
        '<div class="input-group-prepend">' +
        '<span class="input-group-text" id="inputGroupFileAddon' + kitNum + 5 + '">Imagem: </span>' +
        '</div>' +
        '<div class="custom-file">' +
        '<input type="file" name="imgKit[]" class="custom-file-input" id="inputGroupFile' + kitNum + 5 + '"' +
        'aria-describedby="inputGroupFileAddon' + kitNum + 5 + '">' +
        '<label class="custom-file-label" for="inputGroupFile' + kitNum + 5 + '">Selecione a imagem</label>' +
        '</div>' +
        '</div>' +
        '<div class="form-group col-md-1 kit' + kitNum + '">' +
        '<button type="button" data-toggle="tooltip" onclick="removerKit(' + kitNum + ');" data-placement="top" title="Remover kit"' +
        'class="btn btn-danger adcKit"><i class="fa fa-times" aria-hidden="true"></i></button>' +
        '</div>' +
        '<div class="form-group col-md-4 kit' + kitNum + '">' +
        '<input type="text" name="valorKit[]" class="form-control" id="valorKit" placeholder="Valor do kit" />' +
        '</div>' +
        '<div class="form-group col-md-4 kit' + kitNum + '">' +
        '<select name="' + kitNum + '[]" class="selectpicker show-tick" data-live-search="true" title="Tamanho:" multiple>' +
        '<option>PP</option>' +
        '<option>P</option>' +
        '<option>M</option>' +
        '<option>G</option>' +
        '<option>GG</option>' +
        '</select>' +
        '</div>' +
        '<div class="form-group col-md-4 kit' + kitNum + '">' +
        '<input type="text" name="descKit[]" class="form-control" id="descKit"' +
        'placeholder="Descrição do kit" />' +
        '</div>';
    $(html).insertAfter($(".kitLabel"));
    $('select').selectpicker();
}

function removerKit(kitNum) {
    var removerClass = 'kit' + kitNum;
    $('.' + removerClass).fadeOut("slow");
    var contagem = $('.kitDiv').length;
    if (contagem == 1)
        $('.kitLabel').fadeOut("slow");
    setTimeout(function () {
        $('.' + removerClass).remove();
        contagem = $('.kitDiv').length;
        if (contagem == 0)
            $('.kitLabel').remove();
    }, 1000);
}

function adicionarEvento() {
    $('.ttl b').text('Novo Evento');
    $('.bootstrap-select:not(.input-group-btn)').css('display', 'inline-block');
    $('select').selectpicker();
}

function editarEvento(idEvento) {
    $.ajax({
        url: "adminConf/evento/dadosEvento",
        type: 'POST',
        async: false,
        data: {
            idEvento: idEvento
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }, success: function (data, textStatus, jqXHR) {
            console.log(data);
            preencherModal(data);
        }
    });

    $('.ttl b').text('Editar Evento');
    $('.bootstrap-select:not(.input-group-btn)').css('display', 'inline-block');
    $('select').selectpicker();
    $('#newEvento').modal('show');
}

function preencherModal(dados){
    $('input[name=nome_evento]').val(dados[0].nome_evento);
    $('input[name=data]').val(dados[0].data);
    $('input[name=hora_ini]').val(dados[0].hora_inicio);
    $('input[name=hora_fim]').val(dados[0].hora_fim);
    $('input[name=percurso]').val(dados[0].percurso);
    $('input[name=distancia]').val(dados[0].distancia);
    $('input[name=data_encerramento]').val(dados[0].prazo);
    $('input[name=endereco]').val(dados[0].endereco);
    $('textarea[name=info_adc]').val(dados[0].informacao_adicional);
    $('select[name=apoio]').selectpicker('val',dados[0].apoio_id_apoio);
    $('select[name=patrocinio]').selectpicker('val',dados[0].patrocinio_id_patrocinio);
    $('select[name=realizacao]').selectpicker('val',dados[0].realizacao_id_realizacao);
    $('select[name=modo]').selectpicker('val',dados[0].modo);
    $('select[name=tipo]').selectpicker('val',dados[0].tipo);

    if (dados[0].idLink != null) {
        var idLink = dados[0].idLink.split(',');
        var linkEvento = dados[0].linkEvento.split(',');
        var nomeLink = dados[0].nomeLink.split(',');

        idLink.forEach(element => {
            console.log(element);
        });
    }

    
}
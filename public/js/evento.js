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
    var html = '<div class="input-group col-md-12 formReset linkDiv remove' + linkNum + '">' +
        '<div class="input-group-prepend">' +
        '<span class="input-group-text" id="basic-addon' + linkNum + '">Nome</span>' +
        '</div>' +
        '<input type="text" name="nomeLinkEvento[]" class="form-control nomeLink' + linkNum + '" id="remove' + linkNum + '" placeholder="Ex: video" aria-label="Username" aria-describedby="basic-addon' + linkNum + '">' +
        '<div class="input-group-prepend">' +
        '<span class="input-group-text" id="basic-addon' + linkNum + '">Link</span>' +
        '</div>' +
        '<input type="text" name="linkEvento[]" class="form-control link' + linkNum + '" placeholder="Ex: www.youtube.com" aria-label="Recipients username" aria-describedby="basic-addon' + linkNum + '">' +
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
    var titleKit = '<div class="form-group col-md-12 formReset kitLabel">' +
        '<h5 class="modal-title" style="text-align: -webkit-center;" id="kitLabel">Novo Kit</h5>' +
        '</div>';
    var verificar = $('.col-md-12').hasClass('kitLabel');
    if (!verificar) {
        $(titleKit).insertAfter($(".appendKit"));
    }

    var html = '<div class="form-group col-md-4 formReset kitDiv kit' + kitNum + '">' +
        '<input type="text" name="nomeKit[]" class="form-control nomeKit' + kitNum + '" id="nomeKit"' +
        'placeholder="Nome do kit" />' +
        '<input type="hidden" name="kitNum[]" class="form-control" value="' + kitNum + '"/>' +
        '</div>' +
        '<div class="input-group col-md-7 formReset kit' + kitNum + '">' +
        '<div class="input-group-prepend">' +
        '<span class="input-group-text" id="inputGroupFileAddon' + kitNum + 5 + '">Imagem: </span>' +
        '</div>' +
        '<div class="custom-file">' +
        '<input type="file" name="imgKit[]" class="custom-file-input" id="inputGroupFile' + kitNum + 5 + '"' +
        'aria-describedby="inputGroupFileAddon' + kitNum + 5 + '">' +
        '<input type="hidden" name="imgKitNome'+ kitNum +'">' +
        '<label class="custom-file-label imgKitLab'+ kitNum +'" for="inputGroupFile' + kitNum + 5 + '">Selecione a imagem</label>' +
        '</div>' +
        '</div>' +
        '<div class="form-group col-md-1 formReset kit' + kitNum + '">' +
        '<button type="button" data-toggle="tooltip" onclick="removerKit(' + kitNum + ');" data-placement="top" title="Remover kit"' +
        'class="btn btn-danger adcKit"><i class="fa fa-times" aria-hidden="true"></i></button>' +
        '</div>' +
        '<div class="form-group col-md-4 formReset kit' + kitNum + '">' +
        '<input type="text" name="valorKit[]" class="form-control valorKit' + kitNum + '" id="valorKit" placeholder="Valor do kit" />' +
        '</div>' +
        '<div class="form-group col-md-4 formReset kit' + kitNum + '">' +
        '<select name="' + kitNum + '[]" class="selectpicker show-tick selectTam' + kitNum + '" data-live-search="true" title="Tamanho:" multiple>' +
        '<option>PP</option>' +
        '<option>P</option>' +
        '<option>M</option>' +
        '<option>G</option>' +
        '<option>GG</option>' +
        '</select>' +
        '</div>' +
        '<div class="form-group col-md-4 formReset kit' + kitNum + '">' +
        '<input type="text" name="descKit[]" class="form-control descKit' + kitNum + '" id="descKit"' +
        'placeholder="Descrição do kit" />' +
        '</div>';
    $(html).insertAfter($(".kitLabel"));
    $('select').selectpicker();

    $(".custom-file-input").on("change", function () {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
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
    $('#formAdmin').each(function () {
        this.reset();
    });
    $('.formReset').remove();
    $('.selectpicker').selectpicker('val','');
    $('.custom-file-label').text('Selecione a imagem');
    $('input[name=action]').attr('id','addEvento').val('addEvento');
    $('.modal-footer .btnmodal').text('Adicionar');
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

function preencherModal(dados) {
    $('#formAdmin').each(function () {
        this.reset();
    });
    $('.formReset').remove();
    $('.selectpicker').selectpicker('val','');
    $('.custom-file-label').text('Selecione a imagem');
    $('input[name=action]').attr('id','editEvento').val('editEvento');
    $('.modal-footer .btnmodal').text('Editar');
    $('input[name=id_evento]').val(dados[0].id_evento);
    $('input[name=nome_evento]').val(dados[0].nome_evento);
    $('input[name=data]').val(dados[0].data);
    $('.inputImgEvento').text(dados[0].imagem);
    $('input[name=hora_ini]').val(dados[0].hora_inicio);
    $('input[name=hora_fim]').val(dados[0].hora_fim);
    $('input[name=percurso]').val(dados[0].percurso);
    $('input[name=distancia]').val(dados[0].distancia);
    $('input[name=data_encerramento]').val(dados[0].prazo);
    $('input[name=endereco]').val(dados[0].endereco);
    $('textarea[name=info_adc]').val(dados[0].informacao_adicional);
    $('select[name=apoio]').selectpicker('val', dados[0].apoio_id_apoio);
    $('select[name=patrocinio]').selectpicker('val', dados[0].patrocinio_id_patrocinio);
    $('select[name=realizacao]').selectpicker('val', dados[0].realizacao_id_realizacao);
    $('select[name=modo]').selectpicker('val', dados[0].modo);
    $('select[name=tipo]').selectpicker('val', dados[0].tipo);

    if (dados[0].idLink != null) {
        var idLink = dados[0].idLink.split(',');
        var linkEvento = dados[0].linkEvento.split(',');
        var nomeLink = dados[0].nomeLink.split(',');
        var contadorLink = 0;
        idLink.forEach(element => {
            link();
            $('.nomeLink' + linkNum).val(nomeLink[contadorLink]);
            $('.link' + linkNum).val(linkEvento[contadorLink]);
            contadorLink++;
        });
    }

    if (dados[0].idKit != null) {
        var idKit = dados[0].idKit.split(',');
        var nomeKit = dados[0].nomeKit.split(',');
        var descKit = dados[0].descKit.split(',');
        var valorKit = dados[0].valorKit.split(',');
        var imgKit = dados[0].imgKit.split(',');
        var contadorKit = 0;
        idKit.forEach(element => {
            adicionarKit();
            $('.nomeKit' + kitNum).val(nomeKit[contadorKit]);
            $('.valorKit' + kitNum).val(valorKit[contadorKit]);
            $('.descKit' + kitNum).val(descKit[contadorKit]);
            $('.imgKitLab' + kitNum).text(imgKit[contadorKit]);
            $('input[name=imgKitNome'+ kitNum +']').val(imgKit[contadorKit]);
            contadorKit++;
            var tamanho = dados[contadorKit][0].tamanho.split(',');
            $('.selectTam' + kitNum).selectpicker('val', tamanho);
        });
    }


}
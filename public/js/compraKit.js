$(document).ready(function () {
    $(".btnQueroEste").click(function () {
        var valorId = $(this).attr("id");
        var tam = $('.selectTam' + valorId).selectpicker('val');
        var nome = $('.titulo' + valorId).text();
        var valor = $('.valor' + valorId).text();
        var btn = $('.btnConKitTab').attr('id', valorId);
        var hash = $(this).attr("role");

        if (tam != '') {
            $('.carrinho').fadeOut().remove();
            $('.tabelaCom').css('display', 'none').html('<table id="tabelaC">'
                + '<thead>'
                + '<tr>'
                + '<th style="width: 55%;">Item</th>'
                + '<th>Tam</th>'
                + '<th>Valor</th>'
                + '</tr>'
                + '</thead>'
                + '<tbody id="corpoCarrinho">'
                + '<tr>'
                + '<td class="nomeKitTab"></td>'
                + '<td class="tamKitTab"></td>'
                + '<td class="valorKitTab"></td>'
                + '</tr>'
                + '</tbody>'
                + '</table>'
                + '<br>'
                + '<div class="col-md-12">'
                + '<a href="javascript:void(0)">'
                + '<div class="text-center">'
                + '<button class="btnmodal btnConKitTab" id="' + hash + '" role = "' + valorId + '" href="" onclick="comprar(this)">Continuar</button>'
                + '</div>'
                + '</a>'
                + '</div>');
            setTimeout(function () {
                $('.nomeKitTab').text(nome);
                $('.valorKitTab').text(valor);
                $('.tamKitTab').text(tam);
                $('.tabelaCom').fadeIn();
            }, 600);
        } else {
            Swal.fire({
                position: 'center',
                type: 'error',
                title: '<strong>Escolha o tamanho do kit!</strong>',
                showConfirmButton: false,
                timer: 1500
            });
        }
    });






});

function comprar(obj) {
    var valorId = $(obj).attr("role");
    var hash = $(obj).attr("id");

    var mapForm = document.createElement("form");
    mapForm.target = "Map";
    mapForm.method = "POST"; // or "post" if appropriate
    mapForm.action = "http://localhost:8000/realizarCompraKit";

    var mapInput = document.createElement("input");
    mapInput.type = "hidden";
    mapInput.name = "idKit";
    mapInput.value = valorId;
    mapForm.appendChild(mapInput);

    var mapInput2 = document.createElement("input");
    mapInput2.type = "hidden";
    mapInput2.name = "hash";
    mapInput2.value = hash;
    mapForm.appendChild(mapInput2);

    var mapInpu3 = document.createElement("input");
    mapInpu3.type = "hidden";
    mapInpu3.name = "_token";
    mapInpu3.value = $("meta[name=csrf-token]").attr("content");
    mapForm.appendChild(mapInpu3);

    var tam = $('.selectTam' + valorId).selectpicker('val');

    var mapInput4 = document.createElement("input");
    mapInput4.type = "hidden";
    mapInput4.name = "tamanho";
    mapInput4.value = tam;
    mapForm.appendChild(mapInput4);

    document.body.appendChild(mapForm);

    map = window.open("", "Map", "status=0,title=0,height=600,width=800,scrollbars=1");

    if (map) {
        mapForm.submit();
        $('input[name=idKit]').remove();
        $('input[name=hash]').remove();
        $('input[name=tamanho]').remove();
        $('input[name=_token]').remove();
        // window.location = "/";
    } else {
        alert('You must allow popups for this map to work.');
    }



}

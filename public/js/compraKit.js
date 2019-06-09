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
                +'<thead>'
                +'<tr>'
                    +'<th style="width: 55%;">Item</th>'
                    +'<th>Tam</th>'
                    +'<th>Valor</th>'
                +'</tr>'
            +'</thead>'
            +'<tbody id="corpoCarrinho">'
                +'<tr>'
                    +'<td class="nomeKitTab"></td>'
                    +'<td class="tamKitTab"></td>'
                    +'<td class="valorKitTab"></td>'
                +'</tr>'
            +'</tbody>'
        +'</table>'
        +'<br>'
        +'<div class="col-md-12">'
            +'<a href="javascript:void(0)">'
                +'<div class="text-center">'
                    +'<button class="btnmodal btnConKitTab" id="'+ hash +'" role = "'+ valorId +'">Continuar</button>'
                +'</div>'
            +'</a>'
        +'</div>');
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
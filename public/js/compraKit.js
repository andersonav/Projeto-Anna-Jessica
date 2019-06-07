$(document).ready(function () {
    $(".btnQueroEsteOff").click(function () {
        var valorId = $(this).attr("id");
        var html = "";
        var valorTotal = 0;
        $.ajax({
            url: '/getKit',
            type: 'POST',
            async: false,
            data: {
                idKit: valorId
            }, success: function (data) {
                $(".corpoCarrinho").html("");
                valorTotal = data.valor;
                html = "<tr><td>" + data.nome + "</td><td>" + data.valor + "</td></tr>";
            }
        });
        $("#tabelaC").html(html);
        $("#idBtnComprar").text(valorTotal);
    });


    $(".btnQueroEste").click(function () {
        var valorId = $(this).attr("id");
        var tam = $('.selectTam' + valorId).selectpicker('val');
        var nome = $('.titulo' + valorId).text();
        var valor = $('.valor' + valorId).text();
        var btn = $('.btnConKitTab').attr('id', valorId);

        if (tam != '') {
            $('.carrinho').fadeOut();
            $('.tabelaCom').fadeOut();
            setTimeout(function () {
                $('.nomeKitTab').text(nome);
                $('.valorKitTab').text(valor);
                $('.tamKitTab').text(tam);
                $('.tabelaCom').fadeIn();
            }, 600);
        }else{
            Swal.fire({
                position: 'center',
                type: 'error',
                title: '<strong>Escolha o tamanho do kit!</strong>',
                showConfirmButton: false,
                timer: 1500
            });
        }
        console.log(tam);
    });
});
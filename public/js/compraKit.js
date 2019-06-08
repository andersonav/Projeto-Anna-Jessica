$(document).ready(function () {
    $(".btnQueroEste").click(function () {
        var valorId = $(this).attr("id");
        var html = "";
        var url_atual = window.location.href;
        var valorTotal = 0;
        var tamanho = $('.selectTam' + valorId).selectpicker('val');

        if (tamanho != '') {
            $.ajax({
                url: url_atual + '/getKit',
                type: 'POST',
                async: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    idKit: valorId
                }, success: function (data) {
                    $(".dadosC .carrinho").remove();
                    $(".tabelaCom").css("display", "block");
                    valorTotal = data.valor;
                    html = "<tr><td>" + data[0].nome_kit + "</td><td>" + tamanho + "</td><td>" + data[0].valor + "</td></tr>";
                }
            });
            $("#corpoCarrinho").html(html);
            $("#idBtnComprar").text(valorTotal);
        } else {
            Swal.fire({
                position: 'center',
                type: 'error',
                title: '<strong>Escolha o tamanho do kit!</strong>',
                showConfirmButton: false,
                timer: 1500
            });
        }
        // $(".tabelaCom").html(html);
        // $("#idBtnComprar").text(valorTotal);
    });



});
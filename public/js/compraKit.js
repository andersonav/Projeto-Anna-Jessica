$(document).ready(function () {
    $(".btnQueroEste").click(function(){
        var valorId = $(this).attr("id");
        var html = "";
        var valorTotal = 0;
        $.ajax({
            url: '/getKit',
            type: 'POST',
            async: false,
            data: {
                idKit: valorId
            }, success: function(data){
                $(".corpoCarrinho").html("");
                valorTotal = data.valor;
                html = "<tr><td>"+data.nome+"</td><td>"+data.valor+"</td></tr>";
            }
        });
        $("#tabelaC").html(html);
        $("#idBtnComprar").text(valorTotal);
    });
});
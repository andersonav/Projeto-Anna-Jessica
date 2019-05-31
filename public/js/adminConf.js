$(document).ready(function () {
    $(".nav-menu li.sem, #mobile-nav ul li.sem").click(function () {
        var valorId = $(this).attr("id");
        var url_atual = window.location.href;
        eachElementToRemoveClass(".nav-menu li.sem", "menu-active");
        eachElementToRemoveClass("#mobile-nav ul li.sem a", "nav-menu-active");
        addClassElement(".nav-menu li.sem#" + valorId, "menu-active");
        addClassElement("#mobile-nav ul li.sem#" + valorId + " a", "nav-menu-active");
        console.log(valorId);
        $.ajax({
            url: url_atual + "/" + valorId + "/",
            type: 'POST',
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function () {
                $("body").append('<div class="loading">Carregando&#8230;</div>');
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                valorId: valorId
            }, success: function (data, textStatus, jqXHR) {
                $("#containerLoad").html(data);
            }, complete: function (jqXHR, textStatus) {
                $(".loading").remove();
            }
        });
    });
    $(".nav-menu li.sem#agenda").trigger('click');
});

function eachElementToRemoveClass(elemento, classe) {
    $(elemento).each(function () {
        $(this).removeClass(classe);
    });
}

function addClassElement(elemento, classe) {
    $(elemento).addClass(classe);
}
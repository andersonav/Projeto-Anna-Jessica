document.addEventListener('DOMContentLoaded', function (event) {
    // array with texts to type in typewriter
    var dataText = ["Portifolio", "Agenda", "Serviços", "Eventos", "Inscrição"];

    // type one text in the typwriter
    // keeps calling itself until the text is finished
    function typeWriter(text, i, fnCallback) {
        // chekc if text isn't finished yet
        if (i < (text[0].length)) {
            // add next character to h1
            document.querySelector("#port").innerHTML = text[0].substring(0, i + 1) + '<span aria-hidden="true"></span>';
            document.querySelector("#age").innerHTML = text[1].substring(0, i + 1) + '<span aria-hidden="true"></span>';
            document.querySelector("#ser").innerHTML = text[2].substring(0, i + 1) + '<span aria-hidden="true"></span>';
            document.querySelector("#eve").innerHTML = text[3].substring(0, i + 1) + '<span aria-hidden="true"></span>';
            document.querySelector("#inc").innerHTML = text[4].substring(0, i + 1) + '<span aria-hidden="true"></span>';

            // wait for a while and call this function again for next character
            setTimeout(function () {
                typeWriter(text, i + 1, fnCallback)
            }, 150);
        }
        // text finished, call callback if there is a callback function
        else if (typeof fnCallback == 'function') {
            // call callback after timeout
            setTimeout(fnCallback, 1000);
        }
    }
    // start a typewriter animation for a text in the dataText array
    function StartTextAnimation(i) {
        if (typeof dataText[i] == 'undefined') {
            setTimeout(function () {
                StartTextAnimation(0);
            }, 1000);
        }
        // check if dataText[i] exists
        if (i < dataText[i].length) {
            // text exists! start typewriter animation
            typeWriter(dataText, 0, function () {
                // after callback (and whole text has been animated), start next text
                StartTextAnimation(i + 1);
            });
        }
    }
    // start the text animation
    StartTextAnimation(0);
});

$(window).scroll(function () {
    console.log($(this).scrollTop());
    if ($(this).scrollTop() < 550) {
        $('.sem').each(function(){
            $(this).removeClass('menu-active');
            $('.ini').addClass('menu-active');
        });
    }
    else if ($(this).scrollTop() > 550 && $(this).scrollTop() < 765 ) {
        $('.sem').each(function(){
            $(this).removeClass('menu-active');
            $('.sobre').addClass('menu-active');
        });
    }
    else if ($(this).scrollTop() > 765 && $(this).scrollTop() < 1200) {
        $('.sem').each(function(){
            $(this).removeClass('menu-active');
            $('.port').addClass('menu-active');
        });
    }
    else if ($(this).scrollTop() > 1200 && $(this).scrollTop() < 2210) {
        $('.sem').each(function(){
            $(this).removeClass('menu-active');
            $('.age').addClass('menu-active');
        });
    }
    else if ($(this).scrollTop() > 2210 && $(this).scrollTop() < 3050) {
        $('.sem').each(function(){
            $(this).removeClass('menu-active');
            $('.ser').addClass('menu-active');
        });
    }
    else if ($(this).scrollTop() > 3050 && $(this).scrollTop() < 3900) {
        $('.sem').each(function(){
            $(this).removeClass('menu-active');
            $('.eve').addClass('menu-active');
        });
    }
    else if ($(this).scrollTop() > 3980 && $(this).scrollTop() < 4200) {
        $('.sem').each(function(){
            $(this).removeClass('menu-active');
            $('.inc').addClass('menu-active');
        });
    }
    else if ($(this).scrollTop() > 4300) {
        $('.sem').each(function(){
            $(this).removeClass('menu-active');
            $('.fc').addClass('menu-active');
        });
    }
});
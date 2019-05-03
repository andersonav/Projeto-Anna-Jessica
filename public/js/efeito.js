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
    if ($(this).scrollTop() < 550) {
        $('.sem').each(function () {
            $(this).removeClass('menu-active');
            $('.ini').addClass('menu-active');
        });
    }
    else if ($(this).scrollTop() > 550 && $(this).scrollTop() < 765) {
        $('.sem').each(function () {
            $(this).removeClass('menu-active');
            $('.sobre').addClass('menu-active');
        });
    }
    else if ($(this).scrollTop() > 765 && $(this).scrollTop() < 1200) {
        $('.sem').each(function () {
            $(this).removeClass('menu-active');
            $('.port').addClass('menu-active');
        });
    }
    else if ($(this).scrollTop() > 1200 && $(this).scrollTop() < 2210) {
        $('.sem').each(function () {
            $(this).removeClass('menu-active');
            $('.age').addClass('menu-active');
        });
    }
    else if ($(this).scrollTop() > 2210 && $(this).scrollTop() < 3050) {
        $('.sem').each(function () {
            $(this).removeClass('menu-active');
            $('.ser').addClass('menu-active');
        });
    }
    else if ($(this).scrollTop() > 3050 && $(this).scrollTop() < 3900) {
        $('.sem').each(function () {
            $(this).removeClass('menu-active');
            $('.eve').addClass('menu-active');
        });
    }
    else if ($(this).scrollTop() > 3980 && $(this).scrollTop() < 4200) {
        $('.sem').each(function () {
            $(this).removeClass('menu-active');
            $('.inc').addClass('menu-active');
        });
    }
    else if ($(this).scrollTop() > 4300) {
        $('.sem').each(function () {
            $(this).removeClass('menu-active');
            $('.fc').addClass('menu-active');
        });
    }
});

// LOGICA PARA WHATS APP

let telefone = '5588988459641'
let mensagem = document.getElementById('mensagem')
let nome = document.getElementById('nomee')

// font: 
let isMobile = (function (a) {
    if (/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a) || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0, 4))) {
        return true
    } else {
        return false
    }
})(navigator.userAgent || navigator.vendor || window.opera)

let mount = function () {
    if (isMobile) {
        let target = `whatsapp://send?`

        target += `phone=${encodeURIComponent(telefone)}&text=Nome: ${encodeURIComponent(nome.value)}\n Mensagem: ${encodeURIComponent(mensagem.value)}\n`
        setTimeout(function () { window.open(target) }, 2000);
        return target
    } else {
        let target = `https://api.whatsapp.com/send?`

        target += `phone=${encodeURIComponent(telefone)}&text=Nome: ${encodeURIComponent(nome.value)}\n Mensagem: ${encodeURIComponent(mensagem.value)}\n`

        setTimeout(function () { window.open(target) }, 2000);
        return target
    }

}
$('.btnWpp').on('click', function () {
    console.log(telefone, mensagem.value, nome.value);
    if (mensagem.value !== '' && nome.value !== '') {

        mount();

        $('.cancelarWpp').click();
        $('#nomee').val('');
        $('#mensagem').val('');

        setTimeout(function () {
            Swal.fire({
                position: 'top-end',
                type: 'success',
                title: 'Sucesso, redirecionando ... ',
                showConfirmButton: false,
                timer: 1500
            });
        }, 500);
    } else {
        $('.cancelarWpp').click();
        $('#nomee').val('');
        $('#mensagem').val('');
        setTimeout(function () {
            Swal.fire(
                'Error ao enviar',
                'Verifique os campos com atenção!',
                'error'
            );
        }, 500);
    }
});

$(window).scroll(function () {
    if ($(this).scrollTop() > 100) {
        $('.whats').fadeIn('slow');
    } else {
        $('.whats').fadeOut('slow');
    }
});
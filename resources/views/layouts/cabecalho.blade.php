<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>{{$title or ''}}</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Favicons -->
        <link href="{{asset('img/favicon.png')}}" rel="icon">
        <link href="{{asset('img/apple-touch-icon.png')}}" rel="apple-touch-icon">

        <!-- Google Fonts -->
        <link
            href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800"
            rel="stylesheet">

        <!-- Bootstrap CSS File -->
        <link href="{{asset('lib/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

        <!-- Libraries CSS Files -->
        <link href="{{asset('lib/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
        <link href="{{asset('lib/animate/animate.min.css')}}" rel="stylesheet">
        <link href="{{asset('lib/venobox/venobox.css')}}" rel="stylesheet">
        <link href="{{asset('lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

        <!-- Main Stylesheet File -->
        <link href="{{asset('css/style.css')}}" rel="stylesheet">
        <link href="{{asset('css/efeito.css')}}" rel="stylesheet">
        <script src="{{asset('lib/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('lib/jquery/jquery-migrate.min.js')}}"></script>
        <script src="{{asset('lib/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('lib/easing/easing.min.js')}}"></script>
        <script src="{{asset('lib/superfish/hoverIntent.js')}}"></script>
        <script src="{{asset('lib/superfish/superfish.min.js')}}"></script>
        <script src="{{asset('lib/wow/wow.min.js')}}"></script>
        <script src="{{asset('lib/venobox/venobox.min.js')}}"></script>
        <script src="{{asset('lib/owlcarousel/owl.carousel.min.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

        <!-- Contact Form JavaScript File -->
        <script src="{{asset('js/contactform.js')}}"></script>

        <script src="{{ asset('js/jquery.mask.js') }}"></script>

        <!-- Template Main Javascript File -->
        <script src="{{asset('js/main.js')}}"></script>
        <script src="{{asset('js/index.js')}}"></script>
     


        <!-- tudo sobre contagem -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
        <script src="js/jquery.countdown.js"></script>
        <script>
$(function () {
    $(".digits").countdown({
        image: "img/digits.png",
        format: "dd:hh:mm:ss",
        endTime: new Date(2019, 5, 6)
    });
});
        </script>
        <!-- =======================================================
                  Author: EDEV
                ======================================================= -->
    </head>

    <body>
        @yield('conteudo')



        <!--==========================
              Footer
            ============================-->
        <br><br><br>
        <footer id="footer">
            <div class="container">
                <div class="copyright">
                    &copy; Copyright <strong>Anna Jessica</strong> . Todos os direitos reservados!
                </div>
                <div class="credits">
                    Desenvolvido por <a href="https://edeev.com.br/">EDEV</a>
                </div>
            </div>
        </footer><!-- #footer -->
        <!-- JavaScript Libraries -->

    </body>
</html>
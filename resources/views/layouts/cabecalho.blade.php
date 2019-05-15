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
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">

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
        <script src="js/jquery.countdown.js"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
        <script src="{{asset('lib/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('lib/easing/easing.min.js')}}"></script>
        <script src="{{asset('lib/superfish/hoverIntent.js')}}"></script>
        <script src="{{asset('lib/superfish/superfish.min.js')}}"></script>
        <script src="{{asset('lib/wow/wow.min.js')}}"></script>
        <script src="{{asset('lib/venobox/venobox.min.js')}}"></script>
        <script src="{{asset('lib/owlcarousel/owl.carousel.min.js')}}"></script>


        <!-- Contact Form JavaScript File -->
        <script src="{{asset('js/contactform.js')}}"></script>

        <script src="{{ asset('js/jquery.mask.js') }}"></script>

        <!-- Template Main Javascript File -->
        <script src="{{asset('js/main.js')}}"></script>
        <script src="{{asset('js/index.js')}}"></script>
        <script src="{{asset('js/sweetalert2.all.min.js')}}"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>




        <!-- tudo sobre contagem -->


        <script>
            $(function () {
                $(".digits").countdown({
                    image: "img/digits.png",
                    format: "dd:hh:mm:ss",
                    endTime: new Date(2019, 4, 16)
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
            <div class="footer-top">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-3 col-md-6 footer-info">

                            <img src="{{asset('img/logoteste.png')}}" alt="TheEvenet">
                        </div>

                        <div class="col-lg-3 col-md-3 footer-contact">


                        </div>


                        <div class="col-lg-3 col-md-6 footer-contact">
                            <h4>Fale conosco</h4>
                            <p>
                                <strong><i class="fa fa-street-view"></i></strong> Maranguape - CE <br>
                                <strong><i class="fa fa-phone"></i></strong> +55 (85) 98910-5894<br>
                                <strong><i class="fa fa-envelope"></i></strong> annajessicaoficial@gmail.com<br>
                            </p>

                            <div class="social-links">
                                <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                                <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                                <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
                                <a href="#" class="youtube"><i class="fa fa-youtube"></i></a>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

            <div class="container">
                <div class="copyright">
                    &copy; Copyright <strong>Marca</strong>. Todos o s direitos reservados
                </div>
                <div class="credits">
                    <!--
                                All the links in the footer should remain intact.
                         You can delete the links only if you purchased the pro version.
                         Licensing information: https://bootstrapmade.com/license/
                         Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=TheEvent
                    -->
                    desenvolvido por <a href="#">Edev</a>
                </div>
            </div>
        </footer><!-- #footer -->


        <!-- JavaScript Libraries -->

    </body>
</html>
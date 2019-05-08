<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Titulo do site</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

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

    <!-- =======================================================
          Author: EDEV
        ======================================================= -->
</head>

<body>

    <!--==========================
              Header
            ============================-->
    <header id="header">
        <div class="container">

            <div id="logo" class="pull-left">
                <!-- Uncomment below if you prefer to use a text logo -->
                <!-- <h1><a href="#main">C<span>o</span>nf</a></h1>-->
                <a href="#intro" class="scrollto"><img src="{{asset('img/logoteste.png')}}" alt="" title=""></a>
            </div>

            <nav id="nav-menu-container">
                <ul class="nav-menu">
                    <li class="sem menu-active ini"><a href="#intro">Inicio</a></li>
                    <li class="sem sobre"><a href="#about">Sobre</a></li>
                    <li class="sem port"><a href="#speakers">Portifolio</a></li>
                    <li class="sem age"><a href="#schedule">Agenda</a></li>
                    <li class="sem ser"><a href="#hotels">Serviços</a></li>
                    <li class="sem eve"><a href="#buy-tickets">Eventos</a></li>
                    @guest<li class="sem inc"><a href="#contact">Inscrições</a></li>@endguest
                    <li class="sem fc"><a href="#footer">Fale conosco</a></li>
                    @auth
                    <li class="dropdown show">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            {{ auth()->user()->nome_usuario }}
                        </a>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item item-user" href="{{ route('home') }}"><i class="fa fa-home"></i>
                                Inicio</a><br>
                            <a class="dropdown-item item-user" href="{{ route('perfil') }}"><i class="fa fa-user"></i>
                                Perfil</a><br>
                            @if(auth()->user()->id_tipo_usuario == 1)
                            <a class="dropdown-item item-user" href="{{ route('adminConf') }}"><i
                                    class="fa fa-gear"></i> Configuração</a><br>

                            @else
                            <a class="dropdown-item item-user" href="{{ url()->previous() }}"><i
                                    class="fa fa-arrow-left"></i> Voltar</a><br>
                            @endif
                            <a class="dropdown-item item-user" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                                    class="fa fa-sign-out"></i> Sair</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>

                        </div>
                    </li>
                    @else
                    <li class="buy-tickets" data-toggle="modal" data-target="#buy-ticket-modal"
                        data-ticket-type="premium-access"><a>Login</a></li>
                    @endauth
                </ul>
            </nav><!-- #nav-menu-container -->
        </div>
    </header><!-- #header -->

    <main id="main" class="main-page">

        <!--==========================
              Speaker Details Section
            ============================-->
        <section id="speakers-details" class="wow fadeIn">
            <div class="container">
                <div class="section-header">
                    <h2>Speaker Details</h2>
                    <p>Praesentium ut qui possimus sapiente nulla.</p>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <img src="{{asset('img/speakers/1.jpg')}}" alt="Speaker 1" class="img-fluid">
                    </div>

                    <div class="col-md-6">
                        <div class="details">
                            <h2>Brenden Legros</h2>
                            <div class="social">
                                <a href=""><i class="fa fa-twitter"></i></a>
                                <a href=""><i class="fa fa-facebook"></i></a>
                                <a href=""><i class="fa fa-google-plus"></i></a>
                                <a href=""><i class="fa fa-linkedin"></i></a>
                            </div>
                            <p>Voluptatem perferendis sed assumenda voluptatibus. Laudantium molestiae sint. Doloremque
                                odio dolore dolore sit. Quae labore alias ea omnis ex expedita sapiente molestias atque.
                                Optio voluptas et.</p>

                            <p>Aboriosam inventore dolorem inventore nam est esse. Aperiam voluptatem nisi molestias
                                laborum ut. Porro dignissimos eum. Tempore dolores minus unde est voluptatum incidunt ut
                                aperiam.</p>

                            <p>Et dolore blanditiis officiis non quod id possimus. Optio non commodi alias sint culpa
                                sapiente nihil ipsa magnam. Qui eum alias provident omnis incidunt aut. Eius et officia
                                corrupti omnis error vel quia omnis velit. In qui debitis autem aperiam voluptates unde
                                sunt et facilis.</p>
                        </div>
                    </div>

                </div>
            </div>

        </section>

    </main>


    <!--==========================
          Footer
        ============================-->
    <footer id="footer">
        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong>TheEvent</strong> . All Rights Reserved
            </div>
            <div class="credits">
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>
    </footer><!-- #footer -->

    <a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="{{asset('lib/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('lib/jquery/jquery-migrate.min.js')}}"></script>
    <script src="{{asset('lib/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('lib/superfish/hoverIntent.js')}}"></script>
    <script src="{{asset('lib/superfish/superfish.min.js')}}"></script>
    <script src="{{asset('lib/wow/wow.min.js')}}"></script>
    <script src="{{asset('lib/venobox/venobox.min.js')}}"></script>
    <script src="{{asset('lib/owlcarousel/owl.carousel.min.js')}}"></script>

    <!-- Contact Form JavaScript File -->
    <script src="{{asset('js/contactform.js')}}"></script>

    <!-- Template Main Javascript File -->
    <script src="{{asset('js/main.js')}}"></script>
</body>

</html>
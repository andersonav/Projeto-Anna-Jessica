<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Anna Jessica</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicons -->
    <link href="{{asset('img/favicon.png')}}" rel="icon">
    <link href="{{asset('img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800" rel="stylesheet">

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
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">

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
                <a href="javascript:void(0);" class="scrollto"><img src="{{asset('img/logoteste.png')}}" alt="" title=""></a>
            </div>

            <nav id="nav-menu-container">
                <ul class="nav-menu">
                    <li class="sem menu-active ini"><a href="javascript:void(0);">Relatorios</a></li>
                    @auth
                    <li class="dropdown show">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ auth()->user()->nome_usuario }}
                        </a>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item item-user" href="{{ route('home') }}"><i class="fa fa-home"></i>
                                Inicio</a><br>
                            <a class="dropdown-item item-user" href="{{ url()->previous() }}"><i class="fa fa-arrow-left"></i> Voltar</a><br>
                            @if(auth()->user()->id_tipo_usuario == 1)
                            <a class="dropdown-item item-user" href="{{ route('adminConf') }}"><i class="fa fa-gear"></i> Configuração</a><br>

                            @else
                            <a class="dropdown-item item-user" href="{{ route('perfil') }}"><i class="fa fa-user"></i>
                                Perfil</a><br>
                            @endif
                            <a class="dropdown-item item-user" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i> Sair</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>

                        </div>
                    </li>
                    @else
                    <li class="buy-tickets" data-toggle="modal" data-target="#buy-ticket-modal" data-ticket-type="premium-access"><a>Login</a></li>
                    @endauth
                </ul>
            </nav><!-- #nav-menu-container -->
        </div>
    </header><!-- #header -->


    <main id="main" class="main-page">

        <!--==========================
              Speaker Details Section
            ============================-->
        <section id="buy-tickets" class="section-with-bg wow fadeInUp">
        <div class="container">

            <div class="section-header">
                <h2>Dashboard</h2>
            </div>

            <div class="row">
               
                <div class="col-lg-4">
                    <div class="card" id="cardR">
                        <div class="card-body">
                            <span><b>Usuários <br/>Cadastrados</b></span>
                            
                            <div class="contR" id="countUsuarios">
                                
                            </div>
                            <br>
                            <button class="btnmodal"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> &nbsp;Gerar</button>
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card" id="cardR">
                        <div class="card-body">
                            <span><b>Kits Vendidos no Evento em Destaque</b></span>
                            
                            <div class="contR" id="countUsuariosEventoDestaque">
                                
                            </div>
                            <br>
                            <button class="btnmodal"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> &nbsp;Gerar</button>
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card" id="cardR">
                        <div class="card-body">
                            <span><b>Eventos <br/>Realizados</b></span>
                            
                            <div class="contR" id="eventosRealizados">
                                29
                            </div>
                            <br>
                            <button class="btnmodal"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> &nbsp;Gerar</button>
                            
                        </div>
                    </div>
                </div>
                <!-- <div class="col-lg-3">
                    <div class="card" id="cardR">
                        <div class="card-body">
                            <span><b>Usuarios Cadastrados</b></span>
                            
                            <div class="contR">
                                29
                            </div>
                            <br>
                            <button class="btnmodal"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> &nbsp;Gerar</button>
                            
                        </div>
                    </div>
                </div> -->
                
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
                &copy; Copyright <strong>Anna Jéssica</strong>. Todos os direitos reservados!
            </div>
            <div class="credits">
                Desenvolvido por <a href="#">
                    <font color="blue"><b>EDEV</b></font>
                </a>
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
    <script src="{{ asset('js/jquery.mask.js') }}"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

    <!-- Template Main Javascript File -->
    <script src="{{asset('js/main.js')}}"></script>
    <script src="{{asset('js/relatorioAdmin.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('#relatorioUser').DataTable({
                "processing": true,
                "responsive": true,
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese-Brasil.json"
                }
            });
        });
    </script>
</body>

</html>
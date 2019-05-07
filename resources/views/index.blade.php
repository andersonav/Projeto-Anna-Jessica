<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Anna Jéssica Oficial</title>
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
                            <a class="dropdown-item item-user" href="#"><i
                                class="fa fa-user"></i> Perfil</a><br>
                            <a class="dropdown-item item-user" href="#"><i
                                class="fa fa-gear"></i> Configuração</a><br>
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

    <!--==========================
          Intro Section
        ============================-->
    <section id="intro">

        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="{{ asset('img/carrosel/img1.JPG')}}" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{asset('img/carrosel/img2.JPG')}}" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{ asset('img/carrosel/img1.JPG')}}" alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>


        <!--  <div class="intro-container wow fadeIn">
              <h1 class="mb-4 pb-0">A Marca<br><span>Texto</span> Texto</h1>
              <p class="mb-4 pb-0">Lugar para digitar alguma coisa</p>
              <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="venobox play-btn mb-4" data-vbtype="video"
                data-autoplay="true"></a>
              <a href="#about" class="about-btn scrollto">Adicionar botão</a>
            </div>  -->


    </section>

    <main id="main">

        <!--==========================
              About Section
            ============================-->
        <section id="about">
            <div class="container">
                <div class="row">

                    <div class="col-lg-12">
                        <center>
                            <h2>Anna Jessica</h2>
                            <p>Radialista, Mestre de Cerimônias e Apresentadadora de Eventos Esportivos.</p>
                        </center>
                    </div>
                </div>
            </div>
        </section>

        <!--==========================
              Speakers Section
            ============================-->
        <section id="speakers" class="wow bounceInUp">
            <div class="container">
                <div class="section-header">
                    <span class="sombra digitar" id="port">Portifolio</span>
                    <h2>Portifolio</h2>
                </div>

                <div class="row">
                    <div class="col-lg-1 col-md-4"></div>
                    <div class="col-lg-5 col-md-4" data-toggle="modal" data-target="#buy-ticket-modalportifolio1">
                        <div class="speaker">
                            <img src="{{asset('img/postifolio/corrida.JPG')}}" alt="Speaker 5" class="img-fluid">
                            <div class="details">
                                <h3><a href="javascript:void(0);">Eventos Esportivos</a></h3>
                                <div class="social">
                                    <!-- <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-google-plus"></i></a>
                                    <a href="#"><i class="fa fa-linkedin"></i></a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-4" data-toggle="modal" data-target="#buy-ticket-modalportifolio2">
                        <div class="speaker">
                            <img src="{{asset('img/postifolio/corrida.JPG')}}" alt="Speaker 6" class="img-fluid">
                            <div class="details">
                                <h3><a href="javascript:void(0);">Cerimônial</a></h3>
                                <div class="social">
                                    <!-- <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-google-plus"></i></a>
                                    <a href="#"><i class="fa fa-linkedin"></i></a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-1 col-md-4"></div>
                </div>
            </div>

        </section>

        <!--==========================
              Schedule Section
            ============================-->
        <section id="schedule" class="section-with-bg">
            <div class="container wow fadeInUp">
                <div class="section-header">
                    <span class="sombra digitar" id="age">Agenda</span>
                    <h2>Agenda</h2>
                </div>

                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" href="#day-1" role="tab" data-toggle="tab">Dia 01/05</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#day-2" role="tab" data-toggle="tab">Dia 02/05</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#day-3" role="tab" data-toggle="tab">Dia 03/05</a>
                    </li>
                </ul>

                <h3 class="sub-heading">Estas datas podem ser alteradas ao decorrer da semana. Atualizações todas as
                    terças.</h3>

                <div class="tab-content row justify-content-center">

                    <!-- Schdule Day 1 -->
                    <div role="tabpanel" class="col-lg-9 tab-pane fade show active" id="day-1">

                        <div class="row schedule-item">
                            <div class="col-md-3"><time>09:30 AM</time><br><span>Maranguape - CE</span></div>
                            <div class="col-md-9">
                                <h4>Vago para Contratações</h4>
                                <p>Nenhum evento para este horario.</p>
                            </div>
                        </div>

                        <div class="row schedule-item">
                            <div class="col-md-3"><time>10:00 AM</time><br><span>Maranguape - CE</span></div>
                            <div class="col-md-9">
                                <div class="speaker">
                                    <img src="{{asset('img/corrida.jpg')}}" alt="Brenden Legros">
                                </div>
                                <h4>Evento Reservado <span>*</span></h4>
                                <p>Nenhum detalhe sobre.</p>
                            </div>
                        </div>

                        <div class="row schedule-item">
                            <div class="col-md-3"><time>11:00 AM</time><br><span>Maranguape - CE</span></div>
                            <div class="col-md-9">
                                <div class="speaker">
                                    <img src="{{asset('img/corrida.jpg')}}" alt="Hubert Hirthe">
                                </div>
                                <h4>Evento Silcar Car <span>Aberto ao Publico</span></h4>
                                <p>Entrega de premios e muito mais.</p>
                            </div>
                        </div>




                    </div>
                    <!-- End Schdule Day 1 -->

                    <!-- Schdule Day 2 -->
                    <div role="tabpanel" class="col-lg-9  tab-pane fade" id="day-2">

                        <div class="row schedule-item">
                            <div class="col-md-3"><time>10:00 AM</time><br><span>Maranguape - CE</span></div>
                            <div class="col-md-9">
                                <div class="speaker">
                                    <img src="{{asset('img/imgteste.jpg')}}" alt="Brenden Legros">
                                </div>
                                <h4>Texto texto <span>Brenden Legros</span></h4>
                                <p>Facere provident incidunt quos voluptas.</p>
                            </div>
                        </div>

                        <div class="row schedule-item">
                            <div class="col-md-3"><time>11:00 AM</time><br><span>Maranguape - CE</span></div>
                            <div class="col-md-9">
                                <div class="speaker">
                                    <img src="{{asset('img/imgteste.jpg')}}" alt="Hubert Hirthe">
                                </div>
                                <h4>Texto texto <span>Hubert Hirthe</span></h4>
                                <p>Maiores dignissimos neque qui cum accusantium ut sit sint inventore.</p>
                            </div>
                        </div>

                        <div class="row schedule-item">
                            <div class="col-md-3"><time>12:00 AM</time><br><span>Maranguape - CE</span></div>
                            <div class="col-md-9">
                                <div class="speaker">
                                    <img src="{{asset('img/imgteste.jpg')}}" alt="Cole Emmerich">
                                </div>
                                <h4>Texto texto <span>Cole Emmerich</span></h4>
                                <p>Veniam accusantium laborum nihil eos eaque accusantium aspernatur.</p>
                            </div>
                        </div>

                        <div class="row schedule-item">
                            <div class="col-md-3"><time>02:00 PM</time><br><span>Maranguape - CE</span></div>
                            <div class="col-md-9">
                                <div class="speaker">
                                    <img src="{{asset('img/imgteste.jpg')}}" alt="Jack Christiansen">
                                </div>
                                <h4>Texto texto <span>Jack Christiansen</span></h4>
                                <p>Nam ex distinctio voluptatem doloremque suscipit iusto.</p>
                            </div>
                        </div>

                        <div class="row schedule-item">
                            <div class="col-md-3"><time>03:00 PM</time><br><span>Maranguape - CE</span></div>
                            <div class="col-md-9">
                                <div class="speaker">
                                    <img src="{{asset('img/imgteste.jpg')}}" alt="Willow Trantow">
                                </div>
                                <h4>Texto texto <span>Willow Trantow</span></h4>
                                <p>Voluptatem et alias dolorum est aut sit enim neque veritatis.</p>
                            </div>
                        </div>

                        <div class="row schedule-item">
                            <div class="col-md-3"><time>04:00 PM</time><br><span>Maranguape - CE</span></div>
                            <div class="col-md-9">
                                <div class="speaker">
                                    <img src="{{asset('img/imgteste.jpg')}}" alt="Willow Trantow">
                                </div>
                                <h4>Texto texto <span>Willow Trantow</span></h4>
                                <p>Voluptatem et alias dolorum est aut sit enim neque veritatis.</p>
                            </div>
                        </div>

                    </div>
                    <!-- End Schdule Day 2 -->

                    <!-- Schdule Day 3 -->
                    <div role="tabpanel" class="col-lg-9  tab-pane fade" id="day-3">

                        <div class="row schedule-item">
                            <div class="col-md-3"><time>10:00 AM</time><br><span>Maranguape - CE</span></div>
                            <div class="col-md-9">
                                <div class="speaker">
                                    <img src="{{asset('img/imgteste.jpg')}}" alt="Hubert Hirthe">
                                </div>
                                <h4>Texto texto <span>Hubert Hirthe</span></h4>
                                <p>Maiores dignissimos neque qui cum accusantium ut sit sint inventore.</p>
                            </div>
                        </div>

                        <div class="row schedule-item">
                            <div class="col-md-3"><time>11:00 AM</time><br><span>Maranguape - CE</span></div>
                            <div class="col-md-9">
                                <div class="speaker">
                                    <img src="{{asset('img/imgteste.jpg')}}" alt="Cole Emmerich">
                                </div>
                                <h4>Texto texto <span>Cole Emmerich</span></h4>
                                <p>Veniam accusantium laborum nihil eos eaque accusantium aspernatur.</p>
                            </div>
                        </div>

                        <div class="row schedule-item">
                            <div class="col-md-3"><time>12:00 AM</time><br><span>Maranguape - CE</span></div>
                            <div class="col-md-9">
                                <div class="speaker">
                                    <img src="{{asset('img/imgteste.jpg')}}" alt="Brenden Legros">
                                </div>
                                <h4>Texto texto <span>Brenden Legros</span></h4>
                                <p>Facere provident incidunt quos voluptas.</p>
                            </div>
                        </div>

                        <div class="row schedule-item">
                            <div class="col-md-3"><time>02:00 PM</time><br><span>Maranguape - CE</span></div>
                            <div class="col-md-9">
                                <div class="speaker">
                                    <img src="{{asset('img/imgteste.jpg')}}" alt="Jack Christiansen">
                                </div>
                                <h4>Texto texto <span>Jack Christiansen</span></h4>
                                <p>Nam ex distinctio voluptatem doloremque suscipit iusto.</p>
                            </div>
                        </div>

                        <div class="row schedule-item">
                            <div class="col-md-3"><time>03:00 PM</time><br><span>Maranguape - CE</span></div>
                            <div class="col-md-9">
                                <div class="speaker">
                                    <img src="{{asset('img/imgteste.jpg')}}" alt="Alejandrin Littel">
                                </div>
                                <h4>Quos ratione neque expedita asperiores. <span>Alejandrin Littel</span></h4>
                                <p>Eligendi quo eveniet est nobis et ad temporibus odio quo.</p>
                            </div>
                        </div>

                        <div class="row schedule-item">
                            <div class="col-md-3"><time>04:00 PM</time><br><span>Maranguape - CE</span></div>
                            <div class="col-md-9">
                                <div class="speaker">
                                    <img src="{{asset('img/imgteste.jpg')}}" alt="Willow Trantow">
                                </div>
                                <h4>Quo qui praesentium nesciunt <span>Willow Trantow</span></h4>
                                <p>Voluptatem et alias dolorum est aut sit enim neque veritatis.</p>
                            </div>
                        </div>

                    </div>
                    <!-- End Schdule Day 2 -->

                </div>

            </div>

        </section>

        <!--==========================
              Venue Section
            ============================-->
        <section id="venue" class="wow fadeInUp">

            <div class="container-fluid">

                <!--  <div class="row no-gutters">
                    <div class="col-lg-6 venue-map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1                                                                                                                                                                                                        024!2i768!4f13.1!3m3!1m2!1s0x0                                                                                                                                                                                                        %3A0xb89d1fe6b                                                                                                                                                                                                        c499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v                                                                                                                                                                                                        1539943755621" frameborder="0" style="border:0" allowfullscreen></                                                                                                                                                                                                        iframe>
                                                                     </div>
                    
                    <div class="col-lg-6 venue-info">
                    <div class="row justify-content-center">
                    <div class="col-11 col-lg-8">
                    <h3>Texto texto</h3>
                    <p>Iste nobis eum sapiente sunt enim dolores labore accusan                                                                                                                                                                                                        tium autem. Cumque beatae ipsam. E                                                                                                                                                                                                        st quae sit qui voluptatem corpo                                                                                                                                                                                                        ris velit. Qui maxime accusamu                                                                                                                                                                                                        s possimus. Consequatur sequ                                                                                                                                                                                                        i et ea suscipit enim ne                                                                                                                                                                                                        sciunt quia velit.</p>
</div>
                                              </div>
                    </div>
                    </div>
                    -->
            </div>

            <div class="container-fluid venue-gallery-container">
                <div class="row no-gutters">
                    <div class="col-lg-4 col-md-4">

                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img class="d-block w-100" src="{{ asset('img/anuncios/pasta1/1.png')}}"
                                        alt="First slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="{{ asset('img/anuncios/pasta1/2.jpeg')}}"
                                        alt="Second slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="{{ asset('img/anuncios/pasta1/3.png')}}"
                                        alt="Third slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="{{ asset('img/anuncios/pasta1/4.png')}}"
                                        alt="Third slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="{{ asset('img/anuncios/pasta1/5.jpg')}}"
                                        alt="Third slide">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">

                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img class="d-block w-100" src="{{ asset('img/anuncios/pasta1/1.png')}}"
                                        alt="First slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="{{ asset('img/anuncios/pasta1/2.jpeg')}}"
                                        alt="Second slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="{{ asset('img/anuncios/pasta1/3.png')}}"
                                        alt="Third slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="{{ asset('img/anuncios/pasta1/4.png')}}"
                                        alt="Third slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="{{ asset('img/anuncios/pasta1/5.jpg')}}"
                                        alt="Third slide">
                                </div>
                            </div>


                        </div>



                    </div>
                    <div class="col-lg-4 col-md-4">

                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img class="d-block w-100" src="{{ asset('img/anuncios/pasta1/1.png')}}"
                                        alt="First slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="{{ asset('img/anuncios/pasta1/2.jpeg')}}"
                                        alt="Second slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="{{ asset('img/anuncios/pasta1/3.png')}}"
                                        alt="Third slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="{{ asset('img/anuncios/pasta1/4.png')}}"
                                        alt="Third slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="{{ asset('img/anuncios/pasta1/5.jpg')}}"
                                        alt="Third slide">
                                </div>
                            </div>

                        </div>



                    </div>



                </div>
            </div>

        </section>

        <!--==========================
            Hotels Section
            ============================-->
        <section id="hotels" class="section-with-bg wow fadeInUp">

            <div class="container">
                <div class="section-header">
                    <span class="sombra digitar" id="ser">Serviços</span>
                    <h2>Serviços</h2>
                </div>

                <div class="row">

                    <div class="col-lg-4 col-md-6">
                        <div class="hotel">
                            <div class="hotel-img">
                                <img src="{{asset('img/servicos/SPOTS.png')}}" alt="Hotel 1" class="img-fluid">
                            </div>
                            <h3><a href="#">Spots</a></h3>
                            <div class="stars">
                                <p>Gravações offs, gravação de spots comercial e vinhetas para a sua radio ou TV.</p>
                                <div class="text-center"><button type="submit" class="btnmodal">Ouça Agora</button>
                                </div><br>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="hotel">
                            <div class="hotel-img">
                                <img src="{{asset('img/servicos/video.png')}}" alt="Hotel 1" class="img-fluid">
                            </div>
                            <h3><a href="#">Vídeo institucional</a></h3>
                            <div class="stars">
                                <p>Produzimos conteúdo áudio visual, para divulgar sua empresa nas plataformas digitais.
                                </p>
                                <div class="text-center"><button type="submit" class="btnmodal" data-toggle="modal"
                                        data-target="#buy-ticket-modalservice2" data-ticket-type="premium-access">Veja
                                        Agora</button>
                                </div><br>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="hotel">
                            <div class="hotel-img">
                                <img src="{{asset('img/servicos/cobertura.png')}}" alt="Hotel 1" class="img-fluid">
                            </div>
                            <h3><a href="#">Cobertura de eventos</a></h3>
                            <div class="stars">
                                <p>Trabalhamos com divulgação por meio das midias sociais, com cobertura textual, audio
                                    visual, fortográfica e imagens aéreas, que aproxima seu publico da sua empresa, além
                                    de aumentar a visibilidade da sua marca e seu alcance.</p>
                                <div class="text-center"><button type="submit" class="btnmodal" data-toggle="modal"
                                        data-target="#buy-ticket-modalservice3" data-ticket-type="premium-access">Veja
                                        Agora</button>
                                </div><br>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

        </section>

        <!--==========================
            Gallery Section
            ============================-->





        <!--==========================
              Subscribe Section
            ============================-->


        <!--==========================
              Buy Ticket Section
            ============================-->
        <section id="buy-tickets" class="section-with-bg wow fadeInUp">
            <div class="container">

                <div class="section-header">
                    <span class="sombra digitar" id="eve">Eventos</span>
                    <h2>Eventos</h2>
                </div>

                <div class="row">

                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title text-muted text-uppercase text-center">Fique por dentro! </h5>
                                <h6 class="card-price text-center">9º cervejada de Boa Viagem </h6>
                                <hr>
                                <div class="hotel-img">
                                    <img src="{{asset('img/eventos/cervejadabv.png')}}" alt="Hotel 1" class="img-fluid">
                                </div>
                                <br>
                                <ul class="fa-ul">
                                    <li><span class="fa-li"><i class="fa fa-check"></i></span>Video: <a
                                            href=" https://www.youtube.com/watch?v=vBRxEBZFBeI" Target=”_blank”>click
                                            aqui</a></li>
                                    <li><span class="fa-li"><i class="fa fa-check"></i></span>Fotos: <a
                                            href="https://drive.google.com/drive/u/0/mobile/folders/1xjco_FZ3QgckoiPCYWcCIDfLrk3HB_jN?usp=sharing"
                                            Target=”_blank”>click
                                            aqui</a></li>
                                </ul>
                                <hr>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title text-muted text-uppercase text-center">Fique por dentro! </h5>
                                <h6 class="card-price text-center">Cobertura oficial do Bloco Fantastico 2019</h6>
                                <hr>
                                <div class="hotel-img">
                                    <img src="{{asset('img/eventos/fantastico.png')}}" alt="Hotel 1" class="img-fluid">
                                </div>
                                <br>
                                <ul class="fa-ul">
                                    <li><span class="fa-li"><i class="fa fa-check"></i></span>Video 1: <a
                                            href="https://www.youtube.com/watch?v=2uqBWfDikAQ " Target=”_blank”>click
                                            aqui</a></li>
                                    <li><span class="fa-li"><i class="fa fa-check"></i></span>Video 2: <a
                                            href="https://www.youtube.com/watch?v=mn8kKVxolbE&t=381s "
                                            Target=”_blank”>click
                                            aqui</a></li>
                                </ul>
                                <hr>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title text-muted text-uppercase text-center">Fique por dentro! </h5>
                                <h6 class="card-price text-center">1º Night Bike Maranguape</h6>
                                <hr>
                                <div class="hotel-img">
                                    <img src="{{asset('img/servicos/cobertura.png')}}" alt="Hotel 1" class="img-fluid">
                                </div>
                                <br>
                                <ul class="fa-ul">
                                    <li><span class="fa-li"><i class="fa fa-check"></i></span>Video: <a
                                            href="https://youtu.be/B7vMlgMl9cw" Target=”_blank”>click
                                            aqui</a> </li>
                                </ul>
                                <hr>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title text-muted text-uppercase text-center">Em breve!</h5>
                                <h6 class="card-price text-center">Vaquejada de Boa Viagem</h6>
                                <hr>
                                <div class="hotel-img">
                                    <img src="{{asset('img/eventos/vaquejadabv.png')}}" alt="Hotel 1" class="img-fluid">
                                </div>
                                <br>
                                <ul class="fa-ul">

                                </ul>
                                <hr>
                            </div>
                        </div>
                    </div>

                </div>

            </div>



        </section>

        <!-- Modal Order Form -->
        <div id="buy-ticket-modal" class="modal fade">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Login</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="javascript:void(0);" id="myFormLogin">
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" placeholder="Senha">
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btnmodal">Entrar</button>
                            </div>
                        </form>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->


        <div id="buy-ticket-modalservice2" class="modal fade">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <iframe width="100%" height="405" src="https://www.youtube.com/embed/iN1pWCVTwro" frameborder="0"
                        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                    </iframe>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->


        <div id="buy-ticket-modalservice3" class="modal fade">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <iframe width="100%" height="405" src="https://www.youtube.com/embed/EnZH1410qwQ" frameborder="0"
                        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                    </iframe>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->



        <div id="buy-ticket-modalportifolio1" class="modal fade">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6">
                            </div>
                            <div class="col-lg-6">
                                <iframe width="100%" height="215" src="https://www.youtube.com/embed/bH-4R4Jbv00"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen>
                                </iframe>
                            </div>
                            <div class="col-lg-6">

                            </div>
                            <div class="col-lg-6">

                            </div>

                        </div>



                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->


        <div id="buy-ticket-modalportifolio2" class="modal fade">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6">

                            </div>
                            <div class="col-lg-6">
                                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img class="d-block w-100" src="{{ asset('img/anuncios/pasta1/1.png')}}"
                                                alt="First slide">
                                        </div>
                                        <div class="carousel-item">
                                            <img class="d-block w-100" src="{{ asset('img/anuncios/pasta1/2.jpeg')}}"
                                                alt="Second slide">
                                        </div>
                                        <div class="carousel-item">
                                            <img class="d-block w-100" src="{{ asset('img/anuncios/pasta1/3.png')}}"
                                                alt="Third slide">
                                        </div>
                                        <div class="carousel-item">
                                            <img class="d-block w-100" src="{{ asset('img/anuncios/pasta1/4.png')}}"
                                                alt="Third slide">
                                        </div>
                                        <div class="carousel-item">
                                            <img class="d-block w-100" src="{{ asset('img/anuncios/pasta1/5.jpg')}}"
                                                alt="Third slide">
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-6">

                            </div>
                            <div class="col-lg-6">

                            </div>

                        </div>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->


        <div id="buy-ticket-modalsobrep" class="modal fade">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                            </div>
                            <div class="col-lg-12">
                            </div>
                            <div class="col-lg-12">

                            </div>
                            <div class="col-lg-12">

                            </div>

                        </div>



                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <!--==========================
            Contact Section
            ============================-->



        <section id="venue" class="wow fadeInUp">

            <div class="container-fluid">


                <div class="row no-gutters">
                    <!-- <div class="col-lg-4 venue-map">
                        <img src="{{asset('img/inscricao/033.jpg')}}" alt="Hotel 1" class="img-fluid">
                    </div> -->

                    <div class="col-lg-12 venue-info">
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <img src="{{asset('img/inscricao/033.jpg')}}" alt="Hotel 1" class="imginc">
                            </div>

                            <div class="col-11 col-lg-6" id="insc">
                                <div class="col-11 col-lg-12">
                                    <div class="col-11 col-lg-12">
                                        <h1><a href="#">2º Nigth Bike Maranguape 2019</a></h1>
                                        <h5 class="text-uppercase "><a href="#">Passeio Ciclistico</a></h5>

                                    </div>
                                    <div class="col-11 col-lg-12">
                                        <button type="submit" class="btnilustre" data-toggle="modal"
                                            data-target="#buy-ticket-modalsobrep"
                                            data-ticket-type="premium-access">Sobre a Prova</button>
                                    </div>
                                    <div class="col-11 col-lg-12">

                                        <div class="wrapper">
                                            <div class="cell">
                                                <div id="holder">
                                                    <br>
                                                    <h7 class="text-uppercase "><b>
                                                            Faltam: Dias - Horas - Minutos - Segundos
                                                        </b></h7>
                                                    <div class="digits"></div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-11 col-lg-12">
                                        <br>
                                        <div class="text-center">
                                            @auth
                                            <button type="submit" class="btnmodal" data-toggle="modal"
                                                data-target="#evento">Inscreva-se
                                                ja!</button>
                                            @else
                                            <a href="#contact"><button type="submit" class="btnmodal">Inscreva-se
                                                    ja!</button></a>
                                            @endauth
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>


 @guest
        <section id="contact" class="section-bg wow fadeInUp">

            <div class="container">

                <div class="section-header">
                    <span class="sombra digitar" id="inc">Inscrição</span>
                    <h2>Inscrição</h2>
                </div>

                <!-- <div class="row contact-info">
                    
                    <div class="col-md-4">
                    <div class="contact-address">
                    <i cla                                                                                                                                                                                                        ss="ion-ios-location-outline"                                                                                                                                                                                                        ></i>
                           <h3>Texto</h3>
                    <address>texto, texto - ce, BR</address>
                    </div>
                    </div>
                    
                    <div class="col-md-4">
                    <div class="contact-phone">
                    <i class="ion-ios-telephone-outline"></i>
                    <h3>texto</h3>
                    <p>                                                                                                                                                                                                        <a href="tel:+155895548855">+55 (85) 98888-8888</a><                                                                                                                                                                                                        /p>
                    </div>
                    </div>
                    
                    <div class="col-md-4">
                    <div class="contact-email">
                    <i class="ion-ios-email-outline"></i>
                    <h3>texto</h3>
                    <p><a href="mailto:info@example.com">info@example.com</a></p>
                    </div>
                    </div>
                    
                    </div> -->


                <div class="form">
                    <div id="sendmessage"></div>
                    <div id="errormessage"></div>
                    <form action="" method="post" role="form" class="contactForm">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input type="text" name="Nome" class="form-control" id="nome" placeholder="Nome"
                                    data-rule="minlen:4" data-msg="Digite seu nome!" />
                                <div class="validation"></div>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" name="Telefone" class="form-control" id="telefone"
                                    placeholder="Telefone" data-rule="minlen:4" data-msg="Digite um Telefone!" />
                                <div class="validation"></div>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" name="Email" class="form-control" id="email" placeholder="Email"
                                    data-rule="minlen:4" data-msg="Digite um Email valido!" />
                                <div class="validation"></div>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="password" class="form-control" name="Senha" id="senha" placeholder="Senha"
                                    data-rule="email" data-msg="Digite uma senha!" />
                                <div class="validation"></div>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" name="cidade" id="cidade" placeholder="Cidade"
                                    data-rule="email" data-msg="Digite sua cidade!" />
                                <div class="validation"></div>
                            </div>
                        </div>
                        <div class="text-center"><button type="submit">Inscrever-se</button></div>
                    </form>
                </div>

            </div>
        </section><!-- #contact -->
@endguest
    </main>

    <!-- Modal -->
    <div class="modal fade" id="evento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>


    <!--==========================
          Footer
        ============================-->
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
                            Maranguape - CE <br>
                            <strong>Numero:</strong> +55 (85) 98910-5894<br>
                            <strong>Email:</strong> annajessicaoficial@gmail.com<br>
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

    <a href="#" class="whats" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-whatsapp"></i></a>
    <a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nova Mensagem</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Nome:</label>
                            <input type="text" placeholder="Ex: Mauricio Abreu" class="form-control" id="nomee">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Mensagem:</label>
                            <textarea class="form-control" placeholder="Digite sua mensagem aqui."
                                id="mensagem"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary cancelarWpp" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-danger btnWpp">Enviar</button>
                </div>
            </div>
        </div>
    </div>

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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

    <!-- Contact Form JavaScript File -->
    <script src="{{asset('js/contactform.js')}}"></script>

    <!-- Template Main Javascript File -->
    <script src="{{asset('js/main.js')}}"></script>
    <script src="{{asset('js/index.js')}}"></script>
    <script src="{{asset('js/efeito.js')}}"></script>


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
</body>

</html>
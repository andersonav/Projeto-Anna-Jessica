@extends('layouts.cabecalho') @section('conteudo')
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
                <li class="sem port"><a href="#speakers">Portfólio</a></li>
                <li class="sem age"><a href="#schedule">Agenda</a></li>
                <li class="sem ser"><a href="#hotels">Serviços</a></li>
                <li class="sem eve"><a href="#buy-tickets">Eventos</a></li>
                @guest
                <li class="sem inc"><a href="#contact">Inscrições</a></li>@endguest
                <li class="sem fc"><a href="#footer">Fale conosco</a></li>
                @auth
                <li class="dropdown show">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ auth()->user()->nome_usuario }}
                    </a>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item item-user" href="{{ route('perfil') }}"><i class="fa fa-user"></i>
                            Perfil</a><br> @if(auth()->user()->id_tipo_usuario == 1)
                        <a class="dropdown-item item-user" href="{{ route('adminRelatorio') }}"><i class="fa fa-file"></i> Relatórios</a><br>
                        <a class="dropdown-item item-user" href="{{ route('adminConf') }}"><i class="fa fa-gear"></i>
                            Configuração</a><br> @else
                        <a class="dropdown-item item-user" href="{{ route('userRelatorio') }}"><i class="fa fa-file"></i> Relatórios</a><br> @endif
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
        </nav>
        <!-- #nav-menu-container -->
    </div>
</header>
<!-- #header -->

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
            @php
            $count = 0;
            @endphp
            @foreach($slideshows as $slideshow)
            @if($count == 0)
            <div class="carousel-item active">
                <img class="d-block w-100" src="img/slideshow/{{$slideshow->imagem}}" alt="First slide" id="imgcarrousel">
            </div>
            @else
            <div class="carousel-item">
                <img class="d-block w-100" src="img/slideshow/{{$slideshow->imagem}}" alt="First slide" id="imgcarrousel">
            </div>
            @endif
            @php
            $count++;
            @endphp
            @endforeach
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
                        <h2>Anna Jéssica</h2>
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
                <span class="sombra digitar" id="port">Portfólio</span>
                <h2>Portfólio</h2>
            </div>

            <div class="row">
                <div class="col-lg-1 col-md-4"></div>
                <div class="col-lg-5 col-md-4" data-toggle="modal" data-target="#buy-ticket-modalportfólio1">
                    <div class="speaker">
                        <img src="{{asset('img/postifolio/corrida.jpg')}}" alt="Speaker 5" class="img-fluid">
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
                <div class="col-lg-5 col-md-4" data-toggle="modal" data-target="#buy-ticket-modalportfólio2">
                    <div class="speaker">
                        <img src="{{asset('img/postifolio/port.png')}}" alt="Speaker 6" class="img-fluid">
                        <div class="details">
                            <h3><a href="javascript:void(0);">Cerimônial Corporativo</a></h3>
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
                @php
                $count = 0;
                @endphp
                @foreach($datas as $data)
                @if($count == 0)
                <li class="nav-item">
                    <a class="nav-link active" href="#{{$data->mes}}-{{$data->dia}}-{{$data->ano}}" role="tab" data-toggle="tab">Dia {{$data->dia}}/{{$data->numeroMes}}/{{$data->ano}}</a>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link" href="#{{$data->mes}}-{{$data->dia}}-{{$data->ano}}" role="tab" data-toggle="tab">Dia {{$data->dia}}/{{$data->numeroMes}}/{{$data->ano}}</a>
                </li>
                @endif
                @php
                $count++;
                @endphp
                @endforeach
            </ul>

            <h3 class="sub-heading">Estas datas podem ser alteradas ao decorrer da semana.
            </h3>

            <div class="tab-content row justify-content-center">
                @php
                $active = 0;
                @endphp
                @if($active == 0)
                @php
                $textActive = 'active';
                @endphp
                @else
                @php
                $textActive = "";
                @endphp
                @endif
                <!-- Schdule Day 1 -->
                @foreach($agendas as $agenda)
                <div role="tabpanel" class="col-lg-9 tab-pane fade show {{$textActive}}" id="{{$agenda->mes}}-{{$agenda->dia}}-{{$agenda->ano}}">
                    @php
                    $idsEvento = explode(", ", $agenda->idEvento);
                    $nomesEvento = explode(", ", $agenda->nomeEvento);
                    $descricoesEvento = explode(", ", $agenda->descricaoEvento);
                    $imagensEvento = explode(", ", $agenda->imagemEvento);
                    $horasInicio = explode(", ", $agenda->horaInicio);
                    $horasFim = explode(", ", $agenda->horaFim);
                    $cidades = explode(", ", $agenda->cidade);
                    $cont = 0;
                    @endphp

                    @foreach($idsEvento as $idEvento)
                    <div class="row schedule-item">
                        <div class="col-md-3"><time>{{$horasInicio[$cont]}}</time><br><span>{{$cidades[$cont]}}</span></div>
                        <div class="col-md-9">
                            @if(isset($imagensEvento[$cont]))
                            <div class="speaker">
                                <img src="/img/agenda/{{$imagensEvento[$cont]}}" alt="Hubert Hirthe">
                            </div>
                            @endif
                            <h4>{{$nomesEvento[$cont]}}</h4>
                            @if($descricoesEvento[$cont] != "")
                            <p>{{$descricoesEvento[$cont]}}</p>
                            @else
                            <p>Nenhum detalhe sobre.</p>
                            @endif

                        </div>
                    </div>
                    @php
                    $cont++;
                    $active++;
                    $textActive = "";
                    @endphp
                    @endforeach
                </div>
                @endforeach
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
                            @php
                            $count = 0;
                            @endphp
                            @foreach($anuncioClassificacao1 as $anuncio)
                            @if($count == 0)
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="img/anuncios/{{$anuncio->imagem}}" alt="First slide" id="imgAnu">
                            </div>
                            @else
                            <div class="carousel-item">
                                <img class="d-block w-100" src="img/anuncios/{{$anuncio->imagem}}" alt="First slide" id="imgAnu">
                            </div>
                            @endif
                            @php
                            $count++;
                            @endphp
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">

                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            @php
                            $count = 0;
                            @endphp
                            @foreach($anuncioClassificacao2 as $anuncio)
                            @if($count == 0)
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="img/anuncios/{{$anuncio->imagem}}" alt="First slide" id="imgAnu">
                            </div>
                            @else
                            <div class="carousel-item">
                                <img class="d-block w-100" src="img/anuncios/{{$anuncio->imagem}}" alt="First slide" id="imgAnu">
                            </div>
                            @endif
                            @php
                            $count++;
                            @endphp
                            @endforeach
                        </div>


                    </div>



                </div>
                <div class="col-lg-4 col-md-4">

                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

                        <div class="carousel-inner">
                            @php
                            $count = 0;
                            @endphp
                            @foreach($anuncioClassificacao3 as $anuncio)
                            @if($count == 0)
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="img/anuncios/{{$anuncio->imagem}}" alt="First slide" id="imgAnu">
                            </div>
                            @else
                            <div class="carousel-item">
                                <img class="d-block w-100" src="img/anuncios/{{$anuncio->imagem}}" alt="First slide" id="imgAnu">
                            </div>
                            @endif
                            @php
                            $count++;
                            @endphp
                            @endforeach
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
                            <div class="text-center"><button type="submit" class="btnmodal" data-toggle="modal" data-target="#buy-ticket-modalspots" data-ticket-type="premium-access">Ouça
                                    Agora</button>
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
                            <div class="text-center"><button type="submit" class="btnmodal" data-toggle="modal" data-target="#buy-ticket-modalservice2" data-ticket-type="premium-access">Veja
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
                            <p>Trabalhamos com divulgação por meio das mídias sociais, com cobertura textual, áudio visual, fotográfica e imagens aéreas, que aproxima seu publico da sua empresa, além de aumentar a visibilidade da sua marca e seu alcance.</p>
                            <div class="text-center"><button type="submit" class="btnmodal" data-toggle="modal" data-target="#buy-ticket-modalservice3" data-ticket-type="premium-access">Veja
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
                @foreach ($eventoquadro as $eventos)
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-muted text-uppercase text-center">{{$eventos->modo}}</h5>
                            <h6 class="card-price text-center">{{$eventos->nome_evento}}</h6>
                            <hr>
                            <div class="hotel-img">
                                <img src="img/eventos/{{$eventos->imagem}}" alt="Hotel 1" class="img-fluid">
                            </div>
                            <br>
                            <ul class="fa-ul">
                                @php
                                $nomelink = explode(',', $eventos->nomeLinkEvento);
                                $link = explode(',', $eventos->linkEvento);
                                $contador = 0;
                                @endphp
                                @foreach ($nomelink as $item)
                                @if($item != '')
                                    
                                <li><span class="fa-li"><i class="fa fa-check"></i></span>{{$item}}: <a href="{{ $link[$contador++] }}" Target=”_blank”>click
                                        aqui</a></li>
                                @endif

                                @endforeach
                            </ul>
                            <hr>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

        </div>



    </section>

    <!-- Modal Order Form -->
    <div id="buy-ticket-modal" class="modal fade">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="ttl"><b>Login</b></h2>
                    @if(session()->get('cadastrado') == 'cadastrado')
                    <script>
                        Swal.fire({
                            position: 'center',
                            type: 'success',
                            title: 'Operação realizada, verifique seu email para confirmar seu cadastro!',
                            showConfirmButton: false,
                            timer: 5000
                        });
                    </script>
                    @endif
                    @if(session()->get('confirmado') == 'confirmado')
                    <script>
                        Swal.fire({
                            position: 'center',
                            type: 'success',
                            title: 'Email confirmado com sucesso, ja pode efetuar o seu login!',
                            showConfirmButton: false,
                            timer: 5000
                        });
                    </script>
                    @endif
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="javascript:void(0);" id="myFormLogin">
                        <div class="mensagensErros">

                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="Senha">
                        </div>
                        <div class="form-group">

                        </div>
                        <div class="text-left">
                            <a class="btn-link" data-toggle="modal" data-target="#modal-remmember-pass" data-ticket-type="premium-access" onclick="closeModalLogin();"><b>Esqueci minha senha!</b></a>

                        </div>
                        <div class="text-center">
                            <button type="submit" class="btnmodal">Entrar</button>

                        </div>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <div id="modal-remmember-pass" class="modal fade">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="ttl"><b>Preencha com seu email</b></h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="javascript:void(0);" id="myFormRemmemberPass">
                        <div class="mensagensErros">

                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" placeholder="Email">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btnmodal">Resetar senha</button>

                        </div>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div id="buy-ticket-modalservice2" class="modal fade">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <iframe width="100%" height="405" src="https://www.youtube.com/embed/iN1pWCVTwro" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                </iframe>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->


    <div id="buy-ticket-modalservice3" class="modal fade">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <iframe width="100%" height="405" src="https://www.youtube.com/embed/EnZH1410qwQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                </iframe>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->



    <div id="buy-ticket-modalportfólio1" class="modal fade">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">

                    <h2 class="ttl"><b>Portfólio</b></h2>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <h6>
                                <b>Leve Anna Jéssica para apresentar seu evento esportivo com uma locução eficaz,
                                    interativa, dinâmica e inovadora na voz feminina.</b>
                            </h6>

                            <i class="fa fa-check" aria-hidden="true"></i><b> 1º Circuito Fitec de Corridas de Rua (4
                                Etapas) - Maranguape-CE 2017</b>
                            <hr>
                            <i class="fa fa-check" aria-hidden="true"></i><b> Cross Urbano Caixa (Etapa Fortaleza) -
                                Fortaleza-CE 2017</b>
                            <hr>
                            <i class="fa fa-check" aria-hidden="true"></i><b> Corrida Vida Longa - Aterro de Iracema -
                                Fortaleza-CE 2018</b>
                            <hr>
                            <i class="fa fa-check" aria-hidden="true"></i><b> Centenário do Fortaleza - Centro de
                                Formação Olímpica (CFO) - Fortaleza-CE 2018</b>
                            <hr>
                            <i class="fa fa-check" aria-hidden="true"></i><b> Corrida 50 anos da Receira Federal -
                                Parque Cocó - Fortaleza-CE 2018</b>
                            <hr>
                            <i class="fa fa-check" aria-hidden="true"></i><b> Corrida BV Sports - Praça Antônio Queiroz
                                - Boa Viagem-CE 2018</b>
                            <hr>
                            <i class="fa fa-check" aria-hidden="true"></i><b> 1º Circuito Fitec de Corridas de Rua (4
                                Etapas) - Maranguape-CE 2018</b>
                            <hr>
                            <i class="fa fa-check" aria-hidden="true"></i><b> Corrida New Balance - Estacionamento do
                                Shopping RioMar Fortaleza - Fortaleza-CE 2018</b>
                            <hr>
                            <i class="fa fa-check" aria-hidden="true"></i><b> Circuitos das Estações (Etapa Verão) -
                                Aterro de Iracema - Fortaleza-CE 2018</b>
                            <hr>
                            <i class="fa fa-check" aria-hidden="true"></i><b> 7º Corrida de São Sebastião - Praça
                                Capistrano de Abreu - Maranguape-CE 2019</b>
                            <hr>
                            <i class="fa fa-check" aria-hidden="true"></i><b> Treino Solidário Herben Alves - Praça das
                                Artes MRV Maraponga - Fortaleza-CE 2019</b>
                            <hr>
                            <i class="fa fa-check" aria-hidden="true"></i><b> Circuitos das Estações (Etapa Outono) -
                                Estacionamento do Shopping RioMar Fortaleza - Fortaleza-CE 2019</b>
                            <hr>
                            <i class="fa fa-check" aria-hidden="true"></i><b> 3º Corrida do Humor de Maranguape - Casa
                                do Chico Anysio - Maranguape-CE 2019</b>

                        </div>

                        <div class="col-lg-6">
                            <iframe width="100%" height="215" src="https://www.youtube.com/embed/bH-4R4Jbv00" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen id="portcont">
                            </iframe>
                        </div>


                    </div>



                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->


    <div id="buy-ticket-modalportfólio2" class="modal fade">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="ttl"><b>Portfólio</b></h2>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <h6>
                                <b>Mediação de eventos corporativos, entrevistas e talk shows.</b>
                            </h6>

                            <i class="fa fa-check" aria-hidden="true"></i><b> Desfile Miss Senador Pompeu - Ginásio
                                Poliesportivo - Senador Pompeu-CE 2015</b>
                            <hr>
                            <i class="fa fa-check" aria-hidden="true"></i><b> Desfile da Moda Maranguape - Praça
                                CEL.Joaquim Sombra - Maranguape-CE 2017</b>
                            <hr>
                            <i class="fa fa-check" aria-hidden="true"></i><b> 9ª Festival Nacional de Humor de
                                Maranguape - Praça Capistrano de Abreu - Maranguape-CE 2017</b>
                            <hr>
                            <i class="fa fa-check" aria-hidden="true"></i><b> C Cerimonial Dia das Mães Colégio Espaço
                                Livre - Maranguape Shopping Mall - Maranguape-CE 2018</b>
                            <hr>
                            <i class="fa fa-check" aria-hidden="true"></i><b> Inauguração - Novas Instalações da CDL de
                                Boa Viagem - Rua 21 de Novembro - Boa Viagem-CE 2018</b>

                        </div>
                        <div class="col-lg-6">
                            <img src="{{asset('img/postifolio/cerimonia.jpeg')}}" alt="Hotel 1" class="img-fluid" id="portcont">
                        </div>

                    </div>

                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->


    <div id="buy-ticket-modalspots" class="modal fade">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="ttl"><b>Spots</b></h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <audio src="{{asset('audios/1.mp3')}}" controls loop style="width: 100%; margin-bottom:15px"></audio>
                            <audio src="{{asset('audios/2.mp3')}}" controls loop style="width: 100%; margin-bottom:15px"></audio>
                            <audio src="{{asset('audios/3.mp3')}}" controls loop style="width: 100%; margin-bottom:15px"></audio>
                        </div>

                    </div>



                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    @foreach ($selectKits as $item)
    <div id="buy-ticket-modalsobrep" class="modal fade">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="ttl"><b>Sobre a Prova</b></h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="col-lg-12">
                                <button type="submit" class="btnilustre2">
                                    <b><i class="fa fa-arrows-h" aria-hidden="true"></i> Distâncias</b>
                                </button>
                                <h7><b>{{ $item->distancia }}K</b></h7>
                            </div>
                            <hr>
                        </div>

                        <div class="col-lg-12">
                            <div class="col-lg-12">
                                <button type="submit" class="btnilustre2">
                                    <b><i class="fa fa-location-arrow" aria-hidden="true"></i> Local</b>
                                </button>
                                <h7><b>{{ $item->endereco }}</b></h7>

                            </div>
                            <hr>
                        </div>

                        <div class="col-lg-12">
                            <div class="col-lg-12">
                                <button type="submit" class="btnilustre2">
                                    <b><i class="fa fa-hourglass-half" aria-hidden="true"></i> Largada</b>
                                </button>
                                <h7><b>{{ $item->hora_inicio }}</b></h7>

                            </div>
                            <hr>
                        </div>

                        <div class="col-lg-12">
                            <div class="col-lg-12">
                                <button type="submit" class="btnilustre2">
                                    <b><i class="fa fa-check-square-o" aria-hidden="true"></i> Retirada do Kit</b>
                                </button>
                                <h7><b>{{ $item->informacao_adicional }}</b></h7>

                            </div>
                            <hr>
                        </div>

                        <div class="col-lg-12">
                            <div class="col-lg-12">
                                <button type="submit" class="btnilustre2">
                                    <b><i class="fa fa-stop-circle" aria-hidden="true"></i> Encerramento de Inscrição</b>
                                </button>
                                <h7><b>{{ $item->dia }}/{{ $item->numeroMes }}/{{ $item->numeroAno }}</b></h7>

                            </div>
                        </div>
                    </div>



                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    @endforeach

    <!--==========================
    Contact Section
    ============================-->



    <section id="venue" class="wow fadeInUp">

        <div class="container-fluid">


            <div class="row no-gutters">
                <!-- <div class="col-lg-4 venue-map">
                <img src="{{asset('img/inscricao/033.jpg')}}" alt="Hotel 1" class="img-fluid">
            </div> -->
                @foreach ($selectKits as $item)
                <div class="col-lg-12 venue-info horarioEventoDestaque" id="{{ $item->dia }}" role="{{ $item->numeroMes }}" alt="{{ $item->numeroAno }}">
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <img src="img/eventos/{{ $item->imagem }}" alt="Hotel 1" class="imginc">
                        </div>

                        <div class="col-11 col-lg-6" id="insc">
                            <div class="col-11 col-lg-12">
                                <div class="col-11 col-lg-12">
                                    <h1><a href="#">{{ $item->nome_evento }}</a></h1>
                                    <h5 class="text-uppercase "><a href="#">{{ $item->percurso }}</a></h5>

                                </div>
                                <div class="col-11 col-lg-12">
                                    <button type="submit" class="btnilustre" data-toggle="modal" data-target="#buy-ticket-modalsobrep" data-ticket-type="premium-access">Sobre a
                                        Prova</button>
                                </div>
                                <div class="col-11 col-lg-12" style="max-width: 95.666667% !important;">
                                    <center>
                                        <div class="wrapper">
                                            <div class="cell">
                                                <div id="holder">
                                                    <br>
                                                    <span class="text-uppercase "><b>
                                                            Faltam: Dias - Horas - Minutos - Segundos
                                                        </b></span>
                                                    <div class="digits"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </center>
                                </div>

                                <div class="col-11 col-lg-12">
                                    <br>
                                    <div class="text-center">
                                        @auth
                                        <a class="aInscBtn" href="{{route('compra-kit')}}"><button type="button" class="btnmodal inscBtn">Inscreva-se
                                                ja!</button></a> @else
                                        <ul class="nav-menu"><a href="#contact"><button type="submit" class="btnmodal">Inscreva-se
                                                    ja!</button></a></ul>
                                        @endauth
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
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
                <form action="{{ route('register') }}" method="POST">
                    {{ csrf_field() }} @if ($errors->any())
                    <script>
                        $(document).ready(function() {
                            var valor = 0;
                            let isMobile = (function(a) {
                                if (/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a) || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0, 4))) {
                                    return true
                                } else {
                                    return false
                                }
                            })(navigator.userAgent || navigator.vendor || window.opera) 
                            if (isMobile) {
                                valor = 8400
                            } else {
                                valor = 4400
                            }
                            $('html,body').animate({
                                scrollTop: valor
                            }, 'slow');
                        });
                    </script>


                    @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                    @endforeach @endif {{ csrf_field() }}
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input type="text" name="nome" class="form-control" id="nome" placeholder="Nome" value="{{ old('nome') }}" />
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" name="email" class="form-control" id="email" placeholder="Email" value="{{ old('email') }}" />
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" name="telefone" class="form-control" id="telefone" placeholder="Telefone" value="{{ old('telefone') }}" />
                        </div>

                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" name="cidade" id="cidade" placeholder="Cidade" value="{{ old('cidade') }}" />
                        </div>
                        <div class="form-group col-md-6">
                            <input type="password" class="form-control" name="password" id="password" placeholder="Senha" />
                        </div>
                        <div class="form-group col-md-6">
                            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Confirmar senha" />
                        </div>
                    </div>
                    <div class="text-center"><button type="submit">Inscrever-se</button></div>
                </form>
            </div>

        </div>
    </section>
    <!-- #contact -->
    @endguest
</main>

<!-- Modal -->

<a href="#" class="whats" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-whatsapp"></i></a>
<a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="ttl"><b>WhatsApp</b></h2>
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
                        <textarea class="form-control" placeholder="Digite sua mensagem aqui." id="mensagem"></textarea>
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
<script src="{{asset('js/efeito.js')}}"></script>
@endsection
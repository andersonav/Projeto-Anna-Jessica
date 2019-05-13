@extends('layouts.cabecalho')
@section('conteudo')

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
                <li class="sem menu-active agenda" id="agenda"><a href="javascript:void(0);">Agenda</a></li>
                <li class="sem anuncio" id="anuncio"><a href="javascript:void(0);">Anúncio</a></li>
                <li class="sem apoio" id="apoio"><a href="javascript:void(0);">Apoio</a></li>
                <li class="sem evento" id="evento"><a href="javascript:void(0);">Evento</a></li>
                <li class="sem parceiro" id="parceiro"><a href="javascript:void(0);">Parceiro</a></li>
                <li class="sem patrocinio" id="patrocinio"><a href="javascript:void(0);">Patrocínio</a></li>
                <li class="sem realizacao" id="realizacao"><a href="javascript:void(0);">Realização</a></li>
                @auth
                <li class="dropdown show">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        {{ auth()->user()->nome_usuario }}
                    </a>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item item-user" href="{{ route('home') }}"><i class="fa fa-home"></i>
                            Inicio</a><br>
                        <a class="dropdown-item item-user" href="{{ url()->previous() }}"><i
                                class="fa fa-arrow-left"></i> Voltar</a><br>
                        @if(auth()->user()->id_tipo_usuario == 1)
                        <a class="dropdown-item item-user" href="{{ route('adminConf') }}"><i
                                class="fa fa-gear"></i> Configuração</a><br>

                        @else
                        <a class="dropdown-item item-user" href="{{ route('userRelatorio') }}"><i
                                class="fa fa-file"></i> Relatórios</a><br>
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
 

    <!--    <div class="dl">
            <div class="dl__container">
                <div class="dl__corner--top"></div>
                <div class="dl__corner--bottom"></div>
            </div>
            <div class="dl__square"></div>
        </div>-->
    <div class="" id="containerLoad">

    </div>
</main>

<script src="{{asset('js/adminConf.js')}}"></script>
@endsection
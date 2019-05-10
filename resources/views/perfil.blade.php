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
                <li class="sem menu-active ini"><a href="#intro">Perfil</a></li>
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

    <!--==========================
          Speaker Details Section
        ============================-->
    <section id="contact" class="section-bg wow fadeInUp">

        <div class="container">

            <div class="section-header">
                <h2>Perfil</h2>
            </div>
            <div class="form">
                <div id="sendmessage"></div>
                <div id="errormessage"></div>
                <form action="" method="post" role="form" id="form" class="contactForm">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input type="text" name="nome" class="form-control" id="nome" placeholder="Nome"
                                   data-rule="minlen:4" data-msg="Digite seu nome!"
                                   value="{{ auth()->user()->nome_usuario }}" />
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" name="telefone" class="form-control" id="telefone"
                                   placeholder="Telefone" data-rule="minlen:10" data-msg="Digite um Telefone!"
                                   value="{{ auth()->user()->telefone_usuario }}" />
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" name="email" class="form-control" id="email" placeholder="Email"
                                   data-rule="minlen:4" data-msg="Digite um Email valido!"
                                   value="{{ auth()->user()->email }}" />
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" name="cidade" id="cidade" placeholder="Cidade"
                                   data-rule="email" data-msg="Digite sua cidade!"
                                   value="{{ auth()->user()->cidade_usuario }}" />
                        </div>
                        <div class="form-group col-md-6">
                            <input type="password" class="form-control" name="password" id="password"
                                   placeholder="Senha" />
                        </div>
                        <div class="form-group col-md-6">
                            <input type="password" class="form-control" name="password_confirmation"
                                   id="password_confirmation" placeholder="Confirmar senha" />
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" onclick="editUser();"><i class="fa fa-circle-o-notch"
                                                                       aria-hidden="true"></i>
                            Salvar</button>
                        <button type="submit" onclick="reset();"><i class="fa fa-refresh" aria-hidden="true"></i> Limpar</button>
                    </div>
                </form>
            </div>

        </div>
    </section><!-- #contact -->


</main>
<a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>
@endsection
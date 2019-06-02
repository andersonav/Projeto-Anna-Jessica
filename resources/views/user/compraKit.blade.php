@extends('layouts.cabecalho') @section('conteudo')
<!--==========================
          Header
        ============================-->
<header id="header" class="navmenu">
    <div class="container">

        <div id="logo" class="pull-left">
            <!-- Uncomment below if you prefer to use a text logo -->
            <!-- <h1><a href="#main">C<span>o</span>nf</a></h1>-->
            <a href="#intro" class="scrollto"><img src="{{asset('img/logoteste.png')}}" alt="" title=""></a>
        </div>

        <nav id="nav-menu-container">
            <ul class="nav-menu">
                @auth
                <li class="dropdown show">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ auth()->user()->nome_usuario }}
                    </a>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item item-user" href="{{ url()->previous() }}"><i class="fa fa-arrow-left"></i> Voltar</a><br>


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



<main id="main" class="main-page">
    <section id="venue" class="wow fadeInUp padv">

        <div class="container-fluid">


            <div class="row no-gutters">
                <!-- <div class="col-lg-4 venue-map">
                                <img src="{{asset('img/inscricao/033.jpg')}}" alt="Hotel 1" class="img-fluid">
                            </div> -->

                <div class="col-lg-12 venue-info">
                    <div class="row justify-content-center">
                        <div class="col-lg-3">
                            <img src="{{asset('img/inscricao/033.jpg')}}" alt="Hotel 1" class="imgcomp">
                        </div>

                        <div class="col-lg-5" id="insc">
                            <div class="col-lg-12">
                                <div class="col-lg-12">
                                    <h2><a href="#">2º Nigth Bike Maranguape 2019</a></h2>
                                    <h7 class="text-uppercase "><a href="#">Passeio Ciclístico</a></h7>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="col-lg-12 venue-info">
                    <div class="row justify-content-center">

                        <div class="col-lg-9">
                            <h4><i class="fa fa-circle" aria-hidden="true"></i> <b>Veja as opções de kits para este evento!</b></h4>
                            <div class="col-lg-12" id="kit">
                                <div class="row justify-content-center">
                                    <div class="col-lg-4">
                                        <img src="{{asset('img/inscricao/033.jpg')}}" alt="Hotel 1" class="imgcomp">
                                    </div>

                                    <div class="col-lg-5" id="insc">
                                        <div class="col-lg-12">
                                            <div class="col-lg-12">
                                                <h5><b>Kit Estações</b></h5>
                                                <h7>Camiseta ProRun Seamless HiveTech, Sacola Térmica, Glass Mug e Medalha (pós-evento)</7>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3" style="padding:50px;">
                                        <h5><b>R$ 80,90</b></h5>
                                        <button class="btnmodal btnQueroEste" id="1">Quero Este</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <h4><i class="fa fa-check-square" aria-hidden="true"></i> <b>Dados da Compra</b></h4>
                            <div class="col-lg-12 dadosC">
                                <h2>Carrinho Vazio <i class="fa fa-times-circle" aria-hidden="true"></i></h2>


                                <!-- <table id="tabela">
                                    <thead>
                                        <tr>
                                            <th style="width: 70%;">Item</th>
                                            <th>Valor</th>
                                        </tr>
                                    </thead>
                                    <tbody id="corpoCarrinho">
                                        <tr>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <br>
                                <div class="col-md-12">
                                    <a href="javascript:void(0)">
                                        <div class="text-center">
                                        <button class="btnmodal">Continuar</button>
                                        </div>
                                    </a>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<style>

</style>
<script src="{{asset('js/compraKit.js')}}"></script>
<script src="{{asset('js/operacao.js')}}"></script>
<!--==========================
          Speaker Details Section
        ============================-->



















</main>
<a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a> @endsection
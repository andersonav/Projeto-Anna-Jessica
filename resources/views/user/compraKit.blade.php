@extends('layouts.cabecalho') @section('conteudo')
<!--==========================
          Header
        ============================-->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
<style>
    .bootstrap-select:not([class*=col-]):not([class*=form-control]):not(.input-group-btn) {
        width: 100px;
        margin-top: 10px;
    }
</style>
@if(session()->get('error') == 'error')
<script>
    Swal.fire({
        position: 'center',
        type: 'error',
        title: 'Operação inválida, entre em contato conosco!',
        showConfirmButton: false,
        timer: 3000
    });
</script>
@endif
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

                        @foreach ($selectKits as $item )
                        <div class="col-lg-3">
                            <img src="img/eventos/{{ $item->imagem }}" alt="Hotel 1" class="imgcomp">
                        </div>
                        <div class="col-lg-5" id="insc">
                            <div class="col-lg-12">
                                <div class="col-lg-12">
                                    <h2><a href="#">{{ $item->nome_evento }}</a></h2>
                                    <h7 class="text-uppercase "><a href="#">{{ $item->percurso }}</a></h7>

                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div class="col-lg-4">
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="col-lg-12 venue-info">
                    <div class="row justify-content-center">

                        <div class="col-lg-9">
                            <h4><i class="fa fa-circle" aria-hidden="true"></i> <b>Veja as opções de kits para este evento!</b></h4>
                            @php
                                $idKit = explode(',', $selectKits[0]->idKit);
                                $nomeKit = explode(',', $selectKits[0]->nomeKit);
                                $imagemKit = explode(',', $selectKits[0]->imagemKit);
                                $valorKit = explode('/', $selectKits[0]->valorKit);
                                $tamanho = explode(',', $selectKits[0]->tamanho);
                                $descKit = explode(',', $selectKits[0]->descKit);
                            @endphp
                            @for ($i = 0; $i < count($idKit); $i++)
                            @php
                                $hashKit = bcrypt(md5($tamanho[$i].$idKit[$i].$nomeKit[$i].$valorKit[$i]));
                            @endphp
                            <div class="col-lg-12" id="kit">
                                <div class="row justify-content-center">
                                    <div class="col-lg-4 kitOk" id="{{ $idKit[$i] }}" role="img/eventos/kit/{{ $imagemKit[$i] }}">
                                        <img src="img/eventos/kit/{{ $imagemKit[$i] }}" alt="Hotel 1" class="imgcomp" data-toggle="modal" data-target="#buy-ticket-modalkit" data-ticket-type="premium-access">
                                    </div>
                                    <div class="col-lg-5" id="insc">
                                        <div class="col-lg-12">
                                            <div class="col-lg-12">
                                                <h5 id="titulo"><b class="titulo{{ $idKit[$i] }}">{{ $nomeKit[$i] }}</b></h5>
                                                <h7>{{ $descKit[$i] }}</h7>
                                            </div>
                                            <div class="col-lg-4">
                                                <select class="selectpicker show-tick selectTam{{ $idKit[$i] }}" data-live-search="true" title="Tamanho">
                                                    @php
                                                        $tam = DB::table('tamanho')->where('hash_tamanho', $tamanho[$i])->get();
                                                    @endphp
                                                    @foreach ($tam as $item)
                                                        <option>{{ $item->tamanho }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3" style="padding:50px;">
                                        <h5><b class="valor{{ $idKit[$i] }}">R$ {{ $valorKit[$i] }}</b></h5>
                                        <button class="btnmodal btnQueroEste" id="{{ $idKit[$i] }}" role="
                                        {{ $hashKit }}">Quero Este</button>
                                    </div>
                                </div>
                            </div>
                            @endfor
                        </div>
                        <div class="col-lg-3">
                            <h4><i class="fa fa-check-square" aria-hidden="true"></i> <b>Dados da Compra</b></h4>
                            <div class="col-lg-12 dadosC">
                                <h2 class="carrinho">Carrinho Vazio <i class="fa fa-times-circle" aria-hidden="true"></i></h2>

                                <div class="tabelaCom">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<div id="buy-ticket-modalkit" class="modal fade">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="ttl"><b></b></h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img src="#" alt="Hotel 1" class="imgcomp" id="imagemkit">
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<script>
    $(".kitOk").click(function() {
        var valorId = $(this).attr("id");
        var imagem = $(this).attr("role");
        var headerModal = $(".titulo"+ valorId ).text();
        console.log(valorId, imagem, headerModal);
        $("#buy-ticket-modalkit .modal-header h2 b").html(headerModal);
        $("#imagemkit").attr("src", imagem);
    });
    $(function () {
            $('select').selectpicker();
    });
</script>

<script src="{{asset('js/compraKit.js')}}"></script>
<script src="{{asset('js/operacao.js')}}"></script>
<!--==========================
          Speaker Details Section
        ============================-->



















</main>
<a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a> @endsection
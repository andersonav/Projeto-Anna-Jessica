<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
<section id="contact" class="section-bg wow fadeInUp">

    <div class="container">

        <div class="section-header">
            <h2>Anúncio</h2>
        </div>

        <div class="form">
            <div class="col-md-12 scroll">
                <div class="card-deck">
                    @php
                    $count = 1;
                    @endphp
                    @forelse($anuncios as $anuncio)
                    <div class="form-group col-md-3">
                        <div class="card" style="width: 100% !important;">
                            <img class="card-img-top" src="/img/anuncios/{{$anuncio->imagem}}" alt="Imagem de capa do card">
                            <div class="card-body">
                                <h5 class="card-title">Imagem {{$count}}</h5>
                                <p class="card-text">Classificação: {{$anuncio->id_classificacao_anuncio}}ª</p>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted" style="float: right;"><a class="" data-toggle="modal" data-target="#newAnuncio" onclick="editarAnuncio({{$anuncio->id_anuncio}}, '{{$anuncio->imagem}}', '{{$anuncio->id_classificacao_anuncio}}');"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;&nbsp;<a class="" onclick="abrirSweetAnuncio({{$anuncio->id_anuncio}});"><i class="fa fa-trash"></i></a></small>
                            </div>
                        </div>
                    </div>
                    @php
                    $count++;
                    @endphp
                    @empty


                    @endforelse
                </div>
<!--                <table id="tabela" class="table table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Imagem</th>
                            <th>Classificação</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($anuncios as $anuncio)
                        <tr>
                            <td><img src="/img/anuncios/{{$anuncio->imagem}}" width="100px"/></td>
                            <td>{{$anuncio->desc_classificacao_anuncio}}</td>
                            <td><a class="" data-toggle="modal" data-target="#newAnuncio" onclick="editarAnuncio({{$anuncio->id_anuncio}}, '{{$anuncio->imagem}}', '{{$anuncio->id_classificacao_anuncio}}');"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;&nbsp;<a class="" onclick="abrirSweetAnuncio({{$anuncio->id_anuncio}});"><i class="fa fa-trash"></i></a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>-->
            </div>
            <div class="text-center"  style="margin-top: 20px;">
                <button type="submit" data-toggle="modal" data-target="#newAnuncio" onclick="adicionarAnuncio();"><i class="fa fa-plus-circle" aria-hidden="true"></i> &nbsp; Novo Anúncio</button>
            </div>
        </div>

    </div>
    <div class="modal fade" id="newAnuncio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="ttl"><b>Novo Anúncio</b></h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="javascript:void(0);" method="post" role="form" id="formAdmin" class="contactForm">
                    <input type="hidden" name="action" id="addAnuncio" value="addAnuncio"/>
                    <input type="hidden" name="id_anuncio" id="" value=""/>
                    <div class="modal-body">
                        <div class="errors">

                        </div>
                        <div class="form-row">
                            <div class="input-group col-md-12" style="display:none; margin: 0 auto; text-align: center; margin-bottom: 20px;" id="imageAnuncioEdit">
                                <img src="" width="100px" class="imageAnuncio"/>
                            </div>
                            <div class="form-group input-group col-md-12">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupFileAddon01">Imagem: </span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="inputGroupFile01" name="file"
                                           aria-describedby="inputGroupFileAddon01">
                                    <label class="custom-file-label" for="inputGroupFile01">Seu arquivo</label>
                                </div>
                            </div>
                            <div class="form-group input-group col-md-12">
                                <select name="classificacao" class="selectpicker show-tick" data-live-search="true"
                                        title="Classificação:" id="classificacao">
                                    @forelse ($classificacoes as $classificacao)
                                    <option value="{{ $classificacao->id_classificacao_anuncio }}">{{ $classificacao->desc_classificacao_anuncio }}</option>
                                    @empty
                                    <option>Vazio</option>
                                    @endforelse
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btnmodal" id="btnAction">Adicionar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section><!-- #contact -->
<script>

    $(function () {
    $('select').selectpicker();
    });</script>

<script src="{{asset('js/anuncio.js')}}"></script>
<script src="{{asset('js/operacao.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/i18n/defaults-pt_BR.min.js"></script>
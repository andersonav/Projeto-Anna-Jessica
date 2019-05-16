<section id="contact" class="section-bg wow fadeInUp">

    <div class="container">

        <div class="section-header">
            <h2>Anúncio</h2>
        </div>

        <div class="form">
            <table id="tabela" class="table table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Imagem</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($anuncios as $anuncio)
                    <tr>
                        <td><img src="/img/anuncios/{{$anuncio->imagem}}" width="100px"/></td>
                        <td><a class="" data-toggle="modal" data-target="#newAnuncio" onclick="editarAnuncio({{$anuncio->id_anuncio}}, '{{$anuncio->imagem}}');"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;&nbsp;<a class="" onclick="abrirSweetAnuncio({{$anuncio->id_anuncio}});"><i class="fa fa-trash"></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="text-center">
                <button type="submit" data-toggle="modal" data-target="#newAnuncio" onclick="adicionarAnuncio();"><i class="fa fa-plus-circle" aria-hidden="true"></i> &nbsp; Novo Anúncio</button>
            </div>
        </div>

    </div>
    <div class="modal fade" id="newAnuncio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="titleModal">Novo Anúncio</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="javascript:void(0);" method="post" role="form" id="formAdmin" class="contactForm">
                    <input type="hidden" name="action" id="addAnuncio" value="addAnuncio"/>
                    <input type="hidden" name="id_anuncio" id="" value=""/>
                    <div class="modal-body">
                        <div class="input-group col-md-12" style="display:none; margin: 0 auto; text-align: center; margin-bottom: 20px;" id="imageAnuncioEdit">
                            <img src="" width="100px" class="imageAnuncio"/>
                        </div>
                        <div class="input-group col-md-12">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupFileAddon01">Imagem: </span>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="inputGroupFile01" name="file"
                                       aria-describedby="inputGroupFileAddon01">
                                <label class="custom-file-label" for="inputGroupFile01">Seu arquivo</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary fechar" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary" id="btnAction">Adicionar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section><!-- #contact -->

<script src="{{asset('js/anuncio.js')}}"></script>
<script src="{{asset('js/operacao.js')}}"></script>
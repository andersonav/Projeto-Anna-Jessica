<section id="contact" class="section-bg wow fadeInUp">

    <div class="container">

        <div class="section-header">
            <h2>Parceiro</h2>
        </div>

        <div class="form">
            <div class="col-md-12 scroll">
                <div class="card-deck">
                    @php
                    $count = 1;
                    @endphp
                    @forelse($parceiros as $parceiro)
                    <div class="form-group col-lg-3" id="colanuncio">
                        <div class="card" style="width: 100% !important;">
                            <img class="card-img-top" id="cardAnuncio" src="/img/parceiros/{{$parceiro->imagem_parceiro}}" alt="Imagem de capa do card">
                            <div class="card-body">
                                <h5 class="card-title">Imagem {{$count}}</h5>
                                <p class="card-text">{{$parceiro->descricao_parceiro}}</p>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted" style="float: right;"><a class="" data-toggle="modal" data-target="#newParceiro"
                                    onclick="editarParceiro({{$parceiro->id_parceiro}}, '{{$parceiro->descricao_parceiro}}', '{{$parceiro->imagem_parceiro}}');"><i
                                        class="fa fa-edit"></i></a>&nbsp;&nbsp;&nbsp;<a class=""
                                    onclick="abrirSweetParceiro({{$parceiro->id_parceiro}});"><i
                                        class="fa fa-trash"></i></a></small>
                            </div>
                        </div>
                    </div>
                    @php
                    $count++;
                    @endphp
                    @empty


                    @endforelse
                </div>

            </div>
            <div class="text-center">
                <button type="submit" data-toggle="modal" data-target="#newParceiro" onclick="adicionarParceiro();"><i
                        class="fa fa-plus-circle" aria-hidden="true"></i> &nbsp; Novo Parceiro</button>
            </div>
        </div>

    </div>
    <div class="modal fade" id="newParceiro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="ttl" id="titleModal">Novo Anúncio</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="javascript:void(0);" method="post" role="form" id="formAdmin" class="contactForm">
                    <input type="hidden" name="action" id="addParceiro" value="addParceiro" />
                    <input type="hidden" name="id_parceiro" id="" value="" />
                    <div class="modal-body">
                        <div class="errors">

                        </div>
                        <div class="input-group col-md-12"
                            style="display:none; margin: 0 auto; text-align: center; margin-bottom: 20px;"
                            id="imageParceiroEdit">
                            <img src="" width="100px" class="imageParceiro" />
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <input type="text" name="nome" class="form-control" id="nome" placeholder="Nome" />
                            </div>
                            <div class="input-group col-md-12">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupFileAddon02">Imagem: </span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="inputGroupFile02" name="file"
                                        aria-describedby="inputGroupFileAddon02">
                                    <label class="custom-file-label" for="inputGroupFile02">Seu arquivo</label>
                                </div>
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
    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function () {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>
<script src="{{asset('js/parceiro.js')}}"></script>
<script src="{{asset('js/operacao.js')}}"></script>
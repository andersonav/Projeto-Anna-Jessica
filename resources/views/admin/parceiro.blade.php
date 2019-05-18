<section id="contact" class="section-bg wow fadeInUp">

    <div class="container">

        <div class="section-header">
            <h2>Parceiro</h2>
        </div>

        <div class="form">
            <table id="tabela" class="table table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Imagem</th>
                        <th>Descrição</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($parceiros as $parceiro)
                    <tr>
                        <td><img src="/img/parceiros/{{$parceiro->imagem_parceiro}}" width="100px"/></td>
                        <td>{{$parceiro->descricao_parceiro}}</td>
                        <td><a class="" data-toggle="modal" data-target="#newParceiro" onclick="editarParceiro({{$parceiro->id_parceiro}}, '{{$parceiro->descricao_parceiro}}', '{{$parceiro->imagem_parceiro}}');"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;&nbsp;<a class="" onclick="abrirSweetParceiro({{$parceiro->id_parceiro}});"><i class="fa fa-trash"></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="text-center">
                <button type="submit" data-toggle="modal" data-target="#newParceiro" onclick="adicionarParceiro();"><i class="fa fa-plus-circle" aria-hidden="true"></i> &nbsp; Novo Parceiro</button>
            </div>
        </div>

    </div>
    <div class="modal fade" id="newParceiro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="ttl" id="titleModal">Novo Anúncio</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="javascript:void(0);" method="post" role="form" id="formAdmin" class="contactForm">
                    <input type="hidden" name="action" id="addParceiro" value="addParceiro"/>
                    <input type="hidden" name="id_parceiro" id="" value=""/>
                    <div class="modal-body">
                        <div class="input-group col-md-12" style="display:none; margin: 0 auto; text-align: center; margin-bottom: 20px;" id="imageParceiroEdit">
                            <img src="" width="100px" class="imageParceiro"/>
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

<script src="{{asset('js/parceiro.js')}}"></script>
<script src="{{asset('js/operacao.js')}}"></script>

<section id="contact" class="section-bg wow fadeInUp">

    <div class="container">

        <div class="section-header">
            <h2>Realizacões</h2>
        </div>

        <div class="form">
        <div class="col-md-12 scroll">
            <table id="tabela" class="table table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($realizacoes as $realizacao)
                    <tr>
                        <td>{{$realizacao->nome_realizacao}}</td>
                        <td><a class="" data-toggle="modal" data-target="#newRealizacao" onclick="editarRealizacao({{$realizacao->id_realizacao}}, '{{$realizacao->nome_realizacao}}');"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;&nbsp;<a class="" onclick="abrirSweetRealizacao({{$realizacao->id_realizacao}});"><i class="fa fa-trash"></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
            <div class="text-center">
                <button type="submit" data-toggle="modal" data-target="#newRealizacao" onclick="adicionarRealizacao();"><i class="fa fa-plus-circle" aria-hidden="true"></i> &nbsp; Nova Realizacao</button>
            </div>
        </div>

    </div>
    <div class="modal fade" id="newRealizacao" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="ttl" id="titleModal">Novo Realizacao</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="post" role="form" id="formAdmin" class="contactForm">
                    <input type="hidden" name="action" id="addRealizacao" value="addApoio"/>
                    <input type="hidden" name="id_realizacao" id="" value=""/>
                    <div class="modal-body">
                        <div class="errors">

                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <input type="text" name="nome" class="form-control" id="nome" placeholder="Nome" />
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

<script src="{{asset('js/realizacao.js')}}"></script>
<script src="{{asset('js/operacao.js')}}"></script>

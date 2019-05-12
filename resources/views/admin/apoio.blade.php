<section id="contact" class="section-bg wow fadeInUp">

    <div class="container">

        <div class="section-header">
            <h2>Apoios</h2>
        </div>

        <div class="form">
            <table id="tabela" class="table table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($apoios as $apoio)
                    <tr>
                        <td>{{$apoio->nome_apoio}}</td>
                        <td><a class="" onclick="editarApoio({{$apoio->id_apoio}}, '{{$apoio->nome_apoio}}');"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;&nbsp;<a class="" onclick="apagarApoio({{$apoio->id_apoio}});"><i class="fa fa-trash"></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="text-center">
                <button type="submit" data-toggle="modal" data-target="#newApoio" onclick="adicionarApoio();"><i class="fa fa-plus-circle" aria-hidden="true"></i> &nbsp; Novo Apoio</button>
            </div>
        </div>

    </div>
    <div class="modal fade" id="newApoio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Novo Apoio</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="post" role="form" id="formAddApoio" class="contactForm">
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <input type="text" name="nome" class="form-control" id="nome" placeholder="Nome" />
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button type="button" class="btn btn-primary">Adicionar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section><!-- #contact -->

<script src="{{asset('js/apoio.js')}}"></script>

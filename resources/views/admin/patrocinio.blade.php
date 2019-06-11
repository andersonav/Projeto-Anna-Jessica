<section id="contact" class="section-bg wow fadeInUp">

    <div class="container">

        <div class="section-header">
            <h2>Patrocinios</h2>
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
                    @foreach($patrocinios as $patrocinio)
                    <tr>
                        <td>{{$patrocinio->nome_patrocinio}}</td>
                        <td><a class="" data-toggle="modal" data-target="#newPatrocinio" onclick="editarPatrocinio({{$patrocinio->id_patrocinio}}, '{{$patrocinio->nome_patrocinio}}');"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;&nbsp;<a class="" onclick="abrirSweetPatrocinio({{$patrocinio->id_patrocinio}});"><i class="fa fa-trash"></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
            <div class="text-center">
                <button type="submit" data-toggle="modal" data-target="#newPatrocinio" onclick="adicionarPatrocinio();"><i class="fa fa-plus-circle" aria-hidden="true"></i> &nbsp; Novo Patrocinio</button>
            </div>
        </div>

    </div>
    <div class="modal fade" id="newPatrocinio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="ttl" id="titleModal">Novo Patrocinio</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="javascript:void(0);" method="post" role="form" id="formAdmin" class="contactForm">
                    <input type="hidden" name="action" id="addPatrocinio" value="addPatrocinio"/>
                    <input type="hidden" name="id_patrocinio" id="" value=""/>
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

<script src="{{asset('js/patrocinio.js')}}"></script>
<script src="{{asset('js/operacao.js')}}"></script>


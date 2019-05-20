<section id="contact" class="section-bg wow fadeInUp">

    <div class="container">

        <div class="section-header">
            <h2>Agenda</h2>
        </div>

        <div class="form">
            <table id="tabela" class="table table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Data</th>
                        <th>Hora Início</th>
                        <th>hora Fim</th>
                        <th>Cidade</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($agendas as $agenda)
                    <tr>
                        <td>{{$agenda->nome_evento}}</td>
                        <td>{{$agenda->data}}</td>
                        <td>{{$agenda->hora_inicio}}</td>
                        <td>{{$agenda->hora_fim}}</td>
                        <td>{{$agenda->cidade}}</td>
                        <td><a class="" data-toggle="modal" data-target="#newAgenda" onclick="editarAgenda({{$agenda->id_agenda}}, '{{$agenda->nome_evento}}', '{{$agenda->data}}', '{{$agenda->hora_inicio}}', '{{$agenda->hora_fim}}', '{{$agenda->cidade}}');"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;&nbsp;<a class="" onclick="abrirSweetAgenda({{$agenda->id_agenda}});"><i class="fa fa-trash"></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="text-center">
                <button type="submit" data-toggle="modal" data-target="#newAgenda" onclick="adicionarAgenda();"><i class="fa fa-plus-circle" aria-hidden="true"></i> &nbsp; Novo Agenda</button>
            </div>
        </div>

    </div>
    <div class="modal fade" id="newAgenda" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="ttl" id="titleModal"></h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="javascript:void(0);" method="post" role="form" id="formAdmin" class="contactForm">
                    <input type="hidden" name="action" id="addAgenda" value="addAgenda" />
                    <input type="hidden" name="id_agenda" id="" value="" />
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <input type="text" name="nome" class="form-control" id="nome" placeholder="Nome" />
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btnmodal" id="btnAction"></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section><!-- #contact -->

<script src="{{asset('js/agenda.js')}}"></script>
<script src="{{asset('js/operacao.js')}}"></script>
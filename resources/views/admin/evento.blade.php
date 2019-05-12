<section id="contact" class="section-bg wow fadeInUp">

    <div class="container">

        <div class="section-header">
            <h2>Eventos</h2>
        </div>

        <div class="form">
            <table id="tabela" class="table table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Data</th>
                        <th>Hora Início</th>
                        <th>Hora Fim</th>
                        <th>Informação Adicional</th>
                        <th>Percurso</th>
                        <th>Distância</th>
                        <th>Apoio</th>
                        <th>Patrocínio</th> 
                        <th>Realização</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($eventos as $evento)
                    <tr>
                        <td>{{$evento->nome_evento}}</td>
                        <td>{{$evento->data}}</td>
                        <td>{{$evento->hora_inicio}}</td>
                        <td>{{$evento->hora_fim}}</td>
                        <td>{{$evento->informacao_adicional}}</td>
                        <td>{{$evento->percurso}}</td> 
                        <td>{{$evento->distancia}}</td>
                        <td>{{$evento->nome_apoio}}</td>
                        <td>{{$evento->nome_patrocinio}}</td>
                        <td>{{$evento->nome_realizacao}}</td>
                        <td><a class="" onclick="editarEvento({{$evento->id_evento}}, '{{$evento->nome_evento}}');"><i class="fa fa-edit"></i></a>&nbsp;<a class="" onclick="apagarEvento({{$evento->id_evento}});"><i class="fa fa-trash"></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="text-center">
                <button type="submit" data-toggle="modal" data-target="#newEvento" onclick="adicionarEvento();"><i class="fa fa-plus-circle" aria-hidden="true"></i> &nbsp; Novo Evento</button>
            </div>
        </div>

    </div>
    <div class="modal fade" id="newEvento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Novo Evento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="post" role="form" id="formAddEvento" class="contactForm">
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

<script src="{{asset('js/evento.js')}}"></script>

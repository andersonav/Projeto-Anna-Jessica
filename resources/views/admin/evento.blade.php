<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<section id="contact" class="section-bg wow fadeInUp">

    <div class="container">

        <div class="section-header">
            <h2>Eventos</h2>
        </div>

        <div class="form">
            <table id="tabelaEvento" class="table table-bordered" style="width:100%">
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
                        <td><a class="" onclick="editarEvento({{$evento->id_evento}}, {{$evento->nome_evento}});"><i
                                    class="fa fa-edit"></i></a>&nbsp;<a class=""
                                onclick="apagarEvento({{$evento->id_evento}});"><i class="fa fa-trash"></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="text-center">
                <button type="submit" data-toggle="modal" class="newEvento" data-target="#newEvento"
                    onclick="adicionarEvento();"><i class="fa fa-plus-circle" aria-hidden="true"></i> &nbsp; Novo
                    Evento</button>
            </div>
        </div>

    </div>
    <div class="modal fade bd-example-modal-lg" id="newEvento" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Novo Evento</h5>
                    <a class="btn btn-danger link" onclick="link();" style="margin: 0% 0% 0% 60%; color: white;"
                        data-toggle="tooltip" data-placement="left" title="Nenhum link adicionado">
                        <i class="fa fa-plus"></i>
                        adicionar link
                    </a>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="post" role="form" id="formAddEvento" class="contactForm">
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <input type="text" name="nome" class="form-control" id="nome" placeholder="Nome" />
                            </div>
                            <div class="form-group col-md-4">
                                <select class="selectpicker show-tick" data-live-search="true" title="Apoios:">
                                    @forelse ($apoios as $apoio)
                                    <option>{{ $apoio->nome_apoio }}</option>
                                    @empty
                                    <option>Vazio</option>
                                    @endforelse
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <select class="selectpicker show-tick" data-live-search="true" title="Patrocionios:">
                                    @forelse ($patrocionios as $patrocionio)
                                    <option>{{ $patrocionio->nome_patrocinio }}</option>
                                    @empty
                                    <option>Vazio</option>
                                    @endforelse
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <input type="text" name="data" class="form-control" id="data" placeholder="Data" />
                            </div>
                            <div class="form-group col-md-4">
                                <input type="text" name="hora_ini" class="form-control" id="hora_ini"
                                    placeholder="Horario inicial" />
                            </div>
                            <div class="form-group col-md-4">
                                <input type="text" name="hora_fim" class="form-control" id="hora_fim"
                                    placeholder="Horario final" />
                            </div>
                            <div class="form-group col-md-4">
                                <select class="selectpicker show-tick" data-live-search="true" title="Modo:">
                                    <option>Fique por dentro!</option>
                                    <option>Em breve!</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <select class="selectpicker show-tick" data-live-search="true" title="Tipo:">
                                    <option>Quadro</option>
                                    <option class="destaqueteste">Destaque</option>
                                    <option>Armazenamento</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <select class="selectpicker show-tick" data-live-search="true" title="Realizações:">
                                    @forelse ($realizacoes as $realizacao)
                                    <option>{{ $realizacao->nome_realizacao }}</option>
                                    @empty
                                    <option>Vazio</option>
                                    @endforelse
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <input type="text" name="percurso" class="form-control" id="percurso"
                                    placeholder="Percurso" />
                            </div>
                            <div class="form-group col-md-4">
                                <input type="text" name="distancia" class="form-control" id="distancia"
                                    placeholder="Distancia" />
                            </div>
                            <div class="form-group col-md-4">
                                <input type="text" name="data_encerramento" class="form-control" id="data_encerramento"
                                    placeholder="Prazo inscrição" />
                            </div>
                            <div class="input-group col-md-8">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupFileAddon01">Imagem evento: </span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="inputGroupFile01"
                                        aria-describedby="inputGroupFileAddon01">
                                    <label class="custom-file-label" for="inputGroupFile01">Selecione a imagem</label>
                                </div>
                            </div>
                            <div class="form-group col-md-4 append">
                                <input type="text" name="endereco" class="form-control" id="endereco"
                                    placeholder="Endereço" />
                            </div>
                            <div class="form-group col-md-12 appendKit">
                                <label for="comment">Informações adicionais</label>
                                <textarea class="form-control" name="info_adc" rows="5" id="comment"
                                    placeholder="Digite aqui as informações adicionais"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-toggle="tooltip" onclick="adicionarKit();" data-placement="right" title="Adicionar kit"
                            class="btn btn-danger adcKit"><i class="fa fa-plus"></i></button>
                        <button type="button" style="float:right" class="btn btn-danger">Adicionar</button>
                        <button type="button" style="float:right" class="btn btn-secondary"
                            data-dismiss="modal">Fechar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section><!-- #contact -->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function () {
        $('#tabelaEvento').DataTable({
            "processing": true,
            "responsive": true,
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese-Brasil.json"
            }
        });
    });
    $(function () {
        $('select').selectpicker();
    });

    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function () {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>
<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/i18n/defaults-pt_BR.min.js"></script>
<script src="{{asset('js/evento.js')}}"></script>
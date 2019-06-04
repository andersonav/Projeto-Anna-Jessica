<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<section id="contact" class="section-bg wow fadeInUp">

    <div class="container">

        <div class="section-header">
            <h2>Eventos</h2>
        </div>

        <div class="form">
            <div class="col-md-12 scroll">
                <table id="tabelaEvento" class="table table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Data</th>
                            <th>Hora Início</th>
                            <th>Hora Fim</th>
                            <th>Informação Adicional</th>
                            <th>Distância</th>
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
                            <td>{{$evento->distancia}}</td>
                            <td><a class="" onclick="editarEvento({{$evento->id_evento}});"><i
                                        class="fa fa-edit"></i></a>&nbsp;<a class=""
                                    onclick="apagarEvento({{$evento->id_evento}});"><i class="fa fa-trash"></i></a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="text-center">
                <button type="submit" data-toggle="modal" style="margin: 1% 0% 0% 0%;" onclick="adicionarEvento();"
                    class="newEvento" data-target="#newEvento"><i class="fa fa-plus-circle" aria-hidden="true"></i>
                    &nbsp; Novo
                    Evento</button>
            </div>
        </div>

    </div>
    <div class="modal fade bd-example-modal-lg" id="newEvento" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="ttl"><b>Novo Evento</b></h2>
                    <a class="btn btn-danger link" onclick="link();" style="margin: 0% 0% 0% 50%; color: white;"
                        data-toggle="tooltip" data-placement="left" title="Nenhum link adicionado">
                        <i class="fa fa-plus"></i>
                        adicionar link
                    </a>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="javascript:void(0);" method="post" role="form" id="formAdmin" class="contactForm">
                    <input type="hidden" name="action" id="addEvento" value="addEvento" />
                    <input type="hidden" name="id_evento" id="" value="" />
                    <div class="modal-body">
                        <div class="errors">

                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <input type="text" name="nome_evento" class="form-control" id="nome_evento"
                                    placeholder="Nome" />
                            </div>
                            <div class="form-group col-md-4">
                                <select name="apoio" class="selectpicker show-tick" data-live-search="true"
                                    title="Apoios:">
                                    @forelse ($apoios as $apoio)
                                    <option value="{{ $apoio->id_apoio }}">{{ $apoio->nome_apoio }}</option>
                                    @empty
                                    <option>Vazio</option>
                                    @endforelse
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <select name="patrocinio" class="selectpicker show-tick" data-live-search="true"
                                    title="Patrocionios:">
                                    @forelse ($patrocionios as $patrocionio)
                                    <option value="{{ $patrocionio->id_patrocinio }}">
                                        {{ $patrocionio->nome_patrocinio }}</option>
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
                                <select name="modo" class="selectpicker show-tick" data-live-search="true"
                                    title="Modo:">
                                    <option>Fique por dentro!</option>
                                    <option>Em breve!</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <select name="tipo" class="selectpicker show-tick" data-live-search="true"
                                    title="Tipo:">
                                    <option>Quadro</option>
                                    <option class="destaqueteste">Destaque</option>
                                    <option>Armazenamento</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <select name="realizacao" class="selectpicker show-tick" data-live-search="true"
                                    title="Realizações:">
                                    @forelse ($realizacoes as $realizacao)
                                    <option value="{{ $realizacao->id_realizacao }}">{{ $realizacao->nome_realizacao }}
                                    </option>
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
                                <div class="input-group-prepend imgEvento">
                                    <span class="input-group-text" id="inputGroupFileAddon01">Imagem evento: </span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" name="imgEvento" class="custom-file-input" id="inputGroupFile01"
                                        aria-describedby="inputGroupFileAddon01">
                                    <label class="custom-file-label inputImgEvento" for="inputGroupFile01">Selecione a imagem</label>
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
                        <button type="button" data-toggle="tooltip" onclick="adicionarKit();" data-placement="right"
                            title="Adicionar kit" class="btn btn-danger adcKit"><i class="fa fa-plus"></i></button>
                        <button type="submit" style="float:right" id="btnAction" class="btnmodal">Adicionar</button>
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
    $("#data,#data_encerramento").mask("00/00/0000");
    $("#hora_ini,#hora_fim").mask("00:00");
    </script>
<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/i18n/defaults-pt_BR.min.js"></script>
<script src="{{asset('js/evento.js')}}"></script>
<script src="{{asset('js/operacao.js')}}"></script>
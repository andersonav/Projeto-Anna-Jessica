<section id="contact" class="section-bg wow fadeInUp">

    <div class="container">

        <div class="section-header">
            <h2>Agenda</h2>
        </div>

        <div class="form">
            <div class="col-md-12 scroll">
                <div id="fullCalendar"></div>
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
                        <div class="errors">

                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12" id="imageAgendaEdit">
                                <img src="" width="100px" class="imgAgenda"/>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="nome">Nome do Evento</label>
                                <input type="text" name="nome" class="form-control" id="nome" placeholder="Nome" />
                            </div>
                            <div class="form-group col-md-6">
                                <label for="cidade">Cidade do Evento</label>
                                <input type="text" name="cidade" class="form-control" id="cidade" placeholder="Cidade" />
                            </div>
                            <div class="form-group col-md-6">
                                <label for="data_inicio">Data de Início</label>
                                <input type="date" name="data_inicio" class="form-control" id="data_inicio" placeholder="Data" />
                            </div>
                            <div class="form-group col-md-6">
                                <label for="data_fim">Data de Fim</label>
                                <input type="date" name="data_fim" class="form-control" id="data_fim" placeholder="Data" />
                            </div>
                            <div class="form-group col-md-6">
                                <label for="hora_inicio">Hora Início</label>
                                <input type="text" name="hora_inicio" class="form-control" id="hora_inicio" placeholder="Horario inicial" />
                            </div>
                            <div class="form-group col-md-6">
                                <label for="hora_fim">Hora Fim</label>
                                <input type="text" name="hora_fim" class="form-control" id="hora_fim" placeholder="Horario final" />
                            </div>
                            <div class="form-group input-group col-md-12">
                                <div class="input-group-prepend imgAgenda">
                                    <span class="input-group-text" id="inputGroupFileAddon01">Imagem evento: </span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" name="imgAgenda" class="custom-file-input" id="inputGroupFile01"
                                           aria-describedby="inputGroupFileAddon01">
                                    <label class="custom-file-label inputImgEvento" for="inputGroupFile01">Selecione a imagem</label>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="comment">Descrição do Evento</label>
                                <textarea class="form-control" name="descricao" rows="5" id="descricao"
                                          placeholder="Digite aqui a descrição do evento"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btnmodal" id="btnAction"></button>
                        <button type="button" class="btnmodal btnDelete" id="">Deletar Agenda</button>
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
    $('#hora_inicio,#hora_fim').mask('00:00');
</script>
<script src="{{asset('js/agenda.js')}}"></script>
<script src="{{asset('js/operacao.js')}}"></script>
<section id="contact" class="section-bg wow fadeInUp">

    <div class="container">

        <div class="section-header">
            <h2>Slideshow</h2>
        </div>

        <div class="form">
            <div class="col-md-12">
                <!--                @php
                                $count = 1;
                                @endphp
                                @foreach($slideshows as $slideshow)
                                <div class="card">
                                    <div class="card-body">
                
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <a href="profile-posts.html" class="avatar avatar-lg">
                                                    <img src="/img/slideshow/{{$slideshow->imagem}}" alt="..." class="avatar-img" width="120px">
                                                </a>
                                            </div>
                                            <div class="col ml-n2">
                                                <h4 class="card-title mb-1">
                                                    <a href="#!">Imagem {{$count}}</a>
                                                </h4>
                                            </div>
                                            <div class="col-auto">
                                                <a href="#!" class="btn btn-sm btn-primary d-none d-md-inline-block">
                                                    Editar
                                                </a>
                                                <a class="" data-toggle="modal" data-target="#newSlideshow" onclick="editarSlideshow({{$slideshow->id_slideshow}}, '{{$slideshow->imagem}}');"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;&nbsp;<a class="" onclick="abrirSweetSlideshow({{$slideshow->id_slideshow}});"><i class="fa fa-trash"></i></a>
                
                                            </div>
                                        </div>
                
                                    </div>
                                </div>
                                @php
                                $count++;
                                @endphp
                                @endforeach-->
                <!--                <div class="jumbotron jumbotron-fluid">
                                    <div class="container">
                                        <h1 class="display-4">Slideshows não encontrados.</h1>
                                        <p class="lead">Nenhum slideshow foi cadastrado. Por favor, cadastre-os</p>
                                    </div>
                                </div>-->
                <div class="card-deck">
                    @php
                    $count = 1;
                    @endphp
                    @forelse($slideshows as $slideshow)
                    <div class="form-group col-md-4">


                        <div class="card">
                            <img class="card-img-top" id="cardSlideshow" src="/img/slideshow/{{$slideshow->imagem}}" alt="Imagem de capa do card">
                            <div class="card-body">
                                <h5 class="card-title">Imagem {{$count}}</h5>
                                <p class="card-text"></p>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted" style="float: right;"><a class="" data-toggle="modal" data-target="#newSlideshow" onclick="editarSlideshow({{$slideshow->id_slideshow}}, '{{$slideshow->imagem}}');"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;&nbsp;<a class="" onclick="abrirSweetSlideshow({{$slideshow->id_slideshow}});"><i class="fa fa-trash"></i></a></small>
                            </div>
                        </div>
                    </div>
                    @php
                    $count++;
                    @endphp
                    @empty


                    @endforelse
                </div>
                                <!--            <table id="tabela" class="table table-bordered" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>Imagem</th>
                                                        <th>Ação</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($slideshows as $slideshow)
                                                    <tr>
                                                        <td><img src="/img/slideshow/{{$slideshow->imagem}}" width="100px"/></td>
                                                        <td><a class="" data-toggle="modal" data-target="#newSlideshow" onclick="editarSlideshow({{$slideshow->id_slideshow}}, '{{$slideshow->imagem}}');"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;&nbsp;<a class="" onclick="abrirSweetSlideshow({{$slideshow->id_slideshow}});"><i class="fa fa-trash"></i></a></td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>-->
            </div>
            <div class="text-center" style="margin-top: 20px;">
                <button type="submit" data-toggle="modal" data-target="#newSlideshow" onclick="adicionarSlideshow();"><i class="fa fa-plus-circle" aria-hidden="true"></i> &nbsp; Novo Slideshow</button>
            </div>
        </div>

    </div>
    <div class="modal fade" id="newSlideshow" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="ttl"><b>Novo Slideshow</b></h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="javascript:void(0);" method="post" role="form" id="formAdmin" class="contactForm">
                    <input type="hidden" name="action" id="addSlideshow" value="addSlideshow"/>
                    <input type="hidden" name="id_slideshow" id="" value=""/>
                    <div class="modal-body">
                        <div class="errors">

                        </div>
                        <div class="input-group col-md-12" style="display:none; margin: 0 auto; text-align: center; margin-bottom: 20px;" id="imageSlideshowEdit">
                            <img src="" width="100px" class="imageSlideshow"/>
                        </div>
                        <div class="input-group col-md-12">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupFileAddon01">Imagem: </span>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="inputGroupFile01" name="file"
                                       aria-describedby="inputGroupFileAddon01">
                                <label class="custom-file-label" for="inputGroupFile01">Seu arquivo</label>
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

<script src="{{asset('js/slideshow.js')}}"></script>
<script src="{{asset('js/operacao.js')}}"></script>
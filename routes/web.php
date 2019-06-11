<?php

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */

Route::get('/', function () {
    $title = "Anna Jéssica Oficial";
    $eventoquadro = DB::select("SELECT evento.*,
    (SELECT GROUP_CONCAT(link_evento.nome_link SEPARATOR ',') FROM link_evento WHERE link_evento.id_evento_fk = evento.id_evento) as nomeLinkEvento,
    (SELECT GROUP_CONCAT(link_evento.link SEPARATOR ',') FROM link_evento WHERE link_evento.id_evento_fk = evento.id_evento) as linkEvento
    from evento WHERE evento.tipo = 'Quadro' limit 4");

    $anuncioClassificacao1 = DB::select('SELECT * from anuncio WHERE classificacao_id_classificacao = 1 AND status = 1');
    $anuncioClassificacao2 = DB::select('SELECT * from anuncio WHERE classificacao_id_classificacao = 2 AND status = 1');
    $anuncioClassificacao3 = DB::select('SELECT * from anuncio WHERE classificacao_id_classificacao = 3 AND status = 1');

    $slideshows = DB::select('SELECT * from slideshow WHERE status = 1 limit 3');
    $ptBr = DB::select("SET lc_time_names = 'pt_BR';");
    $datas = DB::select("SELECT 
        LEFT(lower(DATE_FORMAT(data_inicio, '%d')), 3) AS dia,
        LEFT(lower(DATE_FORMAT(data_inicio, '%M')), 3) AS mes,
        RIGHT(UPPER(DATE_FORMAT(data_inicio, '%Y')), 2) AS ano,
        DATE_FORMAT(data_inicio, '%Y') as numeroAno,
        DATE_FORMAT(data_inicio, '%m') as numeroMes
        FROM agenda 
        WHERE agenda.status = 1
        GROUP BY mes, ano, numeroMes, numeroAno, agenda.data_inicio
        order by numeroMes asc, dia asc");

    $agendas = DB::select("SELECT 
        LEFT(lower(DATE_FORMAT(data_inicio, '%d')), 3) AS dia,
        LEFT(lower(DATE_FORMAT(data_inicio, '%M')), 3) AS mes,
        RIGHT(UPPER(DATE_FORMAT(data_inicio, '%Y')), 2) AS ano,
        DATE_FORMAT(data_inicio, '%Y') as numeroAno,
        DATE_FORMAT(data_inicio, '%m') as numeroMes,
        (SELECT GROUP_CONCAT(agen.id_agenda SEPARATOR ', ') 
                FROM agenda agen WHERE agen.data_inicio = agenda.data_inicio AND agen.status = 1) as idEvento,
        (SELECT GROUP_CONCAT(agen.nome_evento SEPARATOR ', ') 
                FROM agenda agen WHERE agen.data_inicio = agenda.data_inicio AND agen.status = 1) as nomeEvento,
        (SELECT GROUP_CONCAT(agen.descricao SEPARATOR ', ') 
                FROM agenda agen WHERE agen.data_inicio = agenda.data_inicio AND agen.status = 1) as descricaoEvento,
        (SELECT GROUP_CONCAT(agen.imagem SEPARATOR ', ') 
                FROM agenda agen WHERE agen.data_inicio = agenda.data_inicio AND agen.status = 1) as imagemEvento,
        (SELECT GROUP_CONCAT(agen.hora_inicio SEPARATOR ', ') 
                FROM agenda agen WHERE agen.data_inicio = agenda.data_inicio AND agen.status = 1) as horaInicio,
        (SELECT GROUP_CONCAT(agen.hora_fim SEPARATOR ', ') 
                FROM agenda agen WHERE agen.data_inicio = agenda.data_inicio AND agen.status = 1) as horaFim,
                (SELECT GROUP_CONCAT(agen.cidade SEPARATOR ', ') 
                FROM agenda agen WHERE agen.data_inicio = agenda.data_inicio AND agen.status = 1) as cidade
        FROM agenda 
        WHERE agenda.status = 1
        GROUP BY mes, ano, numeroMes, numeroAno, agenda.data_inicio
        order by numeroMes asc, dia asc");

    $selectKits = DB::select("SELECT
		LEFT(lower(DATE_FORMAT(prazo, '%d')), 3) AS dia,
        LEFT(lower(DATE_FORMAT(prazo, '%M')), 3) AS mes,
        RIGHT(UPPER(DATE_FORMAT(prazo, '%Y')), 2) AS ano,
        DATE_FORMAT(prazo, '%Y') as numeroAno,
        DATE_FORMAT(prazo, '%m') as numeroMes,
        evento.*,
        (SELECT GROUP_CONCAT(kit_evento.id_kit SEPARATOR ',') FROM kit_evento WHERE kit_evento.id_evento_fk = evento.id_evento) as nomeLinkEvento,
        (SELECT GROUP_CONCAT(kit_evento.nome_kit SEPARATOR ',') FROM kit_evento WHERE kit_evento.id_evento_fk = evento.id_evento) as nomeLinkEvento,
        (SELECT GROUP_CONCAT(kit_evento.imagem_kit SEPARATOR ',') FROM kit_evento WHERE kit_evento.id_evento_fk = evento.id_evento) as nomeLinkEvento,
        (SELECT GROUP_CONCAT(kit_evento.valor SEPARATOR ',') FROM kit_evento WHERE kit_evento.id_evento_fk = evento.id_evento) as nomeLinkEvento,
        (SELECT GROUP_CONCAT(kit_evento.id_tamanho SEPARATOR ',') FROM kit_evento WHERE kit_evento.id_evento_fk = evento.id_evento) as nomeLinkEvento,
        (SELECT GROUP_CONCAT(kit_evento.descricao_kit SEPARATOR ',') FROM kit_evento WHERE kit_evento.id_evento_fk = evento.id_evento) as linkEvento
        from evento WHERE evento.tipo = 'Destaque' limit 1
        ");

    return view('index', compact('title', 'selectKits', 'eventoquadro', 'anuncioClassificacao1', 'anuncioClassificacao2', 'anuncioClassificacao3', 'slideshows', 'agendas', 'datas'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/token/{token}', 'EmailController@token')->name('token');
Route::get('/notifications/mp', 'CompraController@ipnNotification');

Route::group(['prefix' => 'adminConf', 'middleware' => 'auth'], function() {
    Route::get('/', 'HomeController@adminConf')->name('adminConf');

    Route::group(['prefix' => 'agenda'], function () {
        Route::post('/', 'AgendaController@pageAgenda')->name('pageAgenda');
        Route::post('/getEventos', 'AgendaController@getEventos')->name('getEventos');
        Route::post('/getEventoById', 'AgendaController@getEventoById')->name('getEventoById');
        Route::post('/addAgenda', 'AgendaController@addAgenda')->name('addAgenda');
        Route::post('/editAgenda', 'AgendaController@editAgenda')->name('editAgenda');
        Route::post('/deleteAgenda', 'AgendaController@deleteAgenda')->name('deleteAgenda');
    });

    Route::group(['prefix' => 'anuncio'], function () {
        Route::post('/', 'AnuncioController@pageAnuncio')->name('pageAnuncio');
        Route::post('/addAnuncio', 'AnuncioController@addAnuncio')->name('addAnuncio');
        Route::post('/editAnuncio', 'AnuncioController@editAnuncio')->name('editAnuncio');
        Route::post('/deleteAnuncio', 'AnuncioController@deleteAnuncio')->name('deleteAnuncio');
    });

    Route::group(['prefix' => 'apoio'], function () {
        Route::post('/', 'ApoioController@pageApoio')->name('pageApoio');
        Route::post('/addApoio', 'ApoioController@addApoio')->name('addApoio');
        Route::post('/editApoio', 'ApoioController@editApoio')->name('editApoio');
        Route::post('/deleteApoio', 'ApoioController@deleteApoio')->name('deleteApoio');
    });

    Route::group(['prefix' => 'evento'], function () {
        Route::post('/', 'EventoController@pageEvento')->name('pageEvento');
        Route::post('/addEvento', 'EventoController@addEvento')->name('addEvento');
        Route::post('/editEvento', 'EventoController@editEvento')->name('editEvento');
        Route::post('/deleteEvento', 'EventoController@deleteEvento')->name('deleteEvento');
        Route::post('/dadosEvento', 'EventoController@dadosEvento')->name('dadosEvento');
        Route::post('/verificarKit', 'EventoController@verificarKit')->name('verificarKit');
    });

    Route::group(['prefix' => 'parceiro'], function () {
        Route::post('/', 'ParceiroController@pageParceiro')->name('pageParceiro');
        Route::post('/addParceiro', 'ParceiroController@addParceiro')->name('addParceiro');
        Route::post('/editParceiro', 'ParceiroController@editParceiro')->name('editParceiro');
        Route::post('/deleteParceiro', 'ParceiroController@deleteParceiro')->name('deleteParceiro');
    });

    Route::group(['prefix' => 'patrocinio'], function () {
        Route::post('/', 'PatrocinioController@pagePatrocinio')->name('pagePatrocinio');
        Route::post('/addPatrocinio', 'PatrocinioController@addPatrocinio')->name('addPatrocinio');
        Route::post('/editPatrocinio', 'PatrocinioController@editPatrocinio')->name('editPatrocinio');
        Route::post('/deletePatrocinio', 'PatrocinioController@deletePatrocinio')->name('deletePatrocinio');
    });

    Route::group(['prefix' => 'realizacao'], function () {
        Route::post('/', 'RealizacaoController@pageRealizacao')->name('pageRealizacao');
        Route::post('/addRealizacao', 'RealizacaoController@addRealizacao')->name('addRealizacao');
        Route::post('/editRealizacao', 'RealizacaoController@editRealizacao')->name('editRealizacao');
        Route::post('/deleteRealizacao', 'RealizacaoController@deleteRealizacao')->name('deleteRealizacao');
    });

    Route::group(['prefix' => 'slideshow'], function () {
        Route::post('/', 'SlideshowController@pageSlideshow')->name('pageSlideshow');
        Route::post('/addSlideshow', 'SlideshowController@addSlideshow')->name('addSlideshow');
        Route::post('/editSlideshow', 'SlideshowController@editSlideshow')->name('editSlideshow');
        Route::post('/deleteSlideshow', 'SlideshowController@deleteSlideshow')->name('deleteSlideshow');
    });
});
Route::get('/perfil', 'HomeController@perfil')->name('perfil');

Route::get('/compra-kit', 'HomeController@compraKit')->name('compra-kit');
Route::post('/compra-kit/getKit', 'HomeController@getKit')->name('getKit');

Route::post('/realizarCompraKit', 'CompraController@pagarMP')->name('getKit');

// Route para registrar pessoa
Route::group(['prefix' => 'user', 'middleware' => 'auth'], function() {
    Route::any('/userRelatorio', 'HomeController@pageRelatorioUser')->name('userRelatorio');
    Route::post('/editUser', 'HomeController@editUser')->name('editUser');
});


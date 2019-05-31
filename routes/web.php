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
    return view('index', compact('title'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/token/{token}', 'EmailController@token')->name('token');


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

// Route para registrar pessoa
Route::group(['prefix' => 'user', 'middleware' => 'auth'], function() {
    Route::any('/userRelatorio', 'HomeController@pageRelatorioUser')->name('userRelatorio');
    Route::post('/editUser', 'HomeController@editUser')->name('editUser');
});


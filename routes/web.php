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


Route::group(['prefix' => 'adminConf', 'middleware' => 'auth'], function() {
    Route::get('/', 'HomeController@adminConf')->name('adminConf');

    Route::group(['prefix' => 'agenda'], function () {
        Route::post('/', 'AgendaController@pageAgenda')->name('pageAgenda');
    });

    Route::group(['prefix' => 'anuncio'], function () {
        Route::post('/', 'AnuncioController@pageAnuncio')->name('pageAnuncio');
    });

    Route::group(['prefix' => 'apoio'], function () {
        Route::post('/', 'ApoioController@pageApoio')->name('pageApoio');
        Route::post('/addApoio', 'ApoioController@addApoio')->name('addApoio');
        Route::post('/editApoio', 'ApoioController@editApoio')->name('editApoio');
    });

    Route::group(['prefix' => 'evento'], function () {
        Route::post('/', 'EventoController@pageEvento')->name('pageEvento');
    });

    Route::group(['prefix' => 'parceiro'], function () {
        Route::post('/', 'ParceiroController@pageParceiro')->name('pageParceiro');
    });

    Route::group(['prefix' => 'patrocinio'], function () {
        Route::post('/', 'PatrocinioController@pagePatrocinio')->name('pagePatrocinio');
    });

    Route::group(['prefix' => 'realizacao'], function () {
        Route::post('/', 'RealizacaoController@pageRealizacao')->name('pageRealizacao');
    });
});
Route::get('/perfil', 'HomeController@perfil')->name('perfil');

Route::get('/compra-kit', 'HomeController@compraKit')->name('compra-kit');

// Route para registrar pessoa
Route::group(['prefix' => 'user', 'middleware' => 'auth'], function() {
    Route::any('/userRelatorio', 'HomeController@pageRelatorioUser')->name('userRelatorio');
    Route::post('/editUser', 'HomeController@editUser')->name('editUser');
});


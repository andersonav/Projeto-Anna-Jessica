<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AdminController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function pageAgenda() {
        return view('admin.agenda');
    }

    public function pageAnuncio() {
        $anuncios = DB::table('anuncio')->get();
        return view('admin.anuncio', compact('anuncios'));
    }

    public function pageApoio() {
        $apoios = DB::table('apoio')->get();
        return view('admin.apoio', compact('apoios'));
    }

    public function pageEvento() {
        $eventos = DB::table('evento')
                ->join('apoio', 'id_apoio', '=', 'apoio_id_apoio')
                ->join('patrocinio', 'id_patrocinio', '=', 'patrocinio_id_patrocinio')
                ->join('realizacao', 'id_realizacao', '=', 'realizacao_id_realizacao')
                ->get();
        return view('admin.evento', compact('eventos'));
    }

    public function pageParceiro() {
        $parceiros = DB::table('parceiro')->get();
        return view('admin.parceiro', compact('parceiros'));
    }

    public function pagePatrocinio() {
        $patrocinios = DB::table('patrocinio')->get();
        return view('admin.patrocinio', compact('patrocinios'));
    }

    public function pageRealizacao() {
        $realizacoes = DB::table('realizacao')->get();
        return view('admin.realizacao', compact('realizacoes'));
    }

}

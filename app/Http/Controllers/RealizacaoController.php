<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Realizacao;

class RealizacaoController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function pageRealizacao() {
        $realizacoes = Realizacao::get();
        return view('admin.realizacao', compact('realizacoes'));
    }

}

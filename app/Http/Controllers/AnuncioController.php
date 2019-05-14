<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Anuncio;

class AnuncioController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function pageAnuncio() {
        $anuncios = Anuncio::get();
        return view('admin.anuncio', compact('anuncios'));
    }

}

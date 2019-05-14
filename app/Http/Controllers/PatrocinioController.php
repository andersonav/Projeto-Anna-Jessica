<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patrocinio;

class PatrocinioController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function pagePatrocinio() {
        $patrocinios = Patrocinio::get();
        return view('admin.patrocinio', compact('patrocinios'));
    }

}

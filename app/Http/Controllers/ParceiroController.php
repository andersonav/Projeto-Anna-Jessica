<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Parceiro;

class ParceiroController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function pageParceiro() {
        $parceiros = Parceiro::get();
        return view('admin.parceiro', compact('parceiros'));
    }

}

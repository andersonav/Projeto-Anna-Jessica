<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Agenda;

class AgendaController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function pageAgenda() {
        $agendas = Agenda::where('status', '=', 1)->get();
        return view('admin.agenda', compact('agendas'));
    }

}

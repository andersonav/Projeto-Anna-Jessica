<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Agenda;
class AgendaController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function pageAgenda() {
        return view('admin.agenda');
    }

}

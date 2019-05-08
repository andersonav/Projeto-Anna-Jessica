<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index');
    }

    public function adminConf()
    {
        if (auth()->user()->id_tipo_usuario == 1) {
            return view('adminConf');
        }

        return back();
    }

    public function pageRelatorioUser()
    {
        if (auth()->user()->id_tipo_usuario == 2) {
            return view('user.pageRelatorioUser');
        }

        return back();
    }

    public function perfil()
    {
        return view('perfil');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Support\Facades\Response;

class HomeController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $title = "Anna Jéssica Oficial";
        return view('index', compact('title'));
    }

    public function adminConf() {
        if (auth()->user()->id_tipo_usuario == 1) {
            $title = "Administrador";
            return view('adminConf', compact('title'));
        }

        return back();
    }

    public function pageRelatorioUser() {
        if (auth()->user()->id_tipo_usuario == 2) {
            $title = "Relatório";
            return view('user.pageRelatorioUser', compact('title'));
        }

        return back();
    }

    public function perfil() {
        $title = "Perfil";
        return view('perfil', compact('title'));
    }

    public function editUser(Request $request) {
        $this->validateUserEdit($request);

        if ($request->password != null) {
            $passwordNew = DB::table('usuario')->where('id_usuario', auth()->user()->id_usuario)->update(array('password' => bcrypt($request->password)));
        }

        $altUser = DB::table('usuario')->where('id_usuario', auth()->user()->id_usuario)->update(array(
            'nome_usuario' => $request->nome,
            'telefone_usuario' => $request->telefone,
            'email' => $request->email,
            'cidade_usuario' => $request->cidade,
        ));

        return Response::json($request);
    }

    protected function validateUserEdit(Request $request) {
        return $this->validate($request, [
                    'nome' => 'required',
                    'telefone' => 'required',
                    'email' => 'required',
                    'cidade' => 'required',
                    'password' => 'confirmed',
        ]);
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Support\Facades\Response;

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
        $title = "Anna Jéssica Oficial";
        $eventoquadro = DB::select("SELECT evento.*,
        (SELECT GROUP_CONCAT(link_evento.nome_link SEPARATOR ',') FROM link_evento WHERE link_evento.id_evento_fk = evento.id_evento) as nomeLinkEvento,
        (SELECT GROUP_CONCAT(link_evento.link SEPARATOR ',') FROM link_evento WHERE link_evento.id_evento_fk = evento.id_evento) as linkEvento
        from evento WHERE evento.tipo = 'Quadro'");

        return view('index', compact('title','eventoquadro'));
    }

    public function token(Request $request)
    {
        $token = base64_decode($request->token);
        $ativar = DB::table('usuario')->where('email', $token)->update(array(
            'ativo_usuario' => 1,
        ));
        return route('home')
            ->with('cadastrado', 'cadastrado');
    }

    public function adminConf()
    {
        if (auth()->user()->id_tipo_usuario == 1) {
            $title = "Administrador";
            return view('adminConf', compact('title'));
        }

        return back();
    }

    public function pageRelatorioUser()
    {
        if (auth()->user()->id_tipo_usuario == 2) {
            $title = "Relatório";
            return view('user.pageRelatorioUser', compact('title'));
        }

        return back();
    }

    public function compraKit()
    {
        $title = "Compra Kit";
        return view('user.compraKit', compact('title'));
    }

    public function perfil()
    {
        $title = "Perfil";
        return view('perfil', compact('title'));
    }

    public function editUser(Request $request)
    {
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

    protected function validateUserEdit(Request $request)
    {
        return $this->validate($request, [
            'nome' => 'required',
            'telefone' => 'required',
            'email' => 'required',
            'cidade' => 'required',
            'password' => 'confirmed',
        ]);
    }
}

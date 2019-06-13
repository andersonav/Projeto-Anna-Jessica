<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Support\Facades\Response;
use App\Kit;

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
        from evento WHERE evento.tipo = 'Quadro' limit 4");

        $anuncioClassificacao1 = DB::select('SELECT * from anuncio WHERE classificacao_id_classificacao = 1 AND status = 1');
        $anuncioClassificacao2 = DB::select('SELECT * from anuncio WHERE classificacao_id_classificacao = 2 AND status = 1');
        $anuncioClassificacao3 = DB::select('SELECT * from anuncio WHERE classificacao_id_classificacao = 3 AND status = 1');
        $slideshows = DB::select('SELECT * from slideshow WHERE status = 1 limit 3');

        $datas = DB::select("SELECT 
        LEFT(lower(DATE_FORMAT(data_inicio, '%d')), 3) AS dia,
        LEFT(lower(DATE_FORMAT(data_inicio, '%M')), 3) AS mes,
        RIGHT(UPPER(DATE_FORMAT(data_inicio, '%Y')), 2) AS ano,
        DATE_FORMAT(data_inicio, '%Y') as numeroAno,
        DATE_FORMAT(data_inicio, '%m') as numeroMes
        FROM agenda 
        WHERE agenda.status = 1
        GROUP BY mes, ano, numeroMes, numeroAno, agenda.data_inicio
        order by numeroMes asc, dia asc");

        $agendas = DB::select("SELECT 
        LEFT(lower(DATE_FORMAT(data_inicio, '%d')), 3) AS dia,
        LEFT(lower(DATE_FORMAT(data_inicio, '%M')), 3) AS mes,
        RIGHT(UPPER(DATE_FORMAT(data_inicio, '%Y')), 2) AS ano,
        DATE_FORMAT(data_inicio, '%Y') as numeroAno,
        DATE_FORMAT(data_inicio, '%m') as numeroMes,
        (SELECT GROUP_CONCAT(agen.id_agenda SEPARATOR ', ') 
                FROM agenda agen WHERE agen.data_inicio = agenda.data_inicio AND agen.status = 1) as idEvento,
        (SELECT GROUP_CONCAT(agen.nome_evento SEPARATOR ', ') 
                FROM agenda agen WHERE agen.data_inicio = agenda.data_inicio AND agen.status = 1) as nomeEvento,
        (SELECT GROUP_CONCAT(agen.descricao SEPARATOR ', ') 
                FROM agenda agen WHERE agen.data_inicio = agenda.data_inicio AND agen.status = 1) as descricaoEvento,
        (SELECT GROUP_CONCAT(agen.imagem SEPARATOR ', ') 
                FROM agenda agen WHERE agen.data_inicio = agenda.data_inicio AND agen.status = 1) as imagemEvento,
        (SELECT GROUP_CONCAT(agen.hora_inicio SEPARATOR ', ') 
                FROM agenda agen WHERE agen.data_inicio = agenda.data_inicio AND agen.status = 1) as horaInicio,
        (SELECT GROUP_CONCAT(agen.hora_fim SEPARATOR ', ') 
                FROM agenda agen WHERE agen.data_inicio = agenda.data_inicio AND agen.status = 1) as horaFim,
                (SELECT GROUP_CONCAT(agen.cidade SEPARATOR ', ') 
                FROM agenda agen WHERE agen.data_inicio = agenda.data_inicio AND agen.status = 1) as cidade
        FROM agenda 
        WHERE agenda.status = 1
        GROUP BY mes, ano, numeroMes, numeroAno, agenda.data_inicio
        order by numeroMes asc, dia asc");

        $selectKits = DB::select("SELECT
		LEFT(lower(DATE_FORMAT(prazo, '%d')), 3) AS dia,
        LEFT(lower(DATE_FORMAT(prazo, '%M')), 3) AS mes,
        RIGHT(UPPER(DATE_FORMAT(prazo, '%Y')), 2) AS ano,
        DATE_FORMAT(prazo, '%Y') as numeroAno,
        DATE_FORMAT(prazo, '%m') as numeroMes,
        evento.*,
        (SELECT GROUP_CONCAT(kit_evento.id_kit SEPARATOR ',') FROM kit_evento WHERE kit_evento.id_evento_fk = evento.id_evento) as idKit,
        (SELECT GROUP_CONCAT(kit_evento.nome_kit SEPARATOR ',') FROM kit_evento WHERE kit_evento.id_evento_fk = evento.id_evento) as nomeKit,
        (SELECT GROUP_CONCAT(kit_evento.imagem_kit SEPARATOR ',') FROM kit_evento WHERE kit_evento.id_evento_fk = evento.id_evento) as imagemKit,
        (SELECT GROUP_CONCAT(kit_evento.valor SEPARATOR ',') FROM kit_evento WHERE kit_evento.id_evento_fk = evento.id_evento) as valorKit,
        (SELECT GROUP_CONCAT(kit_evento.id_tamanho SEPARATOR ',') FROM kit_evento WHERE kit_evento.id_evento_fk = evento.id_evento) as tamanho,
        (SELECT GROUP_CONCAT(kit_evento.descricao_kit SEPARATOR ',') FROM kit_evento WHERE kit_evento.id_evento_fk = evento.id_evento) as descKit
        from evento WHERE evento.tipo = 'Destaque' limit 1
        ");
        return view('index', compact('title', 'selectKits', 'eventoquadro', 'anuncioClassificacao1', 'anuncioClassificacao2', 'anuncioClassificacao3', 'slideshows', 'agendas', 'datas'));
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
            $relatorios = DB::select('SELECT fa.*, ke.nome_kit, eve.nome_evento FROM fatura fa
            LEFT JOIN kit_evento ke ON fa.id_kit = ke.id_kit
            LEFT JOIN evento eve ON ke.id_evento_fk = eve.id_evento
            WHERE fa.id_usuario = ?', [auth()->user()->id_usuario]);
            
            return view('user.pageRelatorioUser', compact('title', 'relatorios'));
        }

        return back();
    }

    public function compraKit()
    {
        $title = "Compra Kit";
        $selectKits = DB::select("SELECT
		LEFT(lower(DATE_FORMAT(prazo, '%d')), 3) AS dia,
        LEFT(lower(DATE_FORMAT(prazo, '%M')), 3) AS mes,
        RIGHT(UPPER(DATE_FORMAT(prazo, '%Y')), 2) AS ano,
        DATE_FORMAT(prazo, '%Y') as numeroAno,
        DATE_FORMAT(prazo, '%m') as numeroMes,
        evento.*,
        (SELECT GROUP_CONCAT(kit_evento.id_kit SEPARATOR ',') FROM kit_evento WHERE kit_evento.id_evento_fk = evento.id_evento) as idKit,
        (SELECT GROUP_CONCAT(kit_evento.nome_kit SEPARATOR ',') FROM kit_evento WHERE kit_evento.id_evento_fk = evento.id_evento) as nomeKit,
        (SELECT GROUP_CONCAT(kit_evento.imagem_kit SEPARATOR ',') FROM kit_evento WHERE kit_evento.id_evento_fk = evento.id_evento) as imagemKit,
        (SELECT GROUP_CONCAT(kit_evento.valor SEPARATOR '/') FROM kit_evento WHERE kit_evento.id_evento_fk = evento.id_evento) as valorKit,
        (SELECT GROUP_CONCAT(kit_evento.id_tamanho SEPARATOR ',') FROM kit_evento WHERE kit_evento.id_evento_fk = evento.id_evento) as tamanho,
        (SELECT GROUP_CONCAT(kit_evento.descricao_kit SEPARATOR ',') FROM kit_evento WHERE kit_evento.id_evento_fk = evento.id_evento) as descKit
        from evento WHERE evento.tipo = 'Destaque' limit 1
        ");
        return view('user.compraKit', compact('title', 'selectKits', 'tamanho'));
    }

    public function getKit(Request $request)
    {
        $kit = Kit::where('id_kit', '=', $request->idKit)->get();
        return response()->json($kit);
    }

    public function perfil()
    {
        $title = "Perfil";
        return view('perfil', compact('title'));
    }

    public function adminRelatorio()
    {
        $title = "Relatorio";
        return view('admin.relatoriosadmin', compact('title'));
    }

    public function getCountUsuarios()
    {
        $countUsuarios = DB::select("SELECT COUNT(id_usuario) as qtdUsuario FROM usuario WHERE id_tipo_usuario = 2");
        return response()->json($countUsuarios);
    }

    public function getUsuariosEventoDestaque()
    {
        $countUsuarios = DB::select("SELECT COUNT(id_usuario) as qtdUsuario from fatura 
INNER JOIN kit_evento ON kit_evento.id_kit = fatura.id_kit
INNER JOIN evento ON evento.id_evento = kit_evento.id_evento_fk
WHERE evento.tipo = 'Destaque' AND fatura.status = 'Aprovado'");
        return response()->json($countUsuarios);
    }

    public function getEventosRealizados()
    {
        $eventosRealizados = DB::select("SELECT COUNT(id_evento) as eventosRealizados FROM evento
WHERE evento.prazo < NOW()");
        return response()->json($eventosRealizados);
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

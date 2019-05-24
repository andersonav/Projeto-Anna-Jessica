<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use App\Evento;
use App\Kit;
use App\Link;
use App\Tamanho;

class EventoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function pageEvento()
    {
        $eventos = Evento::join('apoio', 'id_apoio', '=', 'apoio_id_apoio')
            ->join('patrocinio', 'id_patrocinio', '=', 'patrocinio_id_patrocinio')
            ->join('realizacao', 'id_realizacao', '=', 'realizacao_id_realizacao')
            ->get();
        $apoios = DB::table('apoio')->get();
        $patrocionios = DB::table('patrocinio')->get();
        $realizacoes = DB::table('realizacao')->get();
        return view('admin.evento', compact('eventos', 'apoios', 'patrocionios', 'realizacoes'));
    }

    public function addEvento(Request $request)
    {
        $validator = $this->validateForm($request);
        $image = $request->imgEvento;
        $name = $image->getClientOriginalName();
        $destinationPath = public_path('img/eventos');
        $image->move($destinationPath, $name);

        $createEvento = Evento::create([
            'nome_evento' => $request->nome_evento,
            'data' => $request->data,
            'hora_inicio' => $request->hora_ini,
            'hora_fim' => $request->hora_fim,
            'informacao_adicional' => $request->info_adc,
            'percurso' => $request->percurso,
            'distancia' => $request->distancia,
            'modo' => $request->modo,
            'tipo' => $request->tipo,
            'prazo' => $request->data_encerramento,
            'endereco' => $request->endereco,
            'imagem' => $name,
            'apoio_id_apoio' => $request->apoio,
            'patrocinio_id_patrocinio' => $request->patrocinio,
            'realizacao_id_realizacao' => $request->realizacao,
            'status' => 1
        ]);

        $id_evento = DB::table('evento')->where('nome_evento', $request->nome_evento)->get();

        if ($request->nomeLinkEvento != null) {
            for ($i = 0; $i < count($request->nomeLinkEvento); $i++) {

                $createLink = Link::create([
                    'nome_link' => $request->nomeLinkEvento[$i],
                    'link' => $request->linkEvento[$i],
                    'id_evento_fk' => $id_evento[0]->id_evento,
                ]);
            }
        }

        if ($request->tipo == 'Destaque') {
            $validator2 = $this->validateForm2($request);
            for ($i = 0; $i < count($request->nomeKit); $i++) {
                $image = $request->imgKit[$i];
                $name = $image->getClientOriginalName();
                $destinationPath = public_path('img/eventos/kit');
                $image->move($destinationPath, $name);
                $createKit = Kit::create([
                    'nome_kit' => $request->nomeKit[$i],
                    'imagem_kit' => $name,
                    'valor' => $request->valorKit[$i],
                    'id_tamanho' => md5($request->nomeKit[$i]),
                    'descricao_kit' => $request->descKit[$i],
                    'id_evento_fk' => $id_evento[0]->id_evento,
                ]);
                $numero = $request->kitNum[$i];
                foreach ($request->$numero as $tamanho) {
                    $createTamanho = Tamanho::create([
                        'hash_tamanho' => md5($request->nomeKit[$i]),
                        'tamanho' => $tamanho,
                    ]);
                }
            }
        }


        return response()->json($request);
    }

    public function dadosEvento(Request $request)
    {
        $dados = DB::select('SELECT even.*, 
        (SELECT GROUP_CONCAT(kit_evento.id_kit SEPARATOR ",") 
        FROM kit_evento WHERE kit_evento.id_evento_fk = even.id_evento) as idKit, 
        (SELECT GROUP_CONCAT(kit_evento.nome_kit SEPARATOR ",") 
        FROM kit_evento WHERE kit_evento.id_evento_fk = even.id_evento) as nomeKit,  
        (SELECT GROUP_CONCAT(kit_evento.imagem_kit SEPARATOR ",") 
        FROM kit_evento WHERE kit_evento.id_evento_fk = even.id_evento) as imgKit,  
        (SELECT GROUP_CONCAT(kit_evento.valor SEPARATOR ",") 
        FROM kit_evento WHERE kit_evento.id_evento_fk = even.id_evento) as valorKit, 
        (SELECT GROUP_CONCAT(kit_evento.id_tamanho SEPARATOR ",") 
        FROM kit_evento WHERE kit_evento.id_evento_fk = even.id_evento) as hashTamanho,  
        (SELECT GROUP_CONCAT(kit_evento.descricao_kit SEPARATOR ",") 
        FROM kit_evento WHERE kit_evento.id_evento_fk = even.id_evento) as descKit,
        
         
        (SELECT GROUP_CONCAT(link_evento.id_link_evento SEPARATOR ",") 
        FROM link_evento WHERE link_evento.id_evento_fk = even.id_evento) as idLink ,  
        (SELECT GROUP_CONCAT(link_evento.nome_link SEPARATOR ",") 
        FROM link_evento WHERE link_evento.id_evento_fk = even.id_evento) as nomeLink ,  
        (SELECT GROUP_CONCAT(link_evento.link SEPARATOR ",") 
        FROM link_evento WHERE link_evento.id_evento_fk = even.id_evento) as linkEvento
        
        FROM evento even 
        WHERE even.id_evento = ?', [$request->idEvento]);

        return Response::json($dados);
    }

    public function validateForm(Request $request)
    {
        return $this->validate($request, [
            'nome_evento' => 'required|max:255|unique:evento',
            'imgEvento' => 'required',
        ]);
    }

    public function validateForm2(Request $request)
    {
        return $this->validate($request, [
            'nomeKit' => 'required',
            'imgKit' => 'required',
            'descKit' => 'required',
        ]);
    }
}

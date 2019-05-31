<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Agenda;
use DB;

class AgendaController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function pageAgenda() {
        $agendas = Agenda::where('status', '=', 1)->get();
        return view('admin.agenda', compact('agendas'));
    }

    public function getEventos() {
        $eventos = DB::select("SELECT 
        id_agenda as id, 
        nome_evento as title,
        CONCAT(data_inicio, ' ' , hora_inicio) as start,
        CONCAT(data_fim, ' ' , hora_fim) as end
        FROM agenda 
        WHERE status = 1");
        return response()->json($eventos);
    }

    public function getEventoById(Request $request) {
        $evento = Agenda::where('status', '=', 1)->where('id_agenda', '=', $request->idEvento)->get();
        return response()->json($evento);
    }

    public function addAgenda(Request $request) {
        $validator = $this->validateForm($request);
        $image = $request->file('imgAgenda');
        $name = $image->getClientOriginalName();
        $destinationPath = public_path('img/agenda');
        $image->move($destinationPath, $name);
        $dateInicio = str_replace('/', '-', $request->data_inicio);
        $dateFim = str_replace('/', '-', $request->data_fim);
        $newDateInicio = date("Y-m-d", strtotime($dateInicio));
        $newDateFim = date("Y-m-d", strtotime($dateFim));
        $createAgenda = Agenda::create([
                    'nome_evento' => $request->nome,
                    'descricao' => $request->descricao,
                    'data_inicio' => $newDateInicio,
                    'data_fim' => $newDateFim,
                    'imagem' => $name,
                    'hora_inicio' => $request->hora_inicio,
                    'hora_fim' => $request->hora_fim,
                    'cidade' => $request->cidade,
                    'status' => 1
        ]);

        return response()->json($request);
    }

    public function editAgenda(Request $request) {
        $validator = $this->validateForm($request);
        $image = $request->file('imgAgenda');
        $name = $image->getClientOriginalName();
        $destinationPath = public_path('img/agenda');
        $image->move($destinationPath, $name);
        $dateInicio = str_replace('/', '-', $request->data_inicio);
        $dateFim = str_replace('/', '-', $request->data_fim);
        $newDateInicio = date("Y-m-d", strtotime($dateInicio));
        $newDateFim = date("Y-m-d", strtotime($dateFim));
        $updateAgenda = Agenda::where("id_agenda", "=", $request->id_agenda)->update([
            'nome_evento' => $request->nome,
            'descricao' => $request->descricao,
            'data_inicio' => $newDateInicio,
            'data_fim' => $newDateFim,
            'imagem' => $name,
            'hora_inicio' => $request->hora_inicio,
            'hora_fim' => $request->hora_fim,
            'cidade' => $request->cidade,
            'status' => 1
        ]);
        return response()->json($request);
    }

    public function deleteAgenda(Request $request) {
        $updateAgenda = Agenda::where("id_agenda", "=", $request->id_agenda)->update([
            "status" => 0
        ]);
        return response()->json($request);
    }

    public function validateForm(Request $request) {
        return $this->validate($request, [
                    'nome' => 'required|regex:/^[a-zA-ZçÇáéíóúÁÉÍÓÚ0-9 ]+$/u|max:255|',
                    'descricao' => 'required|regex:/^[a-zA-ZçÇáéíóúÁÉÍÓÚ0-9 ]+$/u|max:255|',
                    'imgAgenda' => 'required|mimes:png,jpeg,jpg,gif|max:2048',
                    'data_inicio' => 'required',
                    'data_fim' => 'required',
                    'hora_fim' => 'required',
                    'hora_inicio' => 'required',
                    'cidade' => 'required'
        ]);
    }

}

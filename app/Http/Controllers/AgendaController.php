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

    public function addAgenda(Request $request) {
        $validator = $this->validateForm($request);
        $date = str_replace('/', '-', $request->data);
        $newDate = date("Y-m-d", strtotime($date));
        $createAgenda = Agenda::create([
                    'nome_evento' => $request->nome,
                    'data' => $newDate,
                    'hora_inicio' => $request->hora_ini,
                    'hora_fim' => $request->hora_fim,
                    'cidade' => $request->cidade,
                    'status' => 1
        ]);

        return response()->json($request);
    }

    public function editAgenda(Request $request) {
        $validator = $this->validateForm($request);
        $date = str_replace('/', '-', $request->data);
        $newDate = date("Y-m-d", strtotime($date));
        $updateAgenda = Agenda::where("id_agenda", "=", $request->id_agenda)->update([
            'nome_evento' => $request->nome,
            'data' => $newDate,
            'hora_inicio' => $request->hora_ini,
            'hora_fim' => $request->hora_fim,
            'cidade' => $request->cidade,
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
                    'data' => 'required',
                    'hora_fim' => 'required',
                    'hora_ini' => 'required',
                    'cidade' => 'required'
        ]);
    }

}

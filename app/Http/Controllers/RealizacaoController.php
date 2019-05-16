<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Realizacao;

class RealizacaoController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function pageRealizacao() {
        $realizacoes = Realizacao::where('status', '=', '1')->get();
        return view('admin.realizacao', compact('realizacoes'));
    }
    
    public function addRealizacao(Request $request) {
        $validator = $this->validateForm($request);

        $createRealizacao = Realizacao::create([
                    'nome_realizacao' => $request->nome,
                    'status' => 1
        ]);

        return response()->json($request);
    }

    public function editRealizacao(Request $request) {
        $validator = $this->validateForm($request);
        $updateRealizacao = Realizacao::where("id_realizacao", "=", $request->id_realizacao)->update([
            "nome_realizacao" => $request->nome
        ]);
        return response()->json($request);
    }

    public function deleteRealizacao(Request $request) {
        $updateRealizacao = Realizacao::where("id_realizacao", "=", $request->id_realizacao)->update([
            "status" => 0
        ]);
        return response()->json($request);
    }

    public function validateForm(Request $request) {
        return $this->validate($request, [
                    'nome' => 'required|regex:/^[a-zA-ZçÇáéíóúÁÉÍÓÚ0-9 ]+$/u|max:255|',
        ]);
    }

}

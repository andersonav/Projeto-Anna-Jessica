<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Apoio;

class ApoioController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function pageApoio() {
        $apoios = Apoio::get();
        return view('admin.apoio', compact('apoios'));
    }

    public function addApoio(Request $request) {
        $validator = $this->validateForm($request);

        $createApoio = Apoio::create([
                    'nome_apoio' => $request->nome,
                    'status' => 1
        ]);

        return response()->json($request);
    }

    public function editApoio(Request $request) {
        $validator = $this->validateForm($request);
        $updateApoio = Apoio::where("id_apoio", "=", $request->id_apoio)->update([
            "nome_apoio" => $request->nome
        ]);
        return response()->json($request);
    }

    public function validateForm(Request $request) {
        return $this->validate($request, [
                    'nome' => 'required|regex:/^[a-zA-ZçÇáéíóúÁÉÍÓÚ0-9 ]+$/u|max:255|',
        ]);
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patrocinio;

class PatrocinioController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function pagePatrocinio() {
        $patrocinios = Patrocinio::where('status', '=', '1')->get();
        return view('admin.patrocinio', compact('patrocinios'));
    }

    public function addPatrocinio(Request $request) {
        $validator = $this->validateForm($request);

        $createPatrocinio = Patrocinio::create([
                    'nome_patrocinio' => $request->nome,
                    'status' => 1
        ]);

        return response()->json($request);
    }

    public function editPatrocinio(Request $request) {
        $validator = $this->validateForm($request);
        $updatePatrocinio = Patrocinio::where("id_patrocinio", "=", $request->id_patrocinio)->update([
            "nome_patrocinio" => $request->nome
        ]);
        return response()->json($request);
    }

    public function deletePatrocinio(Request $request) {
        $updatePatrocinio = Patrocinio::where("id_patrocinio", "=", $request->id_patrocinio)->update([
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Parceiro;

class ParceiroController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function pageParceiro() {
        $parceiros = Parceiro::where('status', '=', '1')->get();
        return view('admin.parceiro', compact('parceiros'));
    }

    public function addParceiro(Request $request) {
        $validator = $this->validateForm($request);
        $image = $request->file('file');
        $name = $image->getClientOriginalName();
        $destinationPath = public_path('img/parceiros');
        $image->move($destinationPath, $name);

        $createParceiro = Parceiro::create([
                    'imagem_parceiro' => $name,
                    "descricao_parceiro" => $request->nome,
                    'status' => 1
        ]);

        return response()->json($request);
    }

    public function editParceiro(Request $request) {
        $validator = $this->validateForm($request);
        $image = $request->file('file');
        $name = $image->getClientOriginalName();
        $destinationPath = public_path('img/parceiros');
        $image->move($destinationPath, $name);
        $updateParceiro = Parceiro::where("id_parceiro", "=", $request->id_parceiro)->update([
            "imagem_parceiro" => $name,
            "descricao_parceiro" => $request->nome
        ]);
        return response()->json($request);
    }

    public function deleteParceiro(Request $request) {
        $updateParceiro = Parceiro::where("id_parceiro", "=", $request->id_parceiro)->update([
            "status" => 0
        ]);
        return response()->json($request);
    }

    public function validateForm(Request $request) {
        return $this->validate($request, [
                    'file' => 'required|mimes:png,jpeg,jpg,gif|max:2048',
                    'nome' => 'required|regex:/^[a-zA-ZçÇáéíóúÁÉÍÓÚ0-9 ]+$/u|max:255|'
        ]);
    }

}

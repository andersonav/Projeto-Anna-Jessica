<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use App\Anuncio;

class AnuncioController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function pageAnuncio() {
        $anuncios = Anuncio::where('status', '=', '1')->get();
        return view('admin.anuncio', compact('anuncios'));
    }

    public function addAnuncio(Request $request) {
        $validator = $this->validateForm($request);
        $image = $request->file('file');
        $name = $image->getClientOriginalName();
        $destinationPath = public_path('img/anuncios');
        $image->move($destinationPath, $name);

        $createAnuncio = Anuncio::create([
                    'imagem' => $name,
                    'status' => 1
        ]);

        return response()->json($request);
    }

    public function editAnuncio(Request $request) {
        $validator = $this->validateForm($request);
        $image = $request->file('file');
        $name = $image->getClientOriginalName();
        $destinationPath = public_path('img/anuncios');
        $image->move($destinationPath, $name);
        $updateAnuncio = Anuncio::where("id_anuncio", "=", $request->id_anuncio)->update([
            "imagem" => $name
        ]);
        return response()->json($request);
    }

    public function deleteAnuncio(Request $request) {
        $updateAnuncio = Anuncio::where("id_anuncio", "=", $request->id_anuncio)->update([
            "status" => 0
        ]);
        return response()->json($request);
    }

    public function validateForm(Request $request) {
        return $this->validate($request, [
                    'file' => 'required|mimes:png,jpeg,jpg,gif|max:2048',
        ]);
    }

}

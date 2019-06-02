<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use App\Anuncio;
use DB;

class AnuncioController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function pageAnuncio()
    {
        $anuncios = Anuncio::where('status', '=', '1')
            ->join('classificacao_anuncio', 'id_classificacao_anuncio', '=', 'classificacao_id_classificacao')
            ->get();
        $classificacoes = DB::table('classificacao_anuncio')->get();
        return view('admin.anuncio', compact('anuncios', 'classificacoes'));
    }

    public function addAnuncio(Request $request)
    {
        $validator = $this->validateForm($request);
        $resultAnuncio = DB::table('anuncio')->where('classificacao_id_classificacao', '=', $request->classificacao)
            ->where("status", '=', 1)
            ->count();
        if ($resultAnuncio < 5) {
            $image = $request->file('file');
            $name = $image->getClientOriginalName();
            $destinationPath = public_path('img/anuncios');
            $image->move($destinationPath, $name);

            $createAnuncio = Anuncio::create([
                'imagem' => $name,
                'classificacao_id_classificacao' => $request->classificacao,
                'status' => 1
            ]);
        } else {
            $array['errors'] = ['errors' => 'O máximo de 5 anúncios por essa classificação já foi suportado. Por favor exclua um anúncio referente a classificação ou edite!'];
            return response()->json($array, 500);
        }

        //
        return response()->json($request);
    }

    public function editAnuncio(Request $request)
    {

        $validator = $this->validateFormEdit($request);
        if ($request->file != null) {
            $image = $request->file;
            $name = $image->getClientOriginalName();
            $destinationPath = public_path('img/anuncios');
            $image->move($destinationPath, $name);
            $updateAnuncio = Anuncio::where("id_anuncio", "=", $request->id_anuncio)->update([
                "imagem" => $name
            ]);
        } else {
            $resultAnuncio = DB::table('anuncio')->where('id_anuncio', '=', $request->id_anuncio)
                ->where("status", '=', 1)->get();
            if ($resultAnuncio[0]->classificacao_id_classificacao == $request->classificacao) {
                $updateAnuncio = Anuncio::where("id_anuncio", "=", $request->id_anuncio)->update([
                    'classificacao_id_classificacao' => $request->classificacao,
                ]);
            } else {
                $resultAnuncioT = DB::table('anuncio')->where('classificacao_id_classificacao', '=', $request->classificacao)
                    ->where("status", '=', 1)
                    ->count();
                if ($resultAnuncioT < 5) {
                    $updateAnuncio = Anuncio::where("id_anuncio", "=", $request->id_anuncio)->update([
                        'classificacao_id_classificacao' => $request->classificacao,
                    ]);
                } else {
                    $array['errors'] = ['errors' => 'O máximo de 5 anúncios por essa classificação já foi suportado. Por favor exclua um anúncio referente a classificação ou edite!'];
                    return response()->json($array, 500);
                }
            }
        }


        return response()->json($request);
    }

    public function deleteAnuncio(Request $request)
    {
        $updateAnuncio = Anuncio::where("id_anuncio", "=", $request->id_anuncio)->update([
            "status" => 0
        ]);
        return response()->json($request);
    }

    public function validateForm(Request $request)
    {
        return $this->validate($request, [
            'file' => 'required|mimes:png,jpeg,jpg,gif|max:2048',
        ]);
    }

    public function validateFormEdit(Request $request)
    {
        return $this->validate($request, [
            'classificacao' => 'required|max:255',
        ]);
    }
}

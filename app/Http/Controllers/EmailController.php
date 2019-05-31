<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmailController extends Controller
{

    public function token(Request $request)
    {
        $token = base64_decode($request->token);
        $ativar = DB::table('usuario')->where('email', $token)->update(array(
            'ativo_usuario' => 1,
        ));

        return redirect('')->with('confirmado', 'confirmado');
    }
}

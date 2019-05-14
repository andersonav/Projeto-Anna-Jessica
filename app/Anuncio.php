<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anuncio extends Model {

    protected $table = 'anuncio';
    protected $guarded = [];

    CONST CREATED_AT = 'data_de_criacao';
    CONST UPDATED_AT = 'data_de_atualizacao';

}

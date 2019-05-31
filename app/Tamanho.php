<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tamanho extends Model {

    protected $table = "tamanho";
    protected $guarded = [];

    CONST CREATED_AT = 'data_de_criacao';
    CONST UPDATED_AT = 'data_de_atualizacao';

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Realizacao extends Model {

    protected $table = "realizacao";
    protected $guarded = [];

    CONST CREATED_AT = 'data_de_criacao';
    CONST UPDATED_AT = 'data_de_atualizacao';

}

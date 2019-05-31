<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model {

    protected $table = "evento";
    protected $guarded = [];

    CONST CREATED_AT = 'data_de_criacao';
    CONST UPDATED_AT = 'data_de_atualizacao';

}

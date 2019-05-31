<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kit extends Model {

    protected $table = "kit_evento";
    protected $guarded = [];

    CONST CREATED_AT = 'data_de_criacao';
    CONST UPDATED_AT = 'data_de_atualizacao';

}

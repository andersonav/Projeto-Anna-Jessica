<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model {

    protected $table = "agenda";
    protected $guarded = [];

    CONST CREATED_AT = 'data_de_criacao';
    CONST UPDATED_AT = 'data_de_atualizacao';

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parceiro extends Model {

    protected $table = "parceiro";
    protected $guarded = [];

    CONST CREATED_AT = 'data_de_criacao';
    CONST UPDATED_AT = 'data_de_atualizacao';

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apoio extends Model {

    protected $primaryKey = "id_apoio";
    protected $table = "apoio";
    protected $guarded = [];

    CONST CREATED_AT = 'data_de_criacao';
    CONST UPDATED_AT = 'data_de_atualizacao';

}

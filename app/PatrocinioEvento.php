<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatrocinioEvento extends Model {

    protected $table = "patrocinio_evento";
    protected $guarded = [];

    CONST CREATED_AT = 'data_criacao';
    CONST UPDATED_AT = 'data_atualizacao';

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model {

    protected $table = "link_evento";
    protected $guarded = [];

    CONST CREATED_AT = 'data_de_criacao';
    CONST UPDATED_AT = 'data_de_atualizacao';

}

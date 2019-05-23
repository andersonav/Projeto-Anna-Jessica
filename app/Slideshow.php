<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slideshow extends Model {

    protected $table = 'slideshow';
    protected $guarded = [];

    CONST CREATED_AT = 'data_de_criacao';
    CONST UPDATED_AT = 'data_de_atualizacao';

}

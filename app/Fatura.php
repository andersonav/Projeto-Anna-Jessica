<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fatura extends Model
{
    //
    protected $primaryKey = "id";
    protected $table = "fatura";
    protected $guarded = [];

    CONST CREATED_AT = 'data_de_criacao';
    CONST UPDATED_AT = 'data_de_atualizacao';


}

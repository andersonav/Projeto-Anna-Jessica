<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\ResetPassword;

class User extends Authenticatable {

    use Notifiable;

    protected $table = 'usuario';
    protected $primaryKey = 'id_usuario';

    const CREATED_AT = 'data_de_criacao';
    const UPDATED_AT = 'data_de_atualizacao';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function sendPasswordResetNotification($token) {
        $this->notify(new ResetPassword($token));
    }

}

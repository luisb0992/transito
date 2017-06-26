<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable 
{
    use Notifiable;

    protected $table = 'users';

    protected $fillable = [
        'cedula','name','ape','perfil_id','email', 'direccion','password','status',
    ];

    //----------> Relaciones <---------//
    public function perfil(){
        return $this->belongsTo('App\Perfil','perfil_id');
    }


    public function namePerfil(){
        return $this->perfil->name;
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

   
}

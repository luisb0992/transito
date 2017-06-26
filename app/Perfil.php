<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    protected $table = 'perfiles';

    protected $fillable = ['name'];

    public function users(){
    	return $this->hasMany('App\User2');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table = 'personas';

    protected $fillable = [
    	'ci_rif',
    	'name',
    	'ape',
    	'direccion',
    	'email'
    ];

    //definiendo relaciones
    public function conductores(){
    	return $this->hasMany('App\Conductor');
    }

    public function propietarios(){
    	return $this->hasMany('App\Propietario');
    }

}

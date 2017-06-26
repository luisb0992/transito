<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Propietario extends Model
{
    protected $table = 'propietarios';

    protected $fillable = ['persona_id'];

//------------- definiendo relaciones ----------------//
    public function vehiculos(){
    	return $this->hasMany('App\Vehiculo');
    }

    public function persona(){
        return $this->belongsTo('App\Persona','persona_id');
    }


    //obtener nombre y ape del propietario
    public function namePropietario(){
        return $this->persona->name.' '.$this->persona->ape.' - C:I/RIF: '.$this->persona->ci_rif;
    }

}

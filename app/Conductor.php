<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conductor extends Model
{
    protected $table = 'conductores';

    protected $fillable = ['persona_id'];

    // definiendo relaciones
    public function conductores_vehiculos(){
        return $this->hasMany('App\VehiculoConductor');
    }

    public function vehiculos(){
        return $this->belongsToMany('App\Vehiculo','vehiculos_conductores');
    }

    public function persona(){
        return $this->belongsTo('App\Persona','persona_id');
    }

    public function conductorActual(){
        return $this->hasmany('App\ConductorActual');
    }

    //obtener nombre y ape del conductor
    public function nameConductor(){
    	return $this->persona->name.' '.$this->persona->ape;
    }

    // obteniendo el status desde la vista hacia el modelo
    public function statusActual($conductor_id, $vehiculo_id){

        $data = ConductorActual::where('vehiculo_id',$vehiculo_id)
                                ->where('conductor_id',$conductor_id)->get();

        $status = '';
        foreach ($data as $valor) {
            $status = $valor->status;
        }
        return $status;
    }
}

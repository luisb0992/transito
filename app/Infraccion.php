<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Infraccion extends Model
{
    protected $table = 'infracciones';

    protected $fillable = ['user_id','vehiculo_id','razon','conductor_id'];

    public function forCreated(){
        $created = $this->created_at;
        $newcreated = date('d-m-Y',strtotime(str_replace('/', '-', $created)));
        return $newcreated;
    }

    //definiendo relaciones
    public function users(){
    	return $this->belongsTo('App\User2','user_id');
    }

    public function vehiculo(){
        return $this->belongsTo('App\Vehiculo','vehiculo_id');
    }

    public function conductor(){
        return $this->belongsTo('App\Conductor','conductor_id');
    }

    //nombre del usuario
    public function nameUser(){
    	return $this->users->name." ".$this->users->ape;
    }

    //vehiculo
    public function datosVehiculo(){
        return $this->vehiculo->placa;
    }

     //conductor
    public function datosConductor(){
        return $this->conductor->persona->name.' '.$this->conductor->persona->ape;
    }

    public static function vehiculoActual($conductor_id){
        return ConductorActual::where('conductor_id','=',$conductor_id)->value('vehiculo_id');
    }
}

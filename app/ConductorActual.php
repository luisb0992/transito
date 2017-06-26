<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConductorActual extends Model
{
    protected $table = 'conductores_actuales';

    protected $fillable = [
    	'conductor_id','vehiculo_id','status'
    ];

    // ------------relaciones
    public function conductor(){
    	return $this->belongsTo('App\Conductor','conductor_id');
    }

    public function vehiculo(){
    	return $this->belongsTo('App\Vehiculo','vehiculo_id');
    }

    //buscar y comprobar si el registro existe
    public static function existeData($conductor_id, $vehiculo_id){
    	return ConductorActual::where('vehiculo_id',$vehiculo_id)
    							->orWhere('conductor_id',$conductor_id)->get();
    }

    //eliminar el registro si existe
    public static function deleteData($conductor_id, $vehiculo_id){
    	return ConductorActual::where('vehiculo_id',$vehiculo_id)
    							->orWhere('conductor_id',$conductor_id)->delete();
    }

    //registro de nuevos datos
    public static function saveData($conductor_id, $vehiculo_id){
    	$query = ConductorActual::create([
                    'conductor_id' => $conductor_id,
                    'vehiculo_id' => $vehiculo_id,
                    'status' => 1,
                ]);
    	return $query;
    }
}

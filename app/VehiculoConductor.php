<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VehiculoConductor extends Model
{
    protected $table = 'vehiculos_conductores';

    protected $fillable = [
    	'vehiculo_id',
    	'conductor_id'
    ];

    //relaciones .............
    public function conductores(){
        return $this->hasMany('App\Conductor');
    }

    public function vehiculos(){
        return $this->hasMany('App\Vehiculo');
    }

    public static function vehiculosCount($vehiculo_id){
    	return VehiculoConductor::where("vehiculo_id", $vehiculo_id)->count();
    }

    public static function conductoresCount($conductor_id){
    	return VehiculoConductor::where("conductor_id", $conductor_id)->count();
    }

    public static function vehiculoConductor($vehiculo_id, $conductor_id){
        return VehiculoConductor::where('vehiculo_id','=',$vehiculo_id)
                                ->where('conductor_id','=',$conductor_id)
                                ->count();
    }

    public function status(){
        $status = $this->conductor_actual;

        if ($status == 1) {
            $status = 'Conductor Actual';
        }else{
            $status = '';
        }
        return $status;
    }


}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    protected $table = 'vehiculos';

    protected $fillable = ['placa','serial','marca_id',
    'color_id','año','capacidad','propietario_id',
    'operadora_id','status_vehiculo_id','created_at','updated_at'];


// -------- definiendo relaciones -----------//
    public function propietarios(){
    	return $this->belongsTo('App\Propietario','propietario_id');
    }

    public function marcas(){
    	return $this->belongsTo('App\Marca','marca_id');
    }

    public function colores(){
    	return $this->belongsTo('App\Color','color_id');
    }

    public function operadora(){
        return $this->belongsTo('App\Operadora','operadora_id');
    }  

    public function vehiculos_conductores(){
        return $this->hasMany('App\VehiculoConductor');
    }

    public function conductores(){
        return $this->belongsToMany('App\Conductor','vehiculos_conductores');
    }

    public function statusVehiculo(){
        return $this->belongsTo('App\StatusVehiculo','status_vehiculo_id');
    }

    public function infraccion(){
        return $this->hasMany('App\Infraccion');
    }

    // ------------ mostrando status -------------//
    public function nameStatus(){
        return $this->statusVehiculo->name;
    }
//------------------mostrando marcas-------------//
    public function nameMarca(){
        return $this->marcas->name;
    }   

//------------------ mostrando colores -------------//
    public function nameColor(){
        return $this->colores->name;
    }

//------------------ mostrando operadoras -------------//
    public function nameOperadora(){
        return $this->operadora->name;
    } 
              
    // conversion del formato de creacion y actualizacion del registro
    public function forcreated(){
        $created = $this->created_at;
        $newcreated = date('d-m-Y',strtotime(str_replace('/', '-', $created)));
        return $newcreated;
    }

    public function forUpdated(){
        $updated = $this->updated_at;
        $newupdated = date('d-m-Y',strtotime(str_replace('/', '-', $updated)));
        return $newupdated;
    }
    // fin de la conversion
    
    //vehiculos adcritos el dia anterior
    public static function vehiculosAyer(){
        $date = date('d') - 1;
        return Vehiculo::latest()->whereDay('created_at', $date)->count();
    }

    //vehiculos adcritos el dia actual
    public static function vehiculosActual(){
        $date = date('d');
        return Vehiculo::latest()->whereDay('created_at', $date)->count();
    }

    // select dependiente
    public static function dropdownVehiculo($id){
        return Vehiculo::where('operadora_id',$id)->get();
    }
}

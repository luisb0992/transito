<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bitacora extends Model
{
    protected $table = 'bitacoras';

    protected $fillable = [
    	'user_id','registro_id','tabla','accion'
    ];

    //registro para user_id
    public static function userAuth(){
    	if (\Auth::check()) {
    		return \Auth::user()->id;
    	}else{
    		return 999;
    	}
    }

    public function users(){
    	return $this->belongsTo('App\User2','user_id');
    }

    //nombre completo del usuario
    public function username(){
    	return $this->users->name.' '.$this->users->ape;
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

    // accion referenciada
    public function accion(){
    	$accion = $this->accion;
    	if ($accion == 'CREAR') {
    		$accion = "CREACION";
    	}else{
    		$accion = "EDICION";
    	}
    	return $accion;
    }

    //datos de los registros
    public function data(){
        $id = $this->registro_id;
        $tabla = $this->tabla;
        $datos = '';

        if ($tabla == 'conductor') {
             $datos = Persona::where('id','=',$id)->get();
         }elseif ($tabla == 'propietario') {
             $datos = Persona::where('id','=',$id)->get();
         }elseif ($tabla == 'usuarios') {
             $datos = User2::where('id','=',$id)->get();
         }elseif($tabla == 'operadoras') {
             $datos = Operadora::where('id','=',$id)->get();
         }elseif ($tabla == 'rutas') {
             $datos = Ruta::where('id','=',$id)->get();
         }elseif ($tabla == 'marcas') {
             $datos = Marca::where('id','=',$id)->get();
         }elseif ($tabla == 'colores') {
             $datos = Color::where('id','=',$id)->get();
         }elseif($tabla == 'vehiculos') {
            $datos = Vehiculo::where('id','=',$id)->get();
        }

         return $datos;
    }

    public static function conductores($conductor_id){    

        $conductor = Conductor::where('id',$conductor_id)->value('persona_id');

        $persona = Persona::where('id',$conductor)->get();

        return $persona;

    }

    public static function vehiculos($vehiculo_id){
        $vehiculo = Vehiculo::where('id',$vehiculo_id)->get();

        return $vehiculo;
    }

    //------------------ metodos contadores ----------------//
    //bitacora de hoy
    public static function today(){
        $date = date('d');
        return Bitacora::latest()->whereDay('created_at', $date)->count();
    }

    //total vehiculos
    public static function totalVehiculos(){
        return Vehiculo::count();
    }

    //total vehiculos
    public static function totalOperadoras(){
        return Operadora::count();
    }

    //total conductores
    public static function totalConductores(){
        return Conductor::count();
    }

    //total conductores
    public static function totalPropietarios(){
        return Propietario::count();
    }

    //bitacora save data
    public static function saveData($registro_id, $tabla, $accion){
        $bitacora = Bitacora::create([
                    'user_id' => Bitacora::userAuth(),
                    'registro_id' => $registro_id,
                    'tabla' => $tabla,
                    'accion' => $accion
                ]);

        return $bitacora;
    }
}

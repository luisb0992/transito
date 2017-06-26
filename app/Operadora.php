<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operadora extends Model
{
    protected $table = 'operadoras';

    protected $fillable = ['name','tipo_id','rif_ope','representante','ci_rif'];

//------------- definiendo relaciones -------//
	public function vehiculos(){
		return $this->hasMany('App\Vehiculo','operadora_id');
	}

	public function tiposOperadoras(){
		return $this->belongsTo('App\TipoOperadora','tipo_id');
	}

	public function rutas(){
		return $this->hasMany('App\Ruta');
	}

//---------- obteniendo name ----------------//
	public function nameTipo(){
		return $this->tiposOperadoras->name;
	}	  

//---------- obteniendo name ----------------//
	public function nameRuta(){
		return $this->ruta->name;
	}

	public function forCreated(){
        $created = $this->created_at;
        $newcreated = date('d-m-Y',strtotime(str_replace('/', '-', $created)));
        return $newcreated;
    }


}

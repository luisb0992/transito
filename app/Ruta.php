<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ruta extends Model
{
    protected $table = 'rutas';

    protected $fillable = ['descripcion','status','name','operadora_id'];

    //------------- definiendo relaciones -------//
	public function operadora(){
		return $this->belongsTo('App\Operadora','operadora_id');
	}

    public function c_rutas(){
        return $this->hasMany('App\CoordenadaRuta');
    }

	//------------- mostrando status -------------//
    public function nameStatus(){
        if ($this->status == 1) {
            $this->status = 'Activo';
        }else{
            $this->status = 'Inactivo';
        }

        return $this->status;
    }
}

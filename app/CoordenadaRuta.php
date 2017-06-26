<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CoordenadaRuta extends Model
{
    protected $table = 'coordenadas_rutas';

    protected $fillable = ['ruta_id','longitud','latitud'];

    public function rutas(){
    	return $this->belongsTo('App\Ruta','ruta_id');
    }
}

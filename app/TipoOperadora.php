<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoOperadora extends Model
{
    protected $table = 'tipos_operadoras';

    protected $fillable = ['name'];

//------ definiendo relaciones -------/////
    public function operadoras(){
    	return $this->hasMany('App\Operadora');
    }
}

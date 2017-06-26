<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User2 extends Model
{
    protected $table = 'users';

    protected $fillable = [
        'cedula','name','ape','perfil_id','email', 'direccion','password','status',
    ];

//---------------> Relaciones <---------//
    public function perfiles(){
        return $this->belongsTo('App\Perfil','perfil_id');
    }

    public function infracciones(){
        return $this->hasMany('App\Infraccion');
    }


// ------------- nombre de los perfiles ----------//
    public function namePerfil(){
        return $this->perfiles->name;
    }


//--------- nombres de los status ------///
    public function statusName(){
        $status = $this->status;
        if ($status == 1) {
            $status = 'Activo';
        }else{
            $status = 'Inactivo';
        }

        return $status;
    }

//---- scope para validar los selects perfil y status -------///
    public function scopeType($query, $type){

        $tipos = config('select.perfil_id');

        if ($type != "" && isset($tipos[$type])) {
            $query->where('perfil_id', $type);
        }
    }

    public function scopeStatus($query, $type){

        $status = config('select.status');

        if ($type != "" && isset($status[$type])) {
            $query->where('status', $type);
        }
    }
}

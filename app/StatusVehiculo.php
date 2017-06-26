<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusVehiculo extends Model
{
    protected $table = 'status_vehiculos';

    protected $fillable = [
    	'name'
    ];
}

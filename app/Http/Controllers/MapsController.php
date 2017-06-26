<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cornford\Googlmapper\Facades\MapperFacade as Mapper;
use App\Ruta;
use App\CoordenadaRuta;

class MapsController extends Controller
{
    public function googleMaps($id){

    $ruta = CoordenadaRuta::where('ruta_id','=',$id)->get();
	Mapper::map(10.1826608,-67.4702165,[
                'zoom' => 15, 
                'overlay' => '', 
                'type' => 'HIBRID',
                'marker' => false,
                'eventBeforeLoad' => 'cargando...'])
    ->polyline([
                ['latitude' => 10.1841529, 'longitude' => -67.4735172],
                ['latitude' => 10.1855201, 'longitude' => -67.4618386],
                ['latitude' => 10.1865347, 'longitude' => -67.4571034],
                ['latitude' => 10.1852154, 'longitude' => -67.4569782],
                ['latitude' => 10.1852509, 'longitude' => -67.4569782],
                ['latitude' => 10.1610575, 'longitude' => -67.4447092],
                ['latitude' => 10.1751789, 'longitude' => -67.4419663],
                ['latitude' => 10.1610575, 'longitude' => -67.4477092],
                ['latitude' => 10.1751789, 'longitude' => -67.4419663],
                ['latitude' => 10.1790834, 'longitude' => -67.4460637],
                ['latitude' => 10.1754644, 'longitude' => -67.4475927],
                ['latitude' => 10.1841371, 'longitude' => -67.4546578],
                ['latitude' => 10.1861441, 'longitude' => -67.4606654],
                ['latitude' => 10.1841529, 'longitude' => -67.4735172]],
                ['strokeColor' => '#6966DB', 
                 'strokeOpacity' => 1, 
                 'strokeWeight' => 2, 
                 'editable' => 'true']);

	    return view('maps.index');
    }
}

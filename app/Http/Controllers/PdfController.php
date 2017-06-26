<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vehiculo;
use App\Infraccion;

class PdfController extends Controller
{
    public function pdf($id){

    	$vehiculo = Vehiculo::with('operadora','propietarios','statusVehiculo')->find($id);
    	$dateitem = 'vehiculo'.' '.$id.date('d-m-Y-h:i:s');
    	//renderisar la vista a la cual hace referencia el pdf
		$pdf = \PDF::loadView('pdfs.vehiculo', 
                        array('vehiculo' => $vehiculo));

		return $pdf->setPaper('a4','landScape')->stream($dateitem.'.pdf');
    }

    public function infraccion($id){

    	$infraccion = Infraccion::with('vehiculo.operadora','vehiculo.propietarios')->find($id);
    	$dateitem = 'infraccion'.' '.$id.date('d-m-Y-h:i:s');
    	//renderisar la vista a la cual hace referencia el pdf
		$pdf = \PDF::loadView('pdfs.infraccion', 
                        array('infraccion' => $infraccion));

		return $pdf->setPaper('a4','landScape')->stream($dateitem.'.pdf');
    }
}

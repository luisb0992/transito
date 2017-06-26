<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vehiculo;
use App\Operadora;
use App\Infraccion;
use App\Bitacora;

class BusquedaController extends Controller
{
    public function filtroVehiculo(Request $request){

    	 $this->validate($request, [
            'from' =>'required',
            'to' =>'required',
            'operadora' => 'required'
            ]);
    	$from = $request->from;
    	$to = $request->to; 
    	$operadoras = Operadora::all();
        $desde = date('Y-m-d 00:00:00',strtotime(str_replace('/', '-', $request->from)));
        $hasta = date('Y-m-d 23:59:59',strtotime(str_replace('/', '-', $request->to)));

        $vehiculos = Vehiculo::where('operadora_id','=',$request->operadora)
        			->whereBetween('created_at',[$desde, $hasta])->get();

        $count = count($vehiculos);


         return view('vehiculos.indexb',
                    ['vehiculos' => $vehiculos,
                    'count' => $count,
                    'operadoras' => $operadoras,
                    'from' => $from,
                    'to' => $to
                    ]);
    }

    public function filtroInfraccion(Request $request){

         $this->validate($request, [
            'from' =>'required',
            'to' =>'required'
        ]);

        $from = $request->from;
        $to = $request->to; 
        $infracciones = Infraccion::all();
        $desde = date('Y-m-d 00:00:00',strtotime(str_replace('/', '-', $request->from)));
        $hasta = date('Y-m-d 23:59:59',strtotime(str_replace('/', '-', $request->to)));

        $result = Infraccion::whereBetween('created_at',[$desde, $hasta])->simplePaginate(20);

        $count = count($result);

         return view('infracciones.indexb',
                    ['result' => $result,
                    'count' => $count,
                    'infracciones' => $infracciones,
                    'from' => $from,
                    'to' => $to
                    ]);
    }

     public function filtroBitacora(Request $request){

         $this->validate($request, [
            'from' =>'required',
            'to' =>'required'
        ]);

        $from = $request->from;
        $to = $request->to; 
        $desde = date('Y-m-d 00:00:00',strtotime(str_replace('/', '-', $request->from)));
        $hasta = date('Y-m-d 23:59:59',strtotime(str_replace('/', '-', $request->to)));

        $bitacora = Bitacora::whereBetween('created_at',[$desde, $hasta])->get();

        $count = count($bitacora);

         return view('bitacoras.indexb',
                    ['bitacora' => $bitacora,
                    'count' => $count,
                    'from' => $from,
                    'to' => $to
                    ]);
    }

    public function vehiculos(Request $request,$id){
        if ($request->ajax()) {
            $vehiculos = Vehiculo::dropdownVehiculo($id);
            return response()->json($vehiculos);
        }
    }
}

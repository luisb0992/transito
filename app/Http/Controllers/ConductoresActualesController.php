<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ConductorActual;
use App\Bitacora;

class ConductoresActualesController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $conductor_id = $request->conductor_id;
        $vehiculo_id = $request->vehiculo_id;
        $tabla = 'conductores_actuales';
        $accion = 'CREAR';
        $result = ConductorActual::existeData($conductor_id, $vehiculo_id);
        $query = $result->count();
        
        if ($request->ajax()) {
            if ($query > 0) {
                ConductorActual::deleteData($conductor_id, $vehiculo_id);
                $save = ConductorActual::saveData($conductor_id, $vehiculo_id);

                    if ($save) {
                        return response()->json(['status'=>true, 'message'=>'Se activo correctamente']);
                    }

                }else{
                    $save = ConductorActual::saveData($conductor_id, $vehiculo_id);
                    if ($save) {
                        return response()->json(['status'=>true, 'message'=>'Se activo correctamente']);
                    }
                }
            
        }

        if ($query > 0) {
                ConductorActual::deleteData($conductor_id, $vehiculo_id);
                $save = ConductorActual::saveData($conductor_id, $vehiculo_id);

                if ($save) {
                    \Session::flash('message', 'Conductor Re-asignado como actual');
                    return redirect('vehiculos');
                }else{
                    \Session::flash('error', 'Ocurrio un error');
                    return redirect('vehiculos');
                }
        }else{
                $save = ConductorActual::saveData($conductor_id, $vehiculo_id);
                if ($save) {
                    \Session::flash('message', 'Conductor asignado como actual');
                    return redirect('vehiculos');
                }else{
                    \Session::flash('error', 'Ocurrio un error');
                    return redirect('vehiculos');
                }
        }
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bitacora;

class BitacoraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bitacora = Bitacora::latest('id')->simplePaginate(50);
        $today = Bitacora::today();
        $vehiculos = Bitacora::totalVehiculos();
        $operadoras = Bitacora::totalOperadoras();
        $conductores = Bitacora::totalConductores();
        $propietarios = Bitacora::totalPropietarios();
        $count = $bitacora->count();
        
        return view('bitacoras.index',[
            'bitacora' => $bitacora,
            'count' => $count,
            'today' => $today,
            'vehiculos' => $vehiculos,
            'operadoras' => $operadoras,
            'conductores' => $conductores,
            'propietarios' => $propietarios,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Bitacora::destroy($id);
        \Session::flash('message', 'Eliminado con exito!');
        return redirect('bitacora');
    }
}

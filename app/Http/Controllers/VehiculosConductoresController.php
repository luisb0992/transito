<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VehiculoConductor;
use App\Vehiculo;
use App\Conductor;
use App\Propietario;
use App\Persona;
use App\ConductorActual;

class VehiculosConductoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $vc = VehiculoConductor::all();
        // return view('vehiculos_conductores.index',[
        //     'vc' => $vc
        // ]);  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd($conductor_repetido = VehiculoConductor::find($id)->where('conductor_id','=',$request->conductor_id)->count());
            // if ($conductor_repetido > 0) {

            //     \Session::flash('warning', 'Debe seleccionar otro si quiere reasignar conductores');
            //     return redirect('vehiculos_conductores.edit');

            // }else{

            // $vc = VehiculoConductor::find($id);
            // 
            
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id_c = $request->conductor_id;
        $id_p = $request->pro_id;

        if ($id_c) {
            $vc = Conductor::where('id','=',$id_c)->simplePaginate(10);
            return view('vehiculos_conductores.index_c',[
                'vc' => $vc
            ]);
        }elseif ($id_p) {
            $vp = Vehiculo::where('propietario_id','=',$id_p)->simplepaginate(10);
            return view('vehiculos_conductores.index_p',[
                'vp' => $vp
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vehiculo = Vehiculo::find($id);
        $conductores = Conductor::all();
        return view('vehiculos_conductores.edit',[
            'vehiculo' => $vehiculo,
            'conductores' => $conductores
        ]);  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
        'vehiculo_id' => 'required',
        'conductor_id' => 'required'
        ]);
        $vehiculo_id = $request->vehiculo_id;
        $conductor_id = $request->conductor_id;
        $id_vc = VehiculoConductor::vehiculoConductor($vehiculo_id, $conductor_id);

        if ($id_vc > 0) {

            \Session::flash('error', 'Este vehiculo ya tiene asigando dicho conductor, intente elegir otro');
            return back();

        }else{

            $vc = new VehiculoConductor;
            $vc->vehiculo_id = $vehiculo_id;
            $vc->conductor_id = $conductor_id;

            if ($vc->save()) {
                    \Session::flash('message', 'Asignado con exito!');
                    return redirect('vehiculos');
              }else{
                    \Session::flash('error', 'Sucedio un error!');
                    return redirect('vehiculos_conductores/edit');
              }
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $id_vc = VehiculoConductor::where('conductor_id','=',$request->conductor_id)
                            ->where('vehiculo_id','=',$request->vehiculo_id)->value('id');

        VehiculoConductor::destroy($id_vc);
                            
        \Session::flash('message', 'Conductor Quitado!'); 
        return redirect('vehiculos');
    }
}

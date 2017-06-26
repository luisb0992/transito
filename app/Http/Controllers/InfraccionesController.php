<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Infraccion;
use App\User2;
use App\ConductorActual;
use App\Operadora;

class InfraccionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $infracciones = Infraccion::latest('id')->simplePaginate(20);

        return view('infracciones.index',[
            'infracciones' => $infracciones
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $infracciones = new Infraccion;
        $conductores = ConductorActual::all();

        return view('infracciones.create',[
            'infracciones' => $infracciones,
            'conductores' => $conductores
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'conductor_id' => 'required|integer',
            'razon' => 'required'

        ]);
        $conductor_id = $request->conductor_id;

        $infracciones = new Infraccion;
        $conductor_id = $request->conductor_id;
        $infracciones->user_id = \Auth::user()->id;
        $infracciones->conductor_id = $request->conductor_id;
        $infracciones->vehiculo_id = Infraccion::vehiculoActual($conductor_id);
        $infracciones->razon = strtoupper($request->razon);

        if ($infracciones->save()) {
            \Session::flash('message','Infraccion Añadida');
            return redirect('infracciones');
        }else{
            \Session::flash('error','ocurrio un problema!');
            return redirect('infracciones.create');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Infraccion::destroy($id);
        \Session::flash('message', 'Eliminado con exito!');
        return redirect('infracciones');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ruta;
use App\CoordenadaRuta;

class CoordenadasRutasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        //
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
        if ($id) {
            $rutas = Ruta::find($id);
            $coordenadas_rutas = new CoordenadaRuta;
            return view('coordenadas_rutas.edit',[
                'rutas' => $rutas,
                'coordenadas_rutas' => $coordenadas_rutas
            ]);
        }else{
            \Session::flash('error', 'Ruta No existente');
            return redirect('rutas');
        }
        
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
        $cr = new CoordenadaRuta;
        $cr->ruta_id = $request->ruta_id;
        $cr->longitud = $request->longitud;
        $cr->latitud = $request->latitud;

        if ($cr->save()) {
            \Session::flash('message', 'añadido con exito!');
            return redirect('rutas');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

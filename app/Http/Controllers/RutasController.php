<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ruta;
use App\CoordenadaRuta;
use App\Operadora;
use App\Bitacora;

class RutasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rutas = Ruta::with('c_rutas')->latest('id')->simplePaginate(10);
        return view('rutas.index',['rutas' => $rutas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rutas = new Ruta;
        $operadoras = Operadora::all();
        return view('rutas.create',['rutas' => $rutas,'operadoras' => $operadoras]);
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
        'name' => 'required|max:255',
        'operadora_id' => 'required',
        'status' => 'required'
        ]);


        if (Ruta::where('name','=', $request->name)->value('name')) {
            \Session::flash('warning','este nombre ya fue tomado, ingrese otro');
            return redirect('rutas/create');
        }else{
            $rutas = new Ruta;
            $rutas->name = strtoupper($request->name);
            $rutas->descripcion = $request->descripcion;
            $rutas->operadora_id = $request->operadora_id;
            $rutas->status = $request->status;
            $rutas->save();

            $bitacora = Bitacora::create([
                'user_id' => Bitacora::userAuth(),
                'registro_id' => $rutas->id,
                'tabla' => 'rutas',
                'accion' => 'CREAR'
            ]);
            \Session::flash('message','creado con exito!');
            return redirect('rutas');
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
        $ruta = Ruta::find($id);
        return view('rutas.show',['ruta' => $ruta]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rutas = Ruta::find($id);
        $operadoras = Operadora::all();
        return view('rutas.edit',['rutas' => $rutas, 'operadoras' => $operadoras]);
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
        'name' => 'required|max:255',
        'status' => 'required'
        ]);

        $rutas = Ruta::find($id);

        $rutas->name = strtoupper($request->name);
        $rutas->descripcion = $request->descripcion;
        $rutas->operadora_id = $request->operadora_id;
        $rutas->status = $request->status;

        if ($rutas->save()) {
            $bitacora = Bitacora::create([
                'user_id' => Bitacora::userAuth(),
                'registro_id' => $rutas->id,
                'tabla' => 'rutas',
                'accion' => 'EDITAR'
            ]);
            \Session::flash('message','actualizado con exito!');
            return redirect('rutas');
        }else{
            \Session::flash('error','hubo un error!');
            return redirect('rutas/edit');
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
        Ruta::destroy($id);
        \Session::flash('message', 'Eliminado con exito!');
        return redirect('rutas');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Persona;
use App\Vehiculo;
use App\Propietario;
use App\Conductor;
use App\Bitacora;

class PersonasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personas = Persona::with('propietarios','conductores')->latest('id')->simplePaginate(50);
        // with(['vehiculos' => function($query){
        //     $query->latest('id')->simplePaginate(10);
        // }])
        

        return view('personas.index', ['personas' => $personas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $personas = new Persona;

        return view('personas.create',
            ['personas' => $personas]);
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
            'ape' => 'required|max:255',
            'tipo' => 'required|in:1,2',
            'ci_rif' => 'required|numeric'
            ]);

        $personas = new Persona;
        $personas->name = strtoupper($request->name);
        $personas->ape = strtoupper($request->ape);
        $personas->ci_rif = $request->ci_rif;
        $personas->email = strtoupper($request->email);
        $personas->direccion = strtoupper($request->direccion);

        if ($personas->save()) {
                if ($request->tipo == 1) {
                    $propietario = new Propietario;
                    $propietario->persona_id = $personas->id;
                    $propietario->save();

                    $bitacora = Bitacora::create([
                        'user_id' => Bitacora::userAuth(),
                        'registro_id' => $personas->id,
                        'tabla' => 'propietario',
                        'accion' => 'CREAR'
                    ]);

                }else{
                    $conductor = new Conductor;
                    $conductor->persona_id = $personas->id;
                    $conductor->save();
                    $bitacora = Bitacora::create([
                        'user_id' => Bitacora::userAuth(),
                        'registro_id' => $personas->id,
                        'tabla' => 'conductor',
                        'accion' => 'CREAR'
                    ]); 
                }
                \Session::flash('message', 'creado!');
                return redirect('personas');
          }else{
                \Session::flash('error', 'Sucedio un error!');
                return redirect('personas.create');
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
        $personas = Persona::find($id);

        return view('personas.show',['personas' => $personas]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $personas = Persona::find($id);
        return view("personas.edit",["personas" => $personas]);
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
            'ape' => 'required|max:255',
            'ci_rif' => 'required|numeric'
            ]);

        $personas = Persona::find($id);
        $personas->name = strtoupper($request->name);
        $personas->ape = strtoupper($request->ape);
        $personas->ci_rif = $request->ci_rif;
        $personas->email = strtoupper($request->email);
        $personas->direccion = strtoupper($request->direccion);

        if ($personas->save()) {
                \Session::flash('message', 'editado!');
                return redirect('personas');
                $bitacora = Bitacora::create([
                    'user_id' => Bitacora::userAuth(),
                    'registro_id' => $personas->id,
                    'tabla' => 'c/p',
                    'accion' => 'EDITAR'
                ]);
          }else{
                \Session::flash('error', 'Sucedio un error!');
                return redirect('personas.edit');
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
        try {
            if(Persona::destroy($id)){
                \Session::flash('message', 'Eliminado con exito!');
                return redirect('personas');
            }
        } catch (\Illuminate\Database\QueryException $e) {
            \Session::flash('error', 'No puede eliminar personas que tienen asignado vehiculos');
             return redirect('personas');
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Marca;
use App\Bitacora;

class MarcasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marcas = Marca::simplePaginate(20);

        return view('marcas.index',['marcas' =>$marcas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $marcas = new Marca;

        return view('marcas.create',['marcas' => $marcas]);
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
            'name' => 'required|unique:marcas|max:255'

            ]);
        $marcas = new Marca;
        $query = Marca::where('name','=',$request->name)->value("name");
        
        if ($query) {
            \Session::flash('warning','marca existente! pruebe con otra');
            return redirect('marcas.create');
          }else{
                $marcas->name = strtoupper($request->name);
                $marcas->save();
                $bitacora = Bitacora::create([
                    'user_id' => Bitacora::userAuth(),
                    'registro_id' => $marcas->id,
                    'tabla' => 'marcas',
                    'accion' => 'CREAR'
                ]);
                \Session::flash('message', 'creado con exito!');
                return redirect('marcas');
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
        
        try {
            if(Marca::destroy($id)){
                \Session::flash('message', 'Eliminado con exito!');
                return redirect('marcas');
            }
        } catch (\Illuminate\Database\QueryException $e) {
            \Session::flash('error', 'No puede eliminar marcas asignadas a un vehiculo');
             return redirect('marcas');
        }

    }
}

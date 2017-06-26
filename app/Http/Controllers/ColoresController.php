<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Color;
use App\Bitacora;

class ColoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colores = Color::simplePaginate(20);

        return view('colores.index',['colores' =>$colores]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $colores = new Color;

        return view('colores.create',['colores' => $colores]);
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
        $colores = new Color;
        $query = Color::where('name','=',$request->name)->value("name");
        if($query){
            \Session::flash('warning', 'color existente! pruebe con otro');
            return redirect('colores/create');
        }else{
                $colores->name = strtoupper($request->name);
                $colores->save();
                
                $bitacora = Bitacora::create([
                    'user_id' => Bitacora::userAuth(),
                    'registro_id' => $colores->id,
                    'tabla' => 'colores',
                    'accion' => 'CREAR'
                ]);

                \Session::flash('message', 'Color Creado!');
                return redirect('colores');
  
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
            if(Color::destroy($id)){
                \Session::flash('message', 'Eliminado con exito!');
                return redirect('colores');
            }
        } catch (\Illuminate\Database\QueryException $e) {
            \Session::flash('error', 'No puede eliminar colores asignados a un vehiculo');
             return redirect('colores');
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use App\Operadora;
use App\Vehiculo;
use App\TipoOperadora;
use App\Ruta;
use App\Bitacora;

class OperadoraController extends Controller
{

    private $route;

    public function __construct(Route $route)
    {
        $this->route = $route;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $operadoras = Operadora::with('vehiculos')
        ->latest('id')
        ->simplePaginate(10);

        return view('operadoras.index',[
                    "operadoras" => $operadoras
        ]);                        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $operadoras = new Operadora;
        $tipos = TipoOperadora::all();
        $vehiculos = Vehiculo::all();

        return view('operadoras.create',
            ['operadoras' => $operadoras,
            'tipos' => $tipos,
            'vehiculos' => $vehiculos
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
        'name' => 'required|max:255',
        'tipo_id' => 'required',
        'rif_ope' => 'required',
        'representante' => 'required|max:255',
        'ci_rif' => 'required|numeric|unique:operadoras,ci_rif',
        ]);
        $operadoras = new Operadora;
        $operadoras->name = strtoupper($request->name);
        $operadoras->tipo_id = $request->tipo_id;
        $operadoras->rif_ope = $request->rif_ope;
        $operadoras->representante = strtoupper($request->representante);
        $operadoras->ci_rif = $request->f_cedula.' - '.$request->ci_rif;

        if ($operadoras->save()) {
                $bitacora = Bitacora::create([
                    'user_id' => Bitacora::userAuth(),
                    'registro_id' => $operadoras->id,
                    'tabla' => 'operadoras',
                    'accion' => 'CREAR'
                ]);
                \Session::flash('message', 'Creado con exito!');
                return redirect('operadoras');
          }else{
                \Session::flash('error', 'Sucedio un error!');
                return redirect('operadoras.create');
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
        $operadora = Operadora::with(['vehiculos' => function($query){
            $query->latest('id')->simplePaginate(50);
        }])->find($id);

        return view('operadoras.show',[
                    "operadora" => $operadora
        ]);    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $operadoras = Operadora::find($id);
        $tipos = TipoOperadora::all();
        $vehiculos = Vehiculo::all();
        return view("operadoras.edit",
            ["operadoras" => $operadoras,
            'tipos' => $tipos,
            'vehiculos' => $vehiculos
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
        'name' => 'required|max:255',
        'tipo_id' => 'required',
        'rif_ope' => 'required',
        'representante' => 'required|max:255',
        'ci_rif' => 'required|numeric|unique:operadoras,ci_rif,'.$this->route->parameter('operadora'),
        ]);
        $operadoras = Operadora::find($id);
        $operadoras->name = strtoupper($request->name);
        $operadoras->tipo_id = $request->tipo_id;
        $operadoras->rif_ope = $request->rif_ope;
        $operadoras->representante = strtoupper($request->representante);
        $operadoras->ci_rif = $request->ci_rif;

        if ($operadoras->save()) {
                $bitacora = Bitacora::create([
                    'user_id' => Bitacora::userAuth(),
                    'registro_id' => $operadoras->id,
                    'tabla' => 'operadoras',
                    'accion' => 'EDITAR'
                ]);
                \Session::flash('message', 'Actualizado con exito!');
                return redirect('operadoras');
          }else{
                \Session::flash('error', 'Sucedio un error!');
                return redirect('operadoras.edit');
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
            if(Operadora::destroy($id)){
                \Session::flash('message', 'Eliminado con exito!');
                return redirect('operadoras');
            }
        } catch (\Illuminate\Database\QueryException $e) {
            \Session::flash('error', 'No puede eliminar operadoras que tengan vehiculos asignados');
             return redirect('operadoras');
        }
    }
}

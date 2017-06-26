<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateVehiculoRequest;
use App\Http\Requests\EditVehiculoRequest;
use App\Vehiculo;
use App\Propietario;
use App\Operadora;
use App\Color;
use App\Marca;
use App\StatusVehiculo;
use App\Persona;
use App\VehiculoConductor;
use App\Bitacora;

class VehiculosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $operadoras = Operadora::all();
        $vc = VehiculoConductor::all();
        $vehiculos = Vehiculo::with('propietarios.persona','conductores.persona','colores','marcas','vehiculos_conductores')->latest('id')->simplePaginate(10);
        return view('vehiculos.index',[
            'vehiculos' => $vehiculos,
            'operadoras' => $operadoras,
            'vc' => $vc
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vehiculos = new Vehiculo;
        $marcas = Marca::all();
        $colores = Color::all();
        $propietarios = Propietario::all();
        $operadoras = Operadora::all();
        $status = StatusVehiculo::all();
        //whereNotIn('id',Vehiculo::all('propietario_id'))->

        return view('vehiculos.create',
                    ['vehiculos' => $vehiculos,
                    'marcas' => $marcas,
                    'colores' => $colores,
                    'propietarios' => $propietarios,
                    'operadoras' => $operadoras,
                    'status' => $status]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateVehiculoRequest $request)
    {
        $vehiculos = new Vehiculo;

        $vehiculos->placa = $request->placa;
        $vehiculos->serial = $request->serial;
        $vehiculos->marca_id = $request->marca_id;
        $vehiculos->color_id = $request->color_id;
        $vehiculos->año = $request->año;
        $vehiculos->capacidad = $request->capacidad;
        $vehiculos->propietario_id = $request->propietario_id;
        $vehiculos->operadora_id = $request->operadora_id;
        $vehiculos->status_vehiculo_id = $request->status;

        if ($vehiculos->save()) {
                $bitacora = Bitacora::create([
                    'user_id' => Bitacora::userAuth(),
                    'registro_id' => $vehiculos->id,
                    'tabla' => 'vehiculos',
                    'accion' => 'CREAR'
                ]);
                \Session::flash('message', 'Creado con exito!');
                return redirect('vehiculos');
          }else{
                \Session::flash('error', 'Sucedio un error!');
                return redirect('vehiculos.create');
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
        $vehiculos = Vehiculo::with('marcas','colores','propietarios')->find($id);
        $marcas = Marca::all();
        $colores = Color::all();
        $operadoras = Operadora::all();
        $propietarios = Propietario::all();
        $status = StatusVehiculo::all();
        return view('vehiculos.edit',
                    ['vehiculos' => $vehiculos,
                    'marcas' => $marcas,
                    'colores' => $colores,
                    'operadoras' => $operadoras,
                    'propietarios' => $propietarios,
                    'status' => $status
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditVehiculoRequest $request, $id)
    {
        $vehiculos = Vehiculo::find($id);

        $vehiculos->placa = $request->placa;
        $vehiculos->serial = $request->serial;
        $vehiculos->marca_id = $request->marca_id;
        $vehiculos->color_id = $request->color_id;
        $vehiculos->año = $request->año;
        $vehiculos->capacidad = $request->capacidad;
        $vehiculos->propietario_id = $request->propietario_id;
        $vehiculos->operadora_id = $request->operadora_id;
        $vehiculos->status_vehiculo_id = $request->status;

        if ($vehiculos->save()) {
                $bitacora = Bitacora::create([
                    'user_id' => Bitacora::userAuth(),
                    'registro_id' => $vehiculos->id,
                    'tabla' => 'vehiculos',
                    'accion' => 'EDITAR'
                ]);
                \Session::flash('message', 'Actualizado con exito!');
                return redirect('vehiculos');
          }else{
                \Session::flash('error', 'Sucedio un error!');
                return redirect('vehiculos.edit');
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
            if(Vehiculo::destroy($id)){
                \Session::flash('message', 'Eliminado con exito!');
                return redirect('vehiculos');
            }
        } catch (\Illuminate\Database\QueryException $e) {
            \Session::flash('error', 'No puede eliminar vehiculos que tengan asignado un conductor, debe eliminar su conductor o su propietario');
             return redirect('vehiculos');
        }
    }
}

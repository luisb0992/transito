<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\EditUserRequest;
use App\User2;
use App\Bitacora;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User2::all();

        return view('users.index',['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User2;
        return view('users.create',['user' => $user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
          $users = new User2;

          $users->cedula = $request->cedula;
          $users->name = strtoupper($request->name);
          $users->ape = strtoupper($request->ape);
          $users->email = strtoupper($request->email);
          $users->direccion = strtoupper($request->direccion);
          $users->perfil_id = $request->perfil_id;
          $users->password = bcrypt($request->password);
          $users->status = $request->status;

          if ($users->save()) {
                $bitacora = Bitacora::create([
                    'user_id' => Bitacora::userAuth(),
                    'registro_id' => $users->id,
                    'tabla' => 'usuarios',
                    'accion' => 'CREAR'
                ]);
                \Session::flash('message', 'Usuario creado con exito!');
                return redirect('/users');
          }else{
                \Session::flash('error', 'Sucedio un error!');
                return redirect('users.create');
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
        $user = User2::find($id);
        return view("users.edit",["user" => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditUserRequest $request, $id)
    {
         $users = User2::find($id);

          $users->cedula = $request->cedula;
          $users->name = strtoupper($request->name);
          $users->ape = strtoupper($request->ape);
          $users->email = strtoupper($request->email);
          $users->direccion = strtoupper($request->direccion);
          $users->perfil_id = $request->perfil_id;
          $users->status = $request->status;

          if ($users->save()) {
                $bitacora = Bitacora::create([
                    'user_id' => Bitacora::userAuth(),
                    'registro_id' => $users->id,
                    'tabla' => 'usuarios',
                    'accion' => 'EDITAR'
                ]);
                \Session::flash('message', 'Usuario editado con exito!');
                return redirect('/users');
          }else{
                \Session::flash('error', 'Sucedio un error!');
                return redirect('users.create');
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
        User2::destroy($id);
        \Session::flash('message', 'Eliminado con exito!');
        return redirect('/users');
    }
}

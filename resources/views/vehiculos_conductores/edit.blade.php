@extends('layouts.app')
@section('content')
	@include('partials.index',['index' => 'Asignacion'])
	<div class="container white">
		@include('message.message')
		<div class="h1_padding div-footer"><h3>Asignar Conductor</h3></div>
		@include('vehiculos_conductores.form', ['vehiculo' => $vehiculo, 'url' => '/vehiculo_conductor/'.$vehiculo->id, 'method'=> 'PUT'])
	</div>
@endsection
@extends('layouts.app')
@section('content')
	@include('partials.index',['index' => 'rutas'])
	<div class="container white">
		@include('message.message')
		<div class="h1_padding div-footer"><h3>Realizar Cambios</h3></div>
		@include('rutas.form', ['rutas' => $rutas, 'url' => '/rutas/'.$rutas->id, 'method' => 'PUT'])
	</div>
@endsection
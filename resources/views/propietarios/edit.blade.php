@extends('layouts.app')
@section('content')
	@include('partials.index',['index' => 'propietario'])
	<div class="container white">
		@include('message.message')
		<div class="h1_padding div-footer"><h3>Realizar Cambios</h3></div>
		@include('propietarios.form', ['propietarios' => $propietarios, 'url' => '/propietarios/'.$propietarios->id, 'method' => 'PUT'])
	</div>
@endsection
@extends('layouts.app')
@section('content')
	@include('partials.index',['index' => 'rutas'])
	<div class="container white">
		@include('message.message')
		<div class="h1_padding div-footer"><h3>Nuevo</h3></div>
		@include('rutas.form', ['rutas' => $rutas, 'url' => '/rutas', 'method'=> 'POST'])
	</div>
@endsection
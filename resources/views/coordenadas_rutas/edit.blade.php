@extends('layouts.app')
@section('content')
	@include('partials.index',['index' => 'Coordenadas'])
	<div class="container white">
		@include('message.message')
		@if($rutas->id)
			<div class="h1_padding div-footer"><h3>Agregar coordenadas</h3></div>
			@include('coordenadas_rutas.form', ['coordenadas_rutas' => $coordenadas_rutas, 'url' => '/coordenadas_rutas/'.$rutas->id, 'method' => 'PUT'])
		@else
			<div>
				<h3 class="alert alert-warning">
					<i class="fa fa-warning" aria-hidden="true"></i>
					Ooops! esta ruta no existe 
				</h3>
				<a href="{{ url('/rutas') }}" class="btn-link text-primary pull-right div-padding">VOLVER A RUTAS</a>
			</div>
		@endif
	</div>
@endsection
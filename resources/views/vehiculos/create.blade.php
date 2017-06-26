@extends('layouts.app')
@section('content')
	@include('partials.index',['index' => 'vehiculos'])
	<div class="container white">
		@include('message.message')
		<div class="h1_padding div-footer"><h3>Nuevo</h3></div>
		@include('vehiculos.form', ['vehiculos' => $vehiculos, 'url' => '/vehiculos', 'method'=> 'POST'])
	</div>
@endsection
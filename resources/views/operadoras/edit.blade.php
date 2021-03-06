@extends('layouts.app')
@section('content')
	@include('partials.index',['index' => 'operadoras'])
	<div class="container white">
		@include('message.message')
		<div class="h1_padding div-footer"><h3>Realizar Cambios</h3></div>
		@include('operadoras.form', ['operadoras' => $operadoras, 'url' => '/operadoras/'.$operadoras->id, 'method' => 'PUT'])
	</div>
@endsection
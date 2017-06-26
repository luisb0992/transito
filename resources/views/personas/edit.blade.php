@extends('layouts.app')
@section('content')
<br>
	<div class="container white">
		@include('message.message')
		<div class="h1_padding div-footer"><h3>Realizar Cambios</h3></div>
		@include('personas.form', ['personas' => $personas, 'url' => '/personas/'.$personas->id, 'method' => 'PUT'])
	</div>
@endsection
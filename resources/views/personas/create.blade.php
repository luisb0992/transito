@extends('layouts.app')
@section('content')
<br>
	<div class="container white">
		@include('message.message')
		<div class="h1_padding div-footer"><h3>Nuevo</h3></div>
		@include('personas.form', ['personas' => $personas, 'url' => '/personas', 'method'=> 'POST'])
	</div>
@endsection
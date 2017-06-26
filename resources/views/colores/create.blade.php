@extends('layouts.app')
@section('content')
	@include('partials.index',['index' => 'COLORES'])
	<div class="container white">
		@include('message.message')
		<div class="h1_padding div-footer"><h3>Nuevo Color</h3></div>
		@include('colores.form', ['colores' => $colores, 'url' => '/colores', 'method'=> 'POST'])
	</div>
@endsection
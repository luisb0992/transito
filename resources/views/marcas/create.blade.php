@extends('layouts.app')
@section('content')
	@include('partials.index',['index' => 'MARCAS'])
	<div class="container white">
		@include('message.message')
		<div class="h1_padding div-footer"><h3>Nueva Marca</h3></div>
		@include('marcas.form', ['marcas' => $marcas, 'url' => '/marcas', 'method'=> 'POST'])
	</div>
@endsection
@extends('layouts.app')
@section('content')
	@include('partials.index',['index' => 'infracciones'])
	<div class="container white">
		@include('message.message')
		<div class="h1_padding div-footer"><h3>Nuevo</h3></div>
		@include('infracciones.form', ['infracciones' => $infracciones, 'url' => '/infracciones', 'method'=> 'POST'])
	</div>
@endsection
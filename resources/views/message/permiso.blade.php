@extends('layouts.app')
@section('content')
	@include('partials.index',['index' => 'Acceso Denegado'])
	<div class="container">
		<div class="alert alert-danger text-center">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<h2><i class="fa fa-exclamation-triangle"></i>
			 No tiene permisos para acceder a este modulo</h2>
		</div>
	</div>
@endsection
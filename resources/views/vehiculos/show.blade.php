@extends('layouts.app')

@section('content')
	@include('partials.index',['index' => 'PROPIETARIO DE VEHICULO'])
	<div class="container">
		@include('message.message')
					<div class="row well text-center">
						<div class="col-sm-3">
							<span>{{ $propietario->name }} {{ $propietario->ape }}</span>
						</div>
						<div class="col-sm-3">
							<span>{{ $propietario->cedula }}</span>
						</div>
						<div class="col-sm-3">
							<span>{{ $propietario->nameRif() }}</span>
						</div>
						<div class="col-sm-3">
							<span>Vehiculo asignado</span>
						</div>
					</div>
	</div>
@endsection
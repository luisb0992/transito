@extends('layouts.app')

@section('content')
	@include('partials.index',['index' => 'PROPIETARIO DE VEHICULO'])
	<div class="container">
		@include('message.message')
			<div class="row well text-center">
				
				<table class="table table-bordered">
					<tr class="bg-success">
						<td>
							<div>
								<h3>Datos Personales</h3>
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<div>
								<div class="col-sm-3">
									<p class="list-group-item list-group-item-success">ID</p>
									<p>{{ $propietario->id }}</p>
								</div>
								<div class="col-sm-3">
									<p class="list-group-item list-group-item-success">NOMBRE COMPLETO</p>
									<p>{{ $propietario->name }} {{ $propietario->ape }}</p>
								</div>
								<div class="col-sm-3">
									<p class="list-group-item list-group-item-success">C:I</p>
									<p>{{ $propietario->cedula }}</p>
								</div>
								<div class="col-sm-3">
									<p class="list-group-item list-group-item-success">RIF</p>
									<p>{{ $propietario->nameRif() }}</p>
								</div>
							</div>
						</td>
					</tr>
				</table>

					<div class="text-right">
						<a href="{{ url('/vehiculos') }}" class="btn btn-link">
						Listado de Vehiculos
						</a>
					</div>
				</div>
	</div>
@endsection
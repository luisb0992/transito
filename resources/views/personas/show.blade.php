@extends('layouts.app')

@section('content')
	@include('partials.index',['index' => 'C/P'])
	<div class="container white">
		@include('message.message')
			<div class="row text-center">
				
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
							<div class="row text-peque">
								<div class="col-sm-4">
									<p class="list-group-item list-group-item-heading text-success">NOMBRE COMPLETO</p>
									<p class="list-group-item list-group-item-heading">{{ $personas->name }} {{ $personas->ape }}</p>
								</div>
								<div class="col-sm-4">
									<p class="list-group-item list-group-item-heading text-success">C:I/RIF</p>
									<p class="list-group-item list-group-item-heading">{{ $personas->ci_rif }}</p>
								</div>

								<div class="col-sm-4">
									<p class="list-group-item list-group-item-heading text-success">EMAIL</p>
									<p class="list-group-item list-group-item-heading">
										@if($personas->email == '')
											VACIO
										@else
											{{ $personas->email }}
										@endif
									</p>			
								</div>
								<div class="col-sm-4">
									<p class="list-group-item list-group-item-heading text-success">DIRECCION</p>
									<p class="list-group-item list-group-item-heading">
										@if($personas->direccion == '')
												VACIO
										@else
											<em>{{ $personas->direccion }}</em>
										@endif	
									</p>
								</div>
								<div class="col-sm-4">
									<p class="list-group-item list-group-item-heading text-success">REGISTRADO</p>
									<p class="list-group-item list-group-item-heading">{{ $personas->created_at }}</p>
								</div>
								<div class="col-sm-4">
									<p class="list-group-item list-group-item-heading text-success">ULTIMA VES ACTUALIZADO</p>
									<p class="list-group-item list-group-item-heading">{{ $personas->updated_at }}</p>
								</div>
							</div>
						</td>
					</tr>
				</table>
					<div class="">
						<a href="{{ url('/vehiculos') }}" class="btn btn-link pull-left">
						<span class="text-primary">Listado de Vehiculos</span>
						</a>
						<a href="{{ url('/personas') }}" class="btn btn-link pull-right">
						<span class="text-primary">Listado de Conductores - Propietarios</span>
						</a>
					</div>
				</div>
	</div>
	<br>
@endsection
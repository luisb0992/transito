@extends('layouts.app')

@section('content')
	@include('partials.index',['index' => 'propietarios'])
	<div class="container">
		@include('message.message')

		<!--................iteraciones de los datos.........................-->

				@foreach($propietarios as $propietario)
					<div class="row well text-center">
						<div class="bg-success">
							<div class="div-padding"><h3>Datos personales</h3></div>
						</div><br>
						<div class="col-sm-4">
							<p class="text-uppercase list-group-item list-group-item-heading">Nombre completo</p>
							<p>{{ $propietario->name }} {{ $propietario->ape }}</p>
						</div>
						<div class="col-sm-4">
							<p class="text-uppercase list-group-item list-group-item-heading">C.I</p>
							<p>{{ $propietario->cedula }}</p>
						</div>
						<div class="col-sm-4">
							<p class="text-uppercase list-group-item list-group-item-heading">RIF</p>
							<p>{{ $propietario->nameRif() }}</p>
						</div>

		<!--....................... iteraciones de los datos del vehiculo.....................-->
						@if(count($propietario->vehiculos) > 0)
						<div class="col-sm-12 table-responsive">
						<table class="table table-bordered">
							<thead>
								<tr class="bg-success">
									<td colspan="10">
										<h4>
											Vehiculos 
											<span class="label label-default">{{ count($propietario->vehiculos) }}</span>
										</h4>	
									</td>
								</tr>
								<tr class="bg-success">
									<td>PLACA</td>
									<td>SERIAL</td>
									<td>MARCA</td>
									<td>COLOR</td>
									<td>AÑO</td>
									<td>CAPACIDAD</td>
									<td>CONDUCTOR ACTUAL</td>
									<td>STATUS</td>
								</tr>
							</thead>
							<tbody>
								@foreach($propietario->vehiculos as $vehiculo)

								@if(($vehiculo->status) == 0)
								<tr class="danger">
								@endif
									<td>{{ $vehiculo->placa }}</td8>
								
									<td>{{ $vehiculo->serial }}</td>
								
									<td>{{ $vehiculo->nameMarca() }}</td>
								
									<td>{{ $vehiculo->nameColor() }}</td>
								
									<td>{{ $vehiculo->año }}</td>
								
									<td>{{ $vehiculo->capacidad }} Pasajeros</td>

									<td>{{ $vehiculo->chofer }}</td>

									<td>{{ $vehiculo->nameStatus() }}</td>
									
								</tr>
								@endforeach
							</tbody>
						</table>
						</div>
						@else
							@include('partials.no_vehiculo')
						@endif


				<!--......................botonera................................-->

						<div class="col-sm-12 div-footer-botonera">
							<div class="col-sm-10 col-xs-6">
								<a href="{{ url('/propietarios/'.$propietario->id.'/edit') }}" class="btn btn-warning">
									<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
									EDITAR
								</a>
							</div>
							<div class="col-sm-2 col-xs-6">@include('propietarios.delete', ['propietarios' => $propietarios])</div>
						</div>
					</div>
				@endforeach<!-- fin de las iteraciones.....-->

	<!--.................. footer y boton crear...........................-->				
		<div class="div-padding pull-left">
			<span>{{ $propietarios->links() }}</span>
		</div>
		<div class="floating-bot">
			<a href="{{ url('/propietarios/create') }}" class="btn btn-fab text-right">
				<button class="btn btn-primary btn-fab">
						<i class="fa fa-plus" aria-hidden="true"></i>
				</button>
			</a>
		</div>
	</div><!-- fin del contenedor....->
@endsection
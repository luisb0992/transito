@extends('layouts.app')
@section('content')
	@include('partials.index',['index' => 'ope/vehiculos'])
	<div class="container">
		@include('message.message')
<!-- .........................inicio de la iteracion de los datos.....................-->
					
<!-- ............ vehiculos adscritos en la ope ...............-->
		@if( count($operadora->vehiculos) > 0)
		<div class="gris text-primary">
			<div class="panel-heading text-center">
				<span class="size_letra">{{ $operadora->name }}</span>
				<br>
				<em>RIF {{ $operadora->rif_ope }}</em> - <em>{{ $operadora->nameTipo() }}</em>
			</div>
		</div>
		<div class="table-responsive table">
		<table class="table table-bordered text-peque text-center">
			<caption class="text-center gris">
				<h5 class="text-negrita">
					Vehiculos Adscritos <span class="badge_personal">{{ count($operadora->vehiculos) }}</span>
				</h5>
			</caption>
			<thead>		
				<tr>
					<td>PLACA</td>
					<td>SERIAL</td>
					<td>MARCA</td>
					<td>COLOR</td>
					<td>AÑO</td>
					<td>CAPACIDAD</td>
					<td>STATUS</td>
					<td>CONDUCTOR(ES)</td>
					<td>PROPIETARIO</td>
					<td>REPORTE</td>
				</tr>
			</thead>
			<tbody>
				@foreach($operadora->vehiculos as $vehiculo)

				@if(($vehiculo->status_vehiculo_id) == 2 or ($vehiculo->status_vehiculo_id) == 4)
				<tr class="danger">
				@elseif(($vehiculo->status_vehiculo_id) == 3 or ($vehiculo->status_vehiculo_id) == 5)
				<tr class="warning">
				@endif

					<td>{{ $vehiculo->placa }}</td8>
				
					<td>{{ $vehiculo->serial }}</td>
				
					<td>{{ $vehiculo->nameMarca() }}</td>
				
					<td>{{ $vehiculo->nameColor() }}</td>
				
					<td>{{ $vehiculo->año }}</td>
				
					<td>{{ $vehiculo->capacidad.' '.'Pasaj'}}</td>

					<td>{{ $vehiculo->nameStatus() }}</td>
					
					<td>
						@if(count($vehiculo->conductores)>0)
							<div class="dropdown">
							<span class="badge">{{ count($vehiculo->conductores) }}</span>
								 <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                	VER <span class="caret"></span>
                            	</a>
								<ul class="dropdown-menu">
									@foreach($vehiculo->conductores as $conductor)
										<li class="list-group-item-heading text-info">
											<a href="{{ url('/personas/'.$conductor->persona->id) }}">
											{{ $conductor->persona->name }}
											</a>
										</li>
									@endforeach
								</ul>
							</div>
						@else
							<span>Ninguno Asignado</span>
						@endif
					</td>
					<td>
						<a href="{{ url('/personas/'.$vehiculo->propietarios->persona->id) }}" class="text-info">
							{{ $vehiculo->propietarios->persona->name }}
						</a>
					</td>

					<td>
						<a href="{{ url('vehiculos/pdf/'.$vehiculo->id) }}" class="text-danger btn-link" id="pdf" target="_blank">
							PDF
						</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		</div><!-- cierre de tabla responsive-->
		@else
			@include('partials.no_vehiculo')	
		@endif
		<div class="">
			<a href="{{ url('/operadoras') }}" class="btn-link text-primary gris">
				<span>Listado de Operadoras</span>
			</a>
		</div>

<!--.............. footer y boton de creacion .............-->
		<div class="floating-bot">
			<a href="{{ url('/operadoras/create') }}" class="btn btn-fab text-right">
				<button class="btn btn-primary btn-fab">
						<i class="fa fa-plus" aria-hidden="true"></i>
				</button>
			</a>
		</div>
	</div><!-- Fin del contenedor -->
@endsection
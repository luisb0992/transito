@extends('layouts.app')
@section('content')
	@include('partials.index',['index' => 'infracciones'])
	<div class="container">
		@include('message.message')

<!-- .........................inicio de la iteracion de los datos..................... -->
					<div class="text-peque text-center table table-bordered gris">
						@include('partials.form_fecha_infraccion',['url' => '/busquedainfraccion', 'method' => 'POST'])
					</div>
					@if(count($infracciones) > 0)
					<div class="alert alert-success">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<span class="badge_personal">{{ $count }}</span> 
						RESULTADOS ENCONTRADOS DESDE 
						<span>{{ $from }}</span> HASTA 
						<span>{{ $to }}</span>
					</div>	
					<div class="table table-responsive">
						<table class="table table-bordered" id="datatable">
							<thead>
								<tr class="bg-success text-center">
									<td>VEHICULO</td>
									<td>CONDUCTOR ACTUAL</td>
									<td>RAZON</td>
									<td>CREADO POR</td>
									<td>FECHA</td>
									<td>REPORTE</td>
								</tr>
							</thead>
							<tbody>
								@foreach($infracciones as $infraccion)
								<tr>
									<td class="text-center">{{ $infraccion->datosVehiculo() }}</td>

									@if(count($infraccion->conductor_id) > 0)
									<td class="text-center">{{ $infraccion->datosConductor() }}</td>
									@else
									<td class="text-center">Ninguno Asignado</td>
									@endif

									<td class="text-justify">{{ $infraccion->razon }}</td>

									<td class="text-center">{{ $infraccion->nameUser() }}</td>
								
									<td>{{ $infraccion->forCreated() }}</td>

									<td class="text-center">
										<a href="{{ url('infracciones/pdf/'.$infraccion->id) }}" class="text-danger btn-link" id="pdf" target="_blank">
											PDF
										</a>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
					@endif
					

<!--............................... footer y boton de creacion......... ..................-->
		<div class="pull-left">
			<span>{{ $result->links() }}</span>
		</div>
		<div class="floating-bot">
			<a href="{{ url('/infracciones/create') }}" class="btn btn-fab text-right">
				<button class="btn btn-primary btn-fab">
						<i class="fa fa-plus" aria-hidden="true"></i>
				</button>
			</a>
		</div>


	</div><!-- Fin del contenedor -->


@endsection					
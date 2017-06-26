@extends('layouts.app')
@section('content')
	@include('partials.index',['index' => 'C/P'])
	<div class="container">
		@include('message.message')
		@if(count($personas) > 0)
		<!--................iteraciones de los datos.........................-->
				<div class="">
					<div class="panel-heading gris">
						<h3 class="text-center text-primary">
							CONDUCTORES - PROPIETARIOS
						</h3>
					</div>
				</div>	
					<div>
						<div class="table table-responsive">
							<table class="table table-bordered text-peque" id="datatable">
								<thead>
									<tr class="gris text-uppercase text-center">
										<td><b>TIPO</b></td>
										<td><b>NOMBRE Y APELLIDO</b></td>
										<td><b>CI/RIF</b></td>
										<td><b>EMAIL</b></td>
										<td><b>DIRECCION</b></td>
										<td><b>Cant. vehiculos</b></td>
										<td colspan="2"><b>ACCIONES</b></td>
									</tr>
								</thead>
								<tbody>
									@foreach($personas as $persona) 
									<tr>
										<!-- mostrar tipo de persona -->
										@foreach($persona->conductores as $conductor)
											@if($conductor->persona_id)
												<td class="bg-info text-center">Conductor</td>
											@endif		
										@endforeach
										@foreach($persona->propietarios as $pro)
											@if($pro->persona_id)
												<td class="text-center bg-success">Propietario</td>
											@endif		
										@endforeach

										<!-- datos personales -->
										<td class="gris_claro">
										<a href="{{ url('/personas/'.$persona->id) }}" class="btn-link text-primary">
											{{ $persona->name }} {{ $persona->ape }}
										</a>
										</td>
										<td class="gris_claro">{{ $persona->ci_rif}}</td>
										<td class="gris_claro">
											@if($persona->email == '')
												VACIO
											@else
												{{ $persona->email }}
											@endif		
										</td>
										<td class="gris_claro">
											@if($persona->direccion == '')
												VACIO
											@else
												<em>{{ $persona->direccion }}</em>
											@endif		
										</td>

										<!-- contador de vehiculos para cada persona-->
										@foreach($persona->propietarios as $pro)
										<td class="success text-center text-success">
											<span class="badge">{{count($pro->vehiculos)}}</span>
											@if(count($pro->vehiculos) > 0)
											{!! Form::open(['url' => '/vehiculo_conductor', 'method' => 'POST']) !!}
												<input type="hidden" name="pro_id" value="{{ $pro->id }}">
												<input type="submit" value="ver" class="btn-link text-primary">
											{!! Form::close() !!}
											@endif
										</td>
										@endforeach
										@foreach($persona->conductores as $conductor)
										<td class="bg-info text-center text-primary">
											<span class="badge">{{count($conductor->vehiculos)}}</span>
											@if(count($conductor->vehiculos) > 0)
											{!! Form::open(['url' => '/vehiculo_conductor', 'method' => 'POST']) !!}
												<input type="hidden" name="conductor_id" value="{{ $conductor->id }}">
												<input type="submit" value="ver" class="btn-link text-primary">
											{!! Form::close() !!}
											@endif
										</td>
										@endforeach

										<!-- editar y eliminar registros-->
										<td class="text-center">
										<p></p>
										<div>
											<a href="{{ url('/personas/'.$persona->id.'/edit') }}" class="btn-warning" style="padding: 12px;">
												<i class="fa fa-pencil-square-o" aria-hidden="true"></i> EDITAR
											</a>
										</div>	
										</td>
									</tr>
									@endforeach<!-- fin de las iteraciones.....-->
								</tbody>
							</table>
							</div>
						</div>
					
				

	<!--.................. footer y boton crear...........................-->				
		<div class="pull-left">
			<span>{{ $personas->links() }}</span>
		</div>
		@endif
		<div class="floating-bot">
			<a href="{{ url('/personas/create') }}" class="btn btn-fab text-right">
				<button class="btn btn-primary btn-fab">
						<i class="fa fa-plus" aria-hidden="true"></i>
				</button>
			</a>
		</div>
	</div>
@endsection

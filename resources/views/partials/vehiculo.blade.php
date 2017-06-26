
<!--............... header del vehiculo .................-->
<table class="table table-striped text-center" id="datatable">
	<thead>
		<tr class="gris">
			<td>
				<h4 class="">
				<span class="pull-left text-uppercase">
					<span class="text-success">Propietario:</span> 
					<a href="{{ url('/personas/'.$vehiculo->propietarios->persona->id) }}" class="text-negrita">
					<i class="fa fa-user"></i>
					{{ $vehiculo->propietarios->persona->name }} {{ $vehiculo->propietarios->persona->ape }}
					</a>
				</span>
				<a href="{{ url('vehiculos/pdf/'.$vehiculo->id) }}" class="text-danger btn-link pull-right text-peque" id="pdf" target="_blank">
					IMPRIMIR PDF
				</a>
				</h4>
			</td>
		</tr>
	</thead>

	<!--................... contenido del vehiculo................-->
	<tbody>
	<tr class="text-peque">	
		<td>
			<div class="row">
				<div class="col-sm-12">
						<p class="list-group-item list-group-item-heading">
							<span class="text-success">PERTENECE A:</span> {{ $vehiculo->operadora->name }}
						</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3">
					<p class="list-group-item list-group-item-heading text-uppercase text-success">Placa</p>
					<p class="list-group-item list-group-item-heading">{{ $vehiculo->placa }}</p>
				</div>
				<div class="col-sm-3">
					<p class="list-group-item list-group-item-heading text-uppercase text-success">Serial</p>
					<p class="list-group-item list-group-item-heading">{{ $vehiculo->serial }}</p>
				</div>
				<div class="col-sm-3">
					<p class="list-group-item list-group-item-heading text-uppercase text-success">Marca</p>
					<p class="list-group-item list-group-item-heading">{{ $vehiculo->marcas->name }}</p>
				</div>
				<div class="col-sm-3">
					<p class="list-group-item list-group-item-heading text-uppercase text-success">Color</p>
					<p class="list-group-item list-group-item-heading">{{ $vehiculo->colores->name }}</p>
				</div>
			</div>
			<br>
			<div class="row">	
				<div class="col-sm-3">
					<p class="list-group-item list-group-item-heading text-uppercase text-success">Año</p>
					<p class="list-group-item list-group-item-heading">{{ $vehiculo->año }}</p>
				</div>
				<div class="col-sm-3">
					<p class="list-group-item list-group-item-heading text-uppercase text-success">Capacidad</p>
					<p class="list-group-item list-group-item-heading">{{ $vehiculo->capacidad }} puestos</p>
				</div>
				<div class="col-sm-3">
					<p class="list-group-item list-group-item-heading text-uppercase text-success">Fecha U/A</p>
					<p class="list-group-item list-group-item-heading">{{ $vehiculo->forUpdated() }}</p>
				</div>
				<div class="col-sm-3">
					<p class="list-group-item list-group-item-heading text-uppercase text-success">Status</p>
					@if(($vehiculo->status_vehiculo_id) == 2 or ($vehiculo->status_vehiculo_id) == 4)
						<p class="list-group-item list-group-item-heading text-danger">
						{{ $vehiculo->nameStatus() }}
						</p>
					@elseif(($vehiculo->status_vehiculo_id) == 3 or ($vehiculo->status_vehiculo_id) == 5)
						<p class="list-group-item list-group-item-heading text-warning">{{ $vehiculo->nameStatus() }}</p>
					@elseif(($vehiculo->status_vehiculo_id) == 1)
						<p class="list-group-item list-group-item-heading text-primary">{{ $vehiculo->nameStatus() }}</p>	
					@endif
				</div>
			</div>
			<br>
			<div class="row">

				<!--....... conductores .......................-->
				<div class="col-sm-12">
					<p class="list-group-item list-group-item-heading text-uppercase text-success">Conductor(es)</p>
						@if( count($vehiculo->conductores) > 0)
						<div class="list-group-item list-group-item-heading text-left">
							<div class="row">
								@foreach($vehiculo->conductores as $conductor)
									@if($conductor->statusActual($conductor->pivot->conductor_id, $conductor->pivot->vehiculo_id) == 1)
									<div class="col-sm-12 col-xs-12 h1_padding div-padding bg-info">
									@else
									<div class="col-sm-12 col-xs-12 h1_padding div-padding gris">
									@endif
										<div class="col-sm-6 div-separator-right">
											<a href="{{ url('/personas/'.$conductor->persona->id) }}" class="btn-link">
											<i class="fa fa-bus"></i>
											{{ $conductor->persona->name }} {{ $conductor->persona->ape }}
											</a>
										</div>

										<div class="col-sm-4 div-separator-right">
											<span class="text-success">STATUS:</span>
											@if($conductor->statusActual($conductor->pivot->conductor_id, $conductor->pivot->vehiculo_id) == 1)
												<span>CONDUCTOR ACTUAL</span>
											@else
												<span>NINGUNO</span>
												<section style="display:none">
													<div class="alert alert-success" id="mensaje">
												    <button type="button" class="close" data-dismiss="alert">&times;</button>
												    conductor activado
												</div>
												</section>
												
												<div class="alert alert-danger" id="mensaje_error" style="display: none;">
												    <button type="button" class="close" data-dismiss="alert">&times;</button>
												    ocurrio un error
												</div>
												{!! Form::open(['url' => 'conductoresactuales', 'method' => 'POST','class' => 'pull-right']) !!}
													<input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
													<input type="hidden" name="vehiculo_id" value="{{ $conductor->pivot->vehiculo_id }}" id="vehiculo">
													<input type="hidden" name="conductor_id" value="{{ $conductor->pivot->conductor_id }}" id="conductor">
													<!-- <a href="" class="btn-link btn-activar" >Activar</a> -->
													<button type="submit" class="btn-link text-primary col-xs-12" onclick="return confirm('Definir como conductor actual? S/N?')">
														<i class="fa fa-check"></i>
														Activar
													</button>
												{!! Form::close() !!}
											@endif
										</div>
			
										<div class="col-sm-2">
										{!! Form::open(['url' => '/vehiculo_conductor/'.$vehiculo->id, 'method' => 'DELETE','class'=>'pull-right']) !!}
											<input type="hidden" name="vehiculo_id" value="{{ $vehiculo->id }}">
											<input type="hidden" name="conductor_id" value="{{ $conductor->id }}">
											<button type="submit" value="" class="text-danger btn-link col-xs-12" onclick="return confirm('Seguro desea quitar este conductor? S/N?')">
												<i class="fa fa-trash" aria-hidden="true"></i>
												Quitar
											</button>
										{!! Form::close() !!}
										</div>
									</div>
								@endforeach
							</div>
							<br>
							<p class="text-right">
								<a href="{{ url('/vehiculo_conductor/'.$vehiculo->id.'/edit') }}" 
									class="text-primary btn-link">
									<i class="fa fa-bus"></i>
									asignar nuevo
								</a>
							</p>
						</div>	
						@else
						<p class="list-group-item list-group-item-heading">
							<a href="{{ url('/vehiculo_conductor/'.$vehiculo->id.'/edit') }}" class="btn-padding btn-link text-primary" style="text-decoration: none;">
								<i class="fa fa-bus"></i>
								Asignar
							</a>
						</p>
						@endif
				</div>	
			</div>
			<div class="col-sm-12 col-xs-12 text-right bg-danger div-footer-botonera">
				<a href="{{ url('/vehiculos/'.$vehiculo->id.'/edit') }}" class="btn btn-warning">
					<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
					EDITAR
				</a>
			</div>
		</td>
	</tr>
	</tbody>
</table><!--..... cierre de la tabla.........-->
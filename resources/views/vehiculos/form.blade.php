{!! Form::open(['url' => $url, 'method' => $method])!!}
	<div class="form-group">
		<label for="">Placa</label>
		{!! Form::text('placa',$vehiculos->placa, ['class' => 'form-control text-uppercase', 'placeholder' => 'Placa...']) !!}
	</div>
	<div class="form-group">
		<label for="">Serial</label>
		{!! Form::text('serial',$vehiculos->serial, ['class' => 'form-control text-uppercase', 'placeholder' => 'Serial...']) !!}
	</div>
	<div class="form-group">
		<label for="">Marca</label>
		<select name="marca_id" class="form-control">
		@if($vehiculos->id)
			<option value="{{ $vehiculos->marcas->id }}">{{ $vehiculos->marcas->name }}</option>
		@endif
			<option value="">Seleccione una Marca...</option>
			@foreach($marcas as $marca)
				<option value="{{ $marca->id }}">{{ $marca->name }}</option>
			@endforeach
		</select>
	</div>
	<div class="form-group">
		<label for="">Color</label>
		<select name="color_id" class="form-control">
			@if($vehiculos->id)
				<option value="{{ $vehiculos->colores->id }}">{{ $vehiculos->colores->name }}</option>
			@endif
			<option value="">Seleccione un Color...</option>
			@foreach($colores as $color)
				<option value="{{ $color->id }}">{{ $color->name }}</option>
			@endforeach
		</select>
	</div>
	<div class="form-group">
		<label for="">Año</label>
		<select name="año" class="form-control">
			@if($vehiculos->id)
				<option value="{{ $vehiculos->año }}">{{ $vehiculos->año }}</option>
			@endif
			<option value="">Seleccione un Año...</option>
			@for($i=1950;$i <= date('Y'); $i++)
				<option value="{{ $i }}">{{ $i }}</option>
			@endfor
		</select>
	</div>
	<div class="form-group">
		<label for="">Capacidad</label>
		<select name="capacidad" class="form-control">
			@if($vehiculos->id)
				<option value="{{ $vehiculos->capacidad }}">{{ $vehiculos->capacidad }}</option>
			@endif
			<option value="">Seleccione la capacidad...</option>
			@for($i=4;$i <= 60; $i++)
				<option value="{{ $i }}">{{ $i }}</option>
			@endfor
		</select>
	</div>

	<div class="form-group">
			<label for="">Status</label>
			<select name="status" class="form-control">
				@if($vehiculos->id)
					<option value="{{ $vehiculos->status_vehiculo_id }}">{{ $vehiculos->nameStatus() }}</option>
				@endif
				<option value="">Seleccione un status...</option>
				@foreach($status as $status_ve)
				<option value="{{ $status_ve->id }}">{{ $status_ve->name }}</option>
				@endforeach
			</select>
		</div>

		<!--............ propietarios  .............-->
		@if(count($propietarios) > 0)
			<div class="text-uppercase div-padding bg-danger">
				<h4>Propietario</h4>
			</div>

			<div class="form-group">
				<label for="">Propietario</label>
				<select name="propietario_id" class="form-control">
					@if($vehiculos->id)
						<option value="{{ $vehiculos->propietario_id }}">{{ $vehiculos->propietarios->namePropietario() }}</option>
					@endif
					<option value="">Seleccione el propietario...</option>
					@foreach($propietarios as $propietario)
						<option value="{{ $propietario->id }}">
							{{ $propietario->namePropietario() }}
						</option>
					@endforeach
				</select>
			</div>
		@else
			<div class="text-uppercase div-padding list-group-item-warning">
				<span>No existen propietarios disponibles...</span>
				<span class="text-right center-block">
					<a href="{{ url('/personas/create') }}" class="btn btn-link">Nuevo propietario</a>
				</span>
			</div>	
		@endif<!-- cierre del if de propietarios-->	

		<!--..................... Operadoras ........................-->
		
		@if(count($operadoras) > 0)
			<div class="text-uppercase div-padding bg-danger">
				<h4>Operadora</h4>
			</div>
			<div class="form-group">
				<label for="">Operadora</label>
				<select name="operadora_id" class="form-control">
					@if($vehiculos->id)
						<option value="{{ $vehiculos->operadora_id }}">{{ $vehiculos->nameOperadora() }}</option>
					@endif
					<option value="">Seleccione la Operadora...</option>
					@foreach($operadoras as $ope)
						<option value="{{ $ope->id }}">{{ $ope->name }}</option>
					@endforeach
				</select>
			</div>
		@else
			<div class="text-uppercase div-padding list-group-item-warning">
				<span>No existen Operadoras disponibles...</span>
				<span class="text-right center-block">
					<a href="{{ url('/operadoras/create') }}" class="btn btn-link">Nueva Operadora</a>
				</span>
			</div>		
		@endif<!-- cierre del if de operadoras -->

		<div class="form-group text-right">
			<a href="{{ url('/vehiculos') }}" class="btn btn-link">Listado de vehiculos</a>
			<input type="submit" value="Registro" class="btn btn-primary btn-raised" id="registro">
		</div>
{!! Form::close() !!}
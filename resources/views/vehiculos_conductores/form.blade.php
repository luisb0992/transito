{!! Form::open(['url' => $url, 'method' => $method])!!}
	<input type="hidden" name="vehiculo_id" value="{{ $vehiculo->id }}">
	<div class="form-group">
		<div class="list-group-item list-group-item-heading">
			<p class="text-center h1_padding"><b>VEHICULO Nº{{ $vehiculo->id }}</b></p> 
			<p class="h1_padding"><b>PLACA:</b> {{ $vehiculo->placa }} </p> 
			<p class="h1_padding"><b>SERIAL:</b> {{ $vehiculo->serial }} </p> 
			<p class="h1_padding"><b>MARCA:</b> {{ $vehiculo->nameMarca() }} </p>
			<p class="h1_padding"><b>COLOR:</b> {{ $vehiculo->nameColor() }} </p>
			<p class="h1_padding"><b>AÑO:</b> {{ $vehiculo->año }} </p>
			<p class="h1_padding"><b>CAPACIDAD:</b> {{ $vehiculo->capacidad }} puestos.</p>
		</div>
	</div>
	@if(count($vehiculo->conductores) > 0)
	<div class="form-group">
		<blockquote>
			<p>CONDUCTOR(ES)</p>
			@foreach($vehiculo->conductores as $conductor) 
				<footer>
					{{ $conductor->persona->name }} {{ $conductor->persona->ape }} - C.I/RIF: {{ $conductor->persona->ci_rif }}
				</footer>
			@endforeach
		</blockquote>
	</div>
	@endif					
					
		
	<div class="form-group">
			@if(count($conductores)>0)
			<select name="conductor_id" class="form-control">
				<option value="">Seleccione un conductor</option>
				@foreach($conductores as $conductor)
					<option value="{{ $conductor->id }}">
						{{ $conductor->persona->name }} {{ $conductor->persona->ape }} - 
						CI/RIF: {{ $conductor->persona->ci_rif }}
					</option>
				@endforeach
			</select>	
			@else
				<blockquote>
					<p>Ningun conductor disponible</p>
				<footer>
					<a href="{{ url('/personas/create') }}" class="btn-padding btn-primary" style="text-decoration: none;">
						Crear
					</a>
				</footer>
				</blockquote>
			@endif
	</div>
	<div class="form-group text-right">
		<a href="{{ url('/vehiculos') }}" class="btn btn-link">Listado de Vehiculos</a>
		<input type="submit" value="Asignar" class="btn btn-primary btn-raised">
	</div>
{!! Form::close() !!}
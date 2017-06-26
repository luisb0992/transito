{!! Form::open(['url' => $url, 'method' => $method])!!}
	<div class="form-group">
		<input type="hidden" name="ruta_id" value="{{ $rutas->id }}">
		<blockquote>
			{{ $rutas->name }}
		</blockquote>
	</div>
	<div class="form-group">
		<label for="">Longitud:</label>
		{!! Form::text('longitud',$coordenadas_rutas->longitud, ['class' => 'form-control text-uppercase', 'placeholder' => 'Indique Longitud...']) !!}
	</div>
	<div class="form-group">
		<label for="">Latitud</label>
		{!! Form::text('latitud',$coordenadas_rutas->latitud, ['class' => 'form-control text-uppercase', 'placeholder' => 'Indique Latitud...']) !!}
	</div>
		<div class="form-group text-right">
			<a href="{{ url('/rutas') }}" class="btn btn-link">Listado de Rutas</a>
			<input type="submit" value="Registro" class="btn btn-primary btn-raised">
		</div>
{!! Form::close() !!}
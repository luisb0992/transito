{!! Form::open(['url' => $url, 'method' => $method])!!}
	<div class="form-group">
		<label for="">Operadora</label>
		<select name="operadora_id" class="form-control">
			@foreach($operadoras as $ope)
			<option value="{{ $ope->id }}">{{ $ope->name }}</option>
			@endforeach
		</select>
	</div>
	<div class="form-group">
		<label for="">Nombre de la Ruta</label>
		{!! Form::text('name',$rutas->name, ['class' => 'form-control text-uppercase', 'placeholder' => 'Nombre de la ruta...']) !!}
	</div>
	<div class="form-group">
		<label for="">Observacion</label>
		{!! Form::textarea('descripcion',$rutas->descripcion, ['class' => 'form-control text-uppercase', 'placeholder' => 'Observaciones...']) !!}
	</div>
	<div class="form-group">
		<label for="">Status</label>
		<select name="status" class="form-control">
			@if($rutas->status)
			<option value="{{ $rutas->status }}">{{ $rutas->nameStatus() }}</option>
			@endif
			<option value="">Seleccione un status...</option>
			<option value="1">Activo</option>
			<option value="0">Inactivo</option>
		</select>
	</div>		
	<div class="form-group text-right">
		<a href="{{ url('/rutas') }}" class="btn btn-link">Listado de rutas</a>
		<input type="submit" value="Registro" class="btn btn-primary btn-raised">
	</div>
{!! Form::close() !!}


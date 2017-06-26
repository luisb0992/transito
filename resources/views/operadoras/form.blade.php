{!! Form::open(['url' => $url, 'method' => $method])!!}
	<div class="form-group">
		<label for="">Nombre de la operadora</label>
		{!! Form::text('name',$operadoras->name, ['class' => 'form-control text-uppercase', 'placeholder' => 'Nombre de la operadora...']) !!}
	</div>
	<div class="form-group">
		<label for="">RIF</label>
		{!! Form::text('rif_ope',$operadoras->rif_ope, ['class' => 'form-control text-uppercase', 'placeholder' => 'RIF de la operadora...']) !!}
	</div>
	<div class="form-group">
		<label for="">Tipo</label>
		<select name="tipo_id" class="form-control">
			@if($operadoras->tipo_id)
				<option value="{{ $operadoras->tipo_id }}">{{ $operadoras->nameTipo() }}</option>
			@endif
			<option value="">Seleccione un tipo de operadora....</option>
			@foreach($tipos as $tipo)
				<option value="{{ $tipo->id }}">{{ $tipo->name }}</option>
			@endforeach
		</select>
	</div>
	<div class="form-group">
		<label for="">Representante</label>
		{!! Form::text('representante',$operadoras->representante, ['class' => 'form-control text-uppercase', 'placeholder' => 'Nombre del representante....']) !!}
	</div>
	<div class="form-group">
		<label for="">Cedula del Representante</label>
		{!! Form::text('ci_rif',$operadoras->ci_rif, ['class' => 'form-control text-uppercase', 'placeholder' => 'Cedula ...']) !!}
	</div>
	<div class="form-group text-right">
		<a href="{{ url('/operadoras') }}" class="btn btn-link">Listado de operadoras</a>
		<input type="submit" value="Registro" class="btn btn-primary btn-raised">
	</div>
{!! Form::close() !!}


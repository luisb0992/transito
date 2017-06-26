{!! Form::open(['url' => $url, 'method' => $method])!!}
	<div class="form-group">
		<label for="">Conductores</label>
		<select name="conductor_id" class="form-control">
			<option value="">Seleccione un conductor</option>
			@foreach($conductores as $conductor)
				<option value="{{ $conductor->conductor_id }}">
					{{ $conductor->conductor->persona->name }} {{ $conductor->conductor->persona->ape }} 
				</option>
			@endforeach
		</select>
	</div>
	<div class="form-group">
		<label for="">Observacion o Razon</label>
		{!! Form::textarea('razon',$infracciones->razon, ['class' => 'form-control text-uppercase', 'placeholder' => 'Describa la infraccion...']) !!}
	</div>
	<div class="form-group text-right">
		<a href="{{ url('/infracciones') }}" class="btn btn-link">Listado de infracciones</a>
		<input type="submit" value="Registro" class="btn btn-primary btn-raised">
	</div>
{!! Form::close() !!}


{!! Form::open(['url' => $url, 'method' => $method])!!}
	<div class="form-group">
		<label for="" class="">Nombre</label>
		{!! Form::text('name',$personas->name, ['class' => 'form-control text-uppercase', 'placeholder' => 'Nombre...']) !!}
	</div>
	<div class="form-group">
		<label for="">Apellido</label>
		{!! Form::text('ape',$personas->ape, ['class' => 'form-control text-uppercase', 'placeholder' => 'Apellido...']) !!}
	</div>
	<div class="form-group">
		<label for="">Cedula</label>
		{!! Form::text('ci_rif',$personas->ci_rif, ['class' => 'form-control text-uppercase', 'placeholder' => 'Cedula o RIF (SOLO NUMEROS)...']) !!}
	</div>
	<div class="form-group">
		<label for="">Email</label>
		{!! Form::text('email',$personas->email, ['class' => 'form-control text-uppercase', 'placeholder' => 'Email (OPCIONAL).....']) !!}
	</div>	
	<div class="form-group">
		<label for="">Direccion</label>
		{!! Form::textarea('direccion',$personas->direccion, ['class' => 'form-control text-uppercase', 'placeholder' => 'Direccion (OPCIONAL).....']) !!}
	</div>
	@if(!$personas->id)
	<div class="form-group">
		<label for="">Tipò de Persona</label>
		<div class="radio check">
			<label for="1">Propietario <input type="radio" name="tipo" value="1" id="1"></label>
			<label for="2">Conductor <input type="radio" name="tipo" value="2" id="2"></label>
		</div>
	</div>
	@endif	
	<div class="form-group text-right">
		<a href="{{ url('/personas') }}" class="btn btn-link">Listado</a>
		<input type="submit" value="Registro" class="btn btn-primary btn-raised" id="registro">
	</div>
{!! Form::close() !!}


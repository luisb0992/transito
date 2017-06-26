{!! Form::open(['url' => $url, 'method' => $method])!!}
	<div class="form-group">
		{!! Form::text('name',$propietarios->name, ['class' => 'form-control text-uppercase', 'placeholder' => 'Nombre...']) !!}
	</div>
	<div class="form-group">
		{!! Form::text('ape',$propietarios->ape, ['class' => 'form-control text-uppercase', 'placeholder' => 'Apellido...']) !!}
	</div>
	<div class="form-group">
		{!! Form::text('cedula',$propietarios->cedula, ['class' => 'form-control text-uppercase', 'placeholder' => 'Cedula...ejemplo:12345678']) !!}
	</div>
	<div class="form-group">
		{!! Form::text('rif',$propietarios->rif, ['class' => 'form-control text-uppercase', 'placeholder' => 'RIF...']) !!}
	</div>		
	<div class="form-group text-right">
		<a href="{{ url('/propietarios') }}" class="btn btn-link">Listado de propietarios</a>
		<input type="submit" value="Registro" class="btn btn-primary">
	</div>
{!! Form::close() !!}


{!! Form::open(['url' => $url, 'method' => $method])!!}
	<div class="form-group">
			<label for="">CEDULA</label>	
			{!! Form::text('cedula',$user->cedula, ['class' => 'form-control text-uppercase', 'placeholder' => 'Cedula (SOLO NUMEROS)...']) !!}
	</div>
	<div class="form-group">
		<label for="">NOMBRE</label>	
		{!! Form::text('name',$user->name, ['class' => 'form-control text-uppercase', 'placeholder' => 'Nombre...']) !!}
	</div>
	<div class="form-group">
		<label for="">APELLIDO</label>
		{!! Form::text('ape',$user->ape, ['class' => 'form-control text-uppercase', 'placeholder' => 'Apellido...']) !!}
	</div>
	<div class="form-group">
		<label for="">DIRRECCION</label>
		{!! Form::textarea('direccion',$user->direccion, ['class' => 'form-control text-uppercase', 'placeholder' => 'Direccion...']) !!}
	</div>
	<div class="form-group">
		<label for="">E-MAIL</label>
		{!! Form::email('email',$user->email, ['class' => 'form-control text-uppercase', 'placeholder' => 'Correo electronico...']) !!}
	</div>

	<!--.......................validacion de password.................-->
	@if(!$user->id)
	<div class="form-group">
		<label for="">CLAVE</label>
		{!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Clave...']) !!}
	</div>
	@else
		<div class="form-group">&nbsp;</div>
	@endif	

	<!--............... validacion para pefil .......-->

	<div class="form-group">
		<label for="">PERFIL</label>
	@if($user->perfil_id)
		<select name="perfil_id" class="form-control text-uppercase">
			@if($user->perfil_id == 1)
				<option value="{{ $user->perfil_id }}">Peril actual: DIRECTOR</option>
			@else
				<option value="{{ $user->perfil_id }}">Peril actual: COORDINADOR</option>
			@endif
            <option value="">Perfil del usuario...</option>
           	<option value="1">DIRECTOR</option>
            <option value="2">COORDINADOR</option>
        </select>
    @else       
		<select name="perfil_id" class="form-control text-uppercase" required>
            <option value="">Perfil del usuario...</option>
            <option value="1">DIRECTOR</option>
            <option value="2">COORDINADOR</option>
        </select>    
	</div>
	@endif

	<!--................validacion para status...............-->

	<br>
	<div class="form-group">
		<label for="">STATUS</label>
		<select name="status" class="form-control text-uppercase">
			@if($user->status)
				@if($user->status == 1)
				<option value="{{ $user->status }}">Status actual: Activo</option>
				@else
				<option value="{{ $user->status }}">Status actual: Inactivo</option>
				@endif
			@endif
            <option value="">Status...</option>
            <option value="1">ACTIVO</option>
            <option value="0">INACTIVO</option>
        </select>    
	</div>

	<div class="form-group text-right">
		<a href="{{ url('/users') }}" class="btn btn-link">Listado de Usuarios</a>
		<input type="submit" value="Registro" class="btn btn-primary btn-raised">
	</div>
{!! Form::close() !!}


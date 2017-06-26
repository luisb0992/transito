{!! Form::open(['url' => $url, 'method' => $method])!!}
			<div class="form-group">
				{!! Form::text('name',$marcas->name, ['class' => 'form-control text-uppercase', 'placeholder' => 'Nombre de la marca...']) !!}
			</div>	
			<div class="form-group text-right">
				<a href="{{ url('/marcas') }}" class="btn btn-link">Listado de Marcas</a>
				<input type="submit" value="Registro" class="btn btn-primary btn-raised">
			</div>
{!! Form::close() !!}


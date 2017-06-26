{!! Form::open(['url' => $url, 'method' => $method])!!}
			<div class="form-group">
				{!! Form::text('name',$colores->name, ['class' => 'form-control text-uppercase', 'placeholder' => 'Nombre del color...']) !!}
			</div>	
			<div class="form-group text-right">
				<a href="{{ url('/colores') }}" class="btn btn-link">Listado de Colores</a>
				<input type="submit" value="Registro" class="btn btn-primary btn-raised">
			</div>
{!! Form::close() !!}


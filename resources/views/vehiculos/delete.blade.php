{!! Form::open(['url' => '/vehiculos/'.$vehiculo->id, 'method' => 'DELETE']) !!}
	<button type="submit" value="" class="btn btn-danger" onclick="return confirm('Seguro desea eliminar S/N?')">
		<i class="fa fa-trash" aria-hidden="true"></i>
		ELIMINAR
	</button>
{!! Form::close() !!}
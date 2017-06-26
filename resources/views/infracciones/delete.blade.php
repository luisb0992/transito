{!! Form::open(['url' => '/infracciones/'.$infraccion->id, 'method' => 'DELETE']) !!}
	<button type="submit" value="" class="btn-padding btn-link text-danger" onclick="return confirm('Seguro desea eliminar S/N?')">
		<i class="fa fa-trash" aria-hidden="true">ELIMINAR</i>
	</button>
{!! Form::close() !!}
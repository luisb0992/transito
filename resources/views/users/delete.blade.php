{!! Form::open(['url' => '/users/'.$user->id, 'method' => 'DELETE']) !!}
	<input type="submit" value="ELIMINAR" class="text-danger btn-link" onclick="return confirm('Seguro desea eliminar S/N?')">
{!! Form::close() !!}
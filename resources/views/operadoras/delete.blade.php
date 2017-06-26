{!! Form::open(['url' => '/operadoras/'.$vehi->id, 'method' => 'DELETE']) !!}
	<button type="submit" value="" class="btn btn-danger text-danger" onclick="return confirm('Seguro desea eliminar S/N?')">
		<i class="fa fa-trash" aria-hidden="true"></i>
		ELIMINAR
	</button>
{!! Form::close() !!}
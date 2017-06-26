@extends('layouts.app')
@section('content')
	@include('partials.index',['index' => 'Bitacora'])
	<div class="container">
		@include('partials.form_fecha_infraccion',['url' => '/busquedabitacora', 'method' => 'POST'])
		<div class="alert alert-success">
		    <button type="button" class="close" data-dismiss="alert">&times;</button>
		    <span class="badge">{{ $count }}</span> Resultados Encontrados Desde
		    <span>{{ $from }}</span> Hasta <span>{{ $to }}</span>
		</div>
		<div class="col-sm-12 gris">	
		<div class="table table-responsive">
		<table class="table table-striped">
			<thead>
				<tr class="text-capitalize gris" id="datatable">
					<td>usuario</td>
					<td>descripcion del registro</td>
					<td>modulo asociado</td>
					<td>accion referenciada</td>
					<td>Fecha</td>
					<td>eliminacion</td>
				</tr>
			</thead>
			<tbody>
				@foreach($bitacora as $bit)
					<tr class="text-capitalize text-peque">

						<td>{{ $bit->username() }}</td>

						<td>
							@if($bit->registro_id)
								@foreach($bit->data() as $datos)
									@if($bit->data() == '')
										<span> Vacio </span>
									@else
									{{ $datos->name }} {{ $datos->ape }}
									<span class="text-danger">{{ $datos->placa }}</span>&nbsp; 
									<span class="text-success">{{ $datos->serial }}</span>
									@endif
								@endforeach
							@endif	
						</td>

						<td>{{ $bit->tabla }}</td>

						<td>
							@if($bit->accion() == 'CREACION')
							<span class="text-primary">{{$bit->accion()}}</span>
							@else
							<span class="text-warning">{{$bit->accion()}}</span>
							@endif
						</td>

						<td>{{ $bit->forcreated() }}</td>

						<td class="text-center">
							<form action="{{ url('/bitacora/'.$bit->id) }}" method="POST">
								{{ csrf_field() }}
								{{ method_field('DELETE') }}
								<button class="btn-link text-danger" type="submit">
									Eliminar
								</button>
							</form>
						</td>

					</tr>
				@endforeach
			</tbody>
		</table>
		</div>
	</div>
@endsection
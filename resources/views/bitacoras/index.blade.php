@extends('layouts.app')
@section('content')
	@include('partials.index',['index' => 'Bitacora'])
	<div class="container">
		@include('partials.form_fecha_infraccion',['url' => '/busquedabitacora', 'method' => 'POST'])
		<div class="col-sm-12 gris">
			<div class="col-sm-4">
				<h4 class="text-center">Registrados Hoy(Bitacora) <span class="badge" style="background-color: #8A2323;">{{ $today }}</span></h4>
			</div>
			<div class="col-sm-4">
				<h4 class="text-center">Total Operadoras <span class="badge">{{ $operadoras }}</span></h4>
			</div>
			<div class="col-sm-4">
				<h4 class="text-center">Total Vehiculos <span class="badge">{{ $vehiculos }}</span></h4>
			</div>
		</div>
		<div class="col-sm-12 gris">
			<div class="col-sm-4 text-center">
				<h4>Total Propietarios <span class="badge">{{ $propietarios }}</span></h4>
			</div>	
			<div class="col-sm-4 text-center">
				<h4>Total Conductores <span class="badge">{{ $conductores }}</span></h4>
			</div>	
			<div class="col-sm-4 text-center bg-success">
				<h4>Registros Totales(Bitacora) <span class="badge">{{ $count }}</span></h4>
			</div>
		</div>	
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
									@if($datos == '')
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
		<div class="pull-right">
			<span>{{ $bitacora->links() }}</span>
		</div>
	</div>
@endsection
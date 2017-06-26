@extends('layouts.app')
@section('content')
	@include('partials.index',['index' => 'c/vehiculos'])
	<div class="container">
		@foreach($vc as $conductor)
			@foreach($conductor->vehiculos as $vehiculo)	
			<table class="table table-striped text-center" id="datatable">
				<thead>
					<tr class="gris">
						<td>
							<h4><span class="pull-left text-uppercase">Vehiculo Nº {{ $vehiculo->id }}</span>
							<a href="{{ url('vehiculos/pdf/'.$vehiculo->id) }}" class="text-danger btn-link pull-right text-peque" id="pdf" target="_blank">
								IMPRIMIR PDF
							</a>
							</h4>
						</td>
					</tr>
				</thead>
				<!--................... contenido del vehiculo................-->
				<tbody>
				<tr class="text-peque">	
					<td>
						<div class="row">
							<div class="col-sm-12">
									<p class="list-group-item list-group-item-heading">
										<span class="text-success">PERTENECE A:</span> {{ $vehiculo->operadora->name }}
									</p>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-3">
								<p class="list-group-item list-group-item-heading text-uppercase text-success">Placa</p>
								<p class="list-group-item list-group-item-heading">{{ $vehiculo->placa }}</p>
							</div>
							<div class="col-sm-3">
								<p class="list-group-item list-group-item-heading text-uppercase text-success">Serial</p>
								<p class="list-group-item list-group-item-heading">{{ $vehiculo->serial }}</p>
							</div>
							<div class="col-sm-3">
								<p class="list-group-item list-group-item-heading text-uppercase text-success">Marca</p>
								<p class="list-group-item list-group-item-heading">{{ $vehiculo->marcas->name }}</p>
							</div>
							<div class="col-sm-3">
								<p class="list-group-item list-group-item-heading text-uppercase text-success">Color</p>
								<p class="list-group-item list-group-item-heading">{{ $vehiculo->colores->name }}</p>
							</div>
						</div>
						<br>
						<div class="row">	
							<div class="col-sm-3">
								<p class="list-group-item list-group-item-heading text-uppercase text-success">Año</p>
								<p class="list-group-item list-group-item-heading">{{ $vehiculo->año }}</p>
							</div>
							<div class="col-sm-3">
								<p class="list-group-item list-group-item-heading text-uppercase text-success">Capacidad</p>
								<p class="list-group-item list-group-item-heading">{{ $vehiculo->capacidad }} puestos</p>
							</div>
							<div class="col-sm-3">
								<p class="list-group-item list-group-item-heading text-uppercase text-success">Fecha U/A</p>
								<p class="list-group-item list-group-item-heading">{{ $vehiculo->forUpdated() }}</p>
							</div>
							<div class="col-sm-3">
								<p class="list-group-item list-group-item-heading text-uppercase text-success">Status</p>
								@if(($vehiculo->status_vehiculo_id) == 2 or ($vehiculo->status_vehiculo_id) == 4)
									<p class="list-group-item list-group-item-heading text-danger">
									{{ $vehiculo->nameStatus() }}
									</p>
								@elseif(($vehiculo->status_vehiculo_id) == 3 or ($vehiculo->status_vehiculo_id) == 5)
									<p class="list-group-item list-group-item-heading text-warning">{{ $vehiculo->nameStatus() }}</p>
								@elseif(($vehiculo->status_vehiculo_id) == 1)
									<p class="list-group-item list-group-item-heading text-primary">{{ $vehiculo->nameStatus() }}</p>	
								@endif
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-sm-12">
								<!--....... propietario .................-->
								<p class="list-group-item list-group-item-heading text-uppercase text-success">Propietario</p>
								<p class="list-group-item list-group-item-heading">
									<a href="{{ url('/personas/'.$vehiculo->propietarios->persona->id) }}" class="btn-link">
										<i class="fa fa-user"></i>
										{{ $vehiculo->propietarios->persona->name }} {{ $vehiculo->propietarios->persona->ape }}
									</a>
								</p>
							</div>	
						</div>
					</td>
				</tr>
				</tbody>
			</table><!--..... cierre de la tabla.........-->
			@endforeach
		@endforeach
		<div class="">
			<div class="col-sm-12 text-right gris div-padding">
				<a href="{{ url('/personas') }}" class="btn-link">
					<span class="text-capitalize">Listado de conductores/Propietarios</span>
				</a>
			</div>	
		</div>
		<div class="pull-right">
			<span>{{ $vc->links() }}</span>
		</div>
	</div>
	<br><br>
@endsection
@extends('layouts.app')
@section('content')
	@include('partials.index',['index' => 'p/vehiculos'])
	<div class="container">
		<div class="col-sm-12">
		@foreach($vp as $vehiculo)
			@include('partials.vehiculo')
		@endforeach
		</div>
		<div class="">
			<div class="col-sm-12 text-right gris div-padding">
				<a href="{{ url('/personas') }}" class="btn-link">
					<span class="text-capitalize">Listado de conductores/Propietarios</span>
				</a>
			</div>		
		</div>
		<div class="pull-right">
			<span>{{ $vp->links() }}</span>
		</div>
	</div>
	<br><br>
@endsection
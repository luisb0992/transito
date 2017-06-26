@extends('layouts.app')
@section('content')
	@include('partials.index',['index' => 'vehiculos'])
	<div class="container">
		@include('message.message')
			<div class="col-sm-12">	
				<div class="text-peque text-center header-principal">
					@include('partials.form_fecha',['url' => '/busquedavehiculo', 'method' => 'POST'])
				</div>
			</div>
			<div class="col-sm-12">
			@foreach($vehiculos as $vehiculo)
				@include('partials.vehiculo')
			@endforeach
			</div>
			<div class="pull-right">
				<span>{{ $vehiculos->links() }}</span>
			</div>
			<div class="floating-bot">
				<a href="{{ url('/vehiculos/create') }}" class="btn btn-fab text-right">
					<button class="btn btn-primary btn-fab">
							<i class="fa fa-plus" aria-hidden="true"></i>
					</button>
				</a>
			</div>
	</div>
@endsection
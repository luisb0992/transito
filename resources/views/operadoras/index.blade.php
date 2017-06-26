@extends('layouts.app')
@section('content')
	@include('partials.index',['index' => 'operadoras'])
	<div class="container">
		@include('message.message')
<!-- .........................inicio de la iteracion de los datos.....................-->
		@foreach($operadoras as $operadora)
			@include('partials.operadora')
		@endforeach<!-- fin de las iteraciones -->	
					
<!--.............. footer y boton de creacion .............-->
		<div class="pull-right">
			<span>{{ $operadoras->links() }}</span>
		</div>
		<div class="floating-bot">
			<a href="{{ url('/operadoras/create') }}" class="btn btn-fab text-right">
				<button class="btn btn-primary btn-fab">
						<i class="fa fa-plus" aria-hidden="true"></i>
				</button>
			</a>
		</div>
	</div><!-- Fin del contenedor -->
@endsection
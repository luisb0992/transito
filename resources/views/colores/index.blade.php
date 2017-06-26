@extends('layouts.app')
@section('content')
	@include('partials.index',['index' => 'COLORES'])
	<div class="container">
	@include('message.message')
		<div class="">
			<div class="panel panel-primary">
					<div class="table-responsive">
						<table class="table table-bordered text-center">
							<thead>
								<tr class="bg-success">
									<td>Nombre</td>
								</tr>
							</thead>
							<tbody>
								@foreach($colores as $color)
								<tr>
									<td>{{ $color->name }}</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		<div class="pull-right">
			<span>{{ $colores->links() }}</span>
		</div>
		</div>
		<div class="floating-bot">
			<a href="{{ url('/colores/create') }}" class="btn btn-fab text-right">
				<button class="btn btn-primary btn-fab">
						<i class="fa fa-plus" aria-hidden="true"></i>
				</button>
			</a>
	</div>
@endsection
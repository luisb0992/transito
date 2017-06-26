@extends('layouts.app')
@section('content')
    @include('partials.index',['index' => 'usuarios del sistema'])
	<div class="container">
	@include('message.message')
		<div class="gris div-padding text-center text-primary">
			<h4>Usuarios Registrados</h4>
		</div>
		<div class="table table-responsive">
			<table id="datatable" class="table table-bordered text-peque">
				<thead>
					<tr class="gris text-center">
						<td>C.I</td>
						<td>Nombre</td>
						<td>Apellido</td>
						<td>Direccion</td>
						<td>Email</td>
						<td>Perfil</td>
						<td>Status</td>
						<td>Acciones</td>
					</tr>
				</thead>
				<tbody>
					@foreach($users as $user)
					@if($user->status == 0)
					<tr class="danger">
					@endif
						<td>{{ $user->cedula }}</td>
						<td>{{ $user->name }}</td>
						<td>{{ $user->ape }}</td>
						<td>
							<dl class="dl-horizontal">
								<dt>{{ $user->direccion }}</dt>
							</dl>
						</td>
						<td class="text-nowrap">{{ $user->email }}</td>
						<td>{{ $user->namePerfil() }}</td>
						<td class="text-center">
						@if($user->statusName() == 'Activo')
							<span class="text-primary">{{ $user->statusName() }}</span>
						@else
							<span class="text-danger">{{ $user->statusName() }}</span>
						@endif
						</td>
						<td class="text-center">
							<a href="{{ url('/users/'.$user->id.'/edit') }}" class="btn-padding btn-warning">
								EDITAR
							</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
	<div class="floating-bot pull-right">
		<a href="{{ url('/users/create') }}" class="btn btn-fab text-right">
			<button class="btn btn-primary btn-fab">
					<i class="fa fa-plus" aria-hidden="true"></i>
			</button>
		</a>
	</div>
@endsection
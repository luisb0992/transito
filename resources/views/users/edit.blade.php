@extends("layouts.app")

@section("content")
@include('partials.index',['index' => 'USUARIOS'])
	<div class="container white">
		@include('message.message')
		<div class="h1_padding div-footer"><h3>Realizar Cambios</h3></div>
		@include('users.form', ['user' => $user, 'url' => '/users/'.$user->id, 'method' => 'PUT'])
	</div>
@endsection 
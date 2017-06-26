@extends("layouts.app")

@section("content")
@include('partials.index',['index' => 'USUARIOS'])
	<div class="container white">
		@include('message.message')
		<div class="h1_padding div-footer"><h3>Nuevo Usuario</h3></div>
		@include('users.form', ['user' => $user, 'url' => '/users', 'method'=> 'POST'])
	</div>
@endsection 
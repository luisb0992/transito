@extends('layouts.app')
@section('content')
<div class="container">
	<div style="width: 50%; height: 400px;" class="center-block">
		{!! Mapper::render() !!}
	</div>
</div>
@endsection
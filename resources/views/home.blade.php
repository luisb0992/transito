@extends('layouts.app')

@section('content')
<br>
<div class="container">
    <div class="panel col-sm-12">
        <h1 class="text-center">
            <span class="text-danger"><i class="fa fa-bus"></i></span>
            <em>
            Sistema de Registro y Control de Transito - Vialidad
            <p class="text-danger">Modalidad Urbana</p>
            </em>
        </h1>
    </div>
    <div class="panel col-sm-12 text-capitalize">
         <div class="text-left">
            <h2>
                <span class="text-primary">Bienvenido!</span> {{ Auth::user()->name.' '.Auth::user()->ape }}
            </h2>
        </div>
        <div class="">
            <img src="{{ asset('img/home.jpg') }}" class="img-responsive col-sm-12 div-padding">
        </div>
    </div>
</div>
@endsection

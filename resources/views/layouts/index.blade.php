<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Transito y Vialidad') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/estilos_propios.css') }}">
	<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/css_bootstrap/bootstrap-material-design.css') }}">
    <link rel="stylesheet" href="{{ asset('css/css_bootstrap/bootstrap-material-design.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/css_bootstrap/ripples.css') }}">
    <link rel="stylesheet" href="{{ asset('css/css_bootstrap/ripples.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/icons/css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('css/icons/css/font-awesome.min.css') }}">
   
   
    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    <style type="text/css" media="screen">  
    html
    {
        position: relative; 
        min-height: 100%;
    }
    body
    {
        margin: 0 0 150px;
        background-image: url("{{ asset('img/fondo_adicional.png') }}");
        background-repeat: no-repeat;
        background-size: 100%;
        background-attachment: fixed;
        background-position: center center;
    }
    .margin-abajo
    {
        width: 100%;
        bottom: 0;
        position: absolute;
        height: auto;
    }
    </style>
</head>
<body>
    <div id="app">
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/jquery.js') }}"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/js_bootstrap/material.js') }}"></script>
    <script src="{{ asset('js/js_bootstrap/material.min.js') }}"></script>
    <script src="{{ asset('js/js_bootstrap/ripples.js') }}"></script>
    <script src="{{ asset('js/js_bootstrap/ripples.min.js') }}"></script>
   
    <script>$.material.init();</script>
</body>
</html>

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
    <link rel="stylesheet" href="{{ asset('css/estilos_propios.css') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/css_bootstrap/bootstrap-material-design.css') }}">
    <link rel="stylesheet" href="{{ asset('css/css_bootstrap/bootstrap-material-design.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/css_bootstrap/ripples.css') }}">
    <link rel="stylesheet" href="{{ asset('css/css_bootstrap/ripples.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/icons/css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('css/icons/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatable/datatables.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/datatable/Responsive/css/responsive.bootstrap.css')}}">

    <!-- Datepicker Files -->
    <link rel="stylesheet" href="{{asset('plugins/jquery_datepicker/jquery-ui.css')}}">
   
   
    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    <style type="text/css" media="screen">
    .pagination {
        border-radius: 4px;
    }  
    html
    {
        position: relative;   
        min-height: 100%;
        min-width: 100%;
    }
    body
    {
        background-image: url("{{ asset('img/fondo_base.png') }}");
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
    .navbar{
        margin-bottom: 0px;
    }

    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-static-top family" style="background-color: #813434;color: #eee;">
            <!-- <ul class="nav navbar-nav navbar-left white">
                <li>
                    <img src="{{ asset('img/logo_nav.png') }}" alt="logo" width="200" height="50">
                </li>
            </ul> -->
            <div class="container">
                <div class="navbar-header"> 

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <!-- <ul class="nav navbar-nav navbar-left">
                        <li class="div-material home">
                            <a href="{{ url('/home')}}" class="navbar-brand">
                                &nbsp;&nbsp;&nbsp;<i class="fa fa-home" aria-hidden="true"></i>
                            </a>
                        </li>
                    </ul> -->
                 </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    
                    @if (Auth::check())
                    <ul class="nav navbar-nav navbar-left">
                        <li class="div-material">
                            <a href="{{ url('/home') }}">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            Inicio</a>
                        </li>
                    </ul>
                    @endif
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li class="div-material">
								<a href="{{ url('/') }}">
									<i class="fa fa-sign-in" aria-hidden="true"></i>
									Login
								</a>
							</li>
                        @else
                        @if(Auth::user()->perfil_id == 1 || Auth::user()->perfil_id == 2)
                            <li class="div-material">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                    Lineas
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="div-material">
                                        <a href="{{ url('/operadoras') }}">
                                            <i class="fa fa-random" aria-hidden="true"></i>
                                            Operadoras
                                        </a>
                                    </li>
                                    <li class="div-material">
                                        <a href="{{ url('/rutas') }}">
                                            <i class="fa fa-bus" aria-hidden="true"></i>
                                            Rutas
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            @endif
                            @if(Auth::user()->perfil_id == 1)
                                <li class="div-material">
                                    <a href="{{ url('/bitacora') }}">
                                        <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                        Bitacora
                                    </a>
                                </li>
                            @endif
                            @if(Auth::user()->perfil_id == 2)    
                            <li class="div-material">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                        Transporte
                                        <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li class="div-material">
                                            <a href="{{ url('/personas') }}">
                                                <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                                                Conductores/Propietarios
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/vehiculos') }}">
                                                <i class="fa fa-car" aria-hidden="true"></i>
                                                Vehiculos
                                            </a>
                                        </li>
                                        <li class="divider"></li>
                                        <li class="div-material">
                                            <a href="{{ url('/marcas') }}">
                                                <i class="fa fa-th-list" aria-hidden="true"></i>
                                                Marcas
                                            </a>
                                        </li>
                                        <li class="div-material">
                                            <a href="{{ url('/colores') }}">
                                                <i class="fa fa-adjust" aria-hidden="true"></i>
                                                Colores
                                            </a>
                                        </li>
                                    </ul>
                            </li>
                            <li class="div-material">
                                <a href="{{ url('/infracciones') }}">
                                    <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
                                    Infracciones
                                </a>
                            </li>
                            <li class="div-material div-separator-right">
                                <a href="{{ url('/users') }}">
                                    <i class="fa fa-users" aria-hidden="true"></i>
                                    Usuarios
                                </a>
                            </li>
                            @endif
                            <li class="dropdown btn-user-auth div-material">
                               <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                 <i class="fa fa-user" aria-hidden="true"></i>
                                  <span class="hidden-xs">
                                    {{ Auth::user()->name }}
                                  </span>
                                  <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                                    <li class="">
                                        <div class="text-nowrap text-negrita div-padding text-uppercase">
                                            <p>C:I {{ Auth::user()->cedula }}</p>
                                            <p>Direccion: {{ Auth::user()->direccion }}</p>
                                            <p>Perfil: {{ Auth::user()->namePerfil() }}</p>
                                        </div>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Salir
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        @yield('content')
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    
    <script src="{{asset('plugins/jquery_datepicker/jquery-ui.js')}}"></script>
    <script src="{{ asset('js/js_bootstrap/material.min.js') }}"></script>
    <script src="{{ asset('js/js_bootstrap/ripples.min.js') }}"></script>
    <script src="{{ asset('js/funciones.js') }}"></script>
</body>
</html>

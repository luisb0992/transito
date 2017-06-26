@extends('layouts.app')
@section('content')
    @include('partials.index',['index' => 'rutas'])
    <div class="container">
        @include('message.message')

<!-- .........................inicio de la iteracion de los datos.....................-->
                    <div class="row well text-center">
                        <div class="panel panel-primary">
                            <div class="panel-heading"><h3>{{ $ruta->name }}</h3></div>
                        </div>
                        <div class="col-sm-12">
                        <table class="table table-striped">
                            <thead>
                                <tr class="text-success bg-success">
                                    <td class="div-separator-right">OBSERVACION</td>
                                    <td>STATUS</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="gris_claro">
                                    <td class="div-separator-right"> 
                                        @if($ruta->descripcion == '')
                                            SIN OBSERVACION
                                        @else
                                            {{ $ruta->descripcion }}
                                        @endif
                                    </td>
                                    <td>
                                        @if($ruta->status == 1)
                                        <span class="text-info">{{ $ruta->nameStatus() }}</span>
                                        @else
                                        <span class="text-danger">{{ $ruta->nameStatus() }}</span>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        @if(count($ruta->c_rutas) == 0)
                            <div class="list-group-item list-group-item-heading">
                            <p class="text-uppercase text-success btn-padding h1_padding">Coordenadas</p>
                            <p class="text-center">
                                <a href="{{ url('/coordenadas_rutas/'.$ruta->id.'/edit') }}" class="btn-link text-primary">AGREGAR COORDENADAS</a>
                            </p>
                            </div>
                        @else
                            <div class="list-group-item list-group-item-heading">
                            <table class="table table-striped text-peque">
                                <thead>
                                    <tr class="text-success">
                                        <td colspan="2">COORDENADAS</td>
                                    </tr>
                                    <tr class="text-success bg-success">
                                        <td class="div-separator-right">Longitud</td>
                                        <td>Latitud</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($ruta->c_rutas as $coordenadas)
                                    <tr class="gris_claro">
                                        <td class="div-separator-right">{{ $coordenadas->longitud }}</td>
                                        <td>{{ $coordenadas->latitud }}</td>
                                    </tr>
                                    @endforeach
                                    <tr class="gris_claro">
                                        <td>
                                            <a href="{{ url('/maps/'.$ruta->id) }}" class="btn-link text-danger">
                                                VER MAPA
                                            </a>
                                        </td>
                                        <td class="text-right">
                                            <a href="{{ url('/coordenadas_rutas/'.$ruta->id.'/edit') }}" 
                                            class="btn-link text-primary">AGREGAR NUEVA</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            </div>
                        @endif
                        </div>

                        <br>
                        <div class="text-left div-padding col-sm-12">
                            <a href="{{ url('/rutas') }}" class="btn-link">
                                Listado de rutas
                            </a>
                        </div>
                    </div><!-- fin del row well -->
    </div><!-- Fin del contenedor -->
@endsection
<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

/*----- login -----*/
Route::get('/','IndexController@index');

/*----- home -----*/
Route::get('/home','IndexController@home')->middleware('auth');

/*---- Bitacora  ----*/
Route::resource('bitacora','BitacoraController',['middleware' => ['auth','role.admin']]);

/*---- Ruta resource para los usuarios  ----*/
Route::resource('users','UsersController',['middleware' => ['auth','role.user']]);

Route::resource('conductoresactuales','ConductoresActualesController',[
	'middleware' => ['auth','role.user'],
	'only' => ['store']

]);

/*---- Ruta resource para las  rutas urbanas ----*/
Route::resource('rutas','RutasController',['middleware' => ['auth']]);

/*---- Ruta resource para los operadoras  ----*/
Route::resource('operadoras','OperadoraController',['middleware' => ['auth']]);

/*---- Ruta resource para los personas  ----*/
Route::resource('personas','PersonasController',['middleware' => ['auth','role.user']]);

/*---- Ruta resource para los vehiculos  ----*/
Route::resource('vehiculos','VehiculosController',['middleware' => ['auth','role.user']]);

/*---- Ruta resource vehiculos_conductores  ----*/
Route::resource('vehiculo_conductor','VehiculosConductoresController',['middleware' => ['auth','role.user']]);

/*---- Ruta resource para las marcas  ----*/
Route::resource('marcas','MarcasController',['middleware' => ['auth','role.user']]);

/*---- Ruta resource para los colores  ----*/
Route::resource('colores','ColoresController',['middleware' => ['auth','role.user']]);

/*---- Ruta resource para las infracciones  ----*/
Route::resource('infracciones','InfraccionesController',['middleware' => ['auth','role.user']]);

/*---- Ruta resource para las infracciones  ----*/
Route::resource('coordenadas_rutas','CoordenadasRutasController',['middleware' => ['auth','role.user']]);

/*
........ruta para la config de google maps
 */
Route::get('/maps/{id}','MapsController@googleMaps')->middleware('auth','role.user');

/*
...........reportes PDF
 */
Route::get('vehiculos/pdf/{id}','PdfController@pdf')->middleware('auth','role.user');

Route::get('infracciones/pdf/{id}','PdfController@infraccion')->middleware('auth','role.user');

Route::post('busquedavehiculo','BusquedaController@filtroVehiculo')->middleware('auth');

Route::post('busquedainfraccion','BusquedaController@filtroInfraccion')->middleware('auth');

Route::post('busquedabitacora','BusquedaController@filtroBitacora')->middleware('auth','role.admin');

Route::get('infracciones/vehi/{id}','BusquedaController@vehiculos')->middleware('auth','role.user');

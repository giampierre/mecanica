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

Route::get('/', function () {
    return view('app');
});

Route::get('vehiculos/listar','VehiculoController@listarVehiculos');
Route::post('vehiculos/crear','VehiculoController@crearVehiculo');
Route::put('vehiculos/eliminar/{id}', 'VehiculoController@eliminarVehiculo');

Route::post('articulos/crear','ArticuloController@crearArticulo');
Route::get('articulos/listar','ArticuloController@listarArticulos');


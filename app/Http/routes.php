<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Pantalla de incio de sesión
Route::get('/','ControladorVistas@inicioSesion');

//Inicio de sesión
Route::resource('inicioSesion','ControladorInicioSesion');
Route::resource('cierreSesion','ControladorInicioSesion@cerrarSesion');

//Rutas de las pantallas del administrador
Route::get('inicioAdministracion/retornarIngredientes','ControladorAdministracion@retornarIngredientes');

Route::get('inicioAdministracion/editarIngrediente/{idIngrediente}','ControladorAdministracion@editarIngrediente');

Route::put('inicioAdministracion/actualizarIngrediente/{idIngrediente}',['uses'=>'ControladorAdministracion@actualizarIngrediente','as'=>'inicioAdministracion.actualizarIngrediente']);

Route::get('inicioAdministracion/terminarPedido/{idPedido}','ControladorAdministracion@terminarPedido');

//['uses'=>'ControladorAdministracion@terminarPedido','as'=>'inicioAdministracion.terminarPedido']


Route::get('inicioAdministracion/retornarPedidos','ControladorAdministracion@retornarPedidos');

Route::post('inicioAdministracion/retornarIngredientes/generarReporte',['uses'=>'ControladorAdministracion@generarReporte', 'as'=>'inicioAdministracion.retornarIngredientes.generarReporte']);


//Rutas de las pantallas del mesero
Route::get('inicioPedidos/areaPedidos','ControladorVistas@inicioPedidos');
Route::post('inicioPedidos/areaPedidos/crearPedido',['uses'=>'ControladorPedidos@crearPedido', 'as'=>'inicioPedidos.areaPedidos.crearPedido']);


Route::resource('inicioAdministracion', 'ControladorAdministracion@editarIngrediente');
Route::resource('mesero', 'ControladorPedidos');
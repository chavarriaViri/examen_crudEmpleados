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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('empleados','EmpleadosController@index')->name('empleados.index');

Route::get('empleados/create','EmpleadosController@create')->name('empleados.create');
Route::post('empleados','EmpleadosController@store')->name('empleado.store');

Route::get('empleados/{empleado}/show','EmpleadosController@show')->name('empleados.show');

Route::get('empleado/{empleado}/edit','EmpleadosController@edit')->name('empleados.edit');
Route::put('empleado/{emppleado}','EmpleadosController@update')->name('empleados.update');

Route::delete('empleado/{empleado}','EmpleadosController@destroy')->name('empleados.destroy');

Route::get('empleado/{empleado}/cambiarEstatus','EmpleadosController@cambiarEstatusEm');

Route::get('validar/empleado/{codigo}','EmpleadosController@validarCodigo');
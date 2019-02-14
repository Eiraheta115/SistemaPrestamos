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
Route::resource('cuentas','CuentaController');
Route::resource('categorias','CategoriaController');
Route::resource('clientes','ClienteGaranteController');
Route::resource('prestamos','PrestamoController');
Route::resource('correlativos','CorrelativosController');

Route::get('/user/{id}', 'UserControl@show')->name('userShow');
Route::get('/prestamos/{id}/cuotas','PrestamoController@mostrar')->name('prestamoDetalle');
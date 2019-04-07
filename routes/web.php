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

Route::group(['middleware'=>['revalidate','auth']], function(){
  Route::get('/home', 'HomeController@index')->name('home');
  Route::resource('cuentas','CuentaController');
  Route::resource('categorias','CategoriaController');
  Route::resource('clientes','ClienteGaranteController');
  Route::resource('prestamos','PrestamoController');
  Route::resource('garantes', 'GaranteController');
  Route::resource('correlativos','CorrelativosController');
  Route::get('/user/{id}', 'UserControl@show')->name('userShow');
  Route::put('/user/{id}', 'UserControl@update')->name('userUpdate');
  Route::put('/user/{id}/pass', 'UserControl@updatePass')->name('userUpdatePass');
  Route::get('/prestamos/{id}/cuotas','PrestamoController@mostrar')->name('prestamoDetalle');
  Route::post('/sendemail/{id}','UserControl@enviaremail')->name('mail');
  Route::get('client/{id}/edit', 'ClienteGaranteController@edit')->name('editarCliente');
  //Route::post('client/{id}/update', 'ClienteGaranteController@actualizar')->name('actualizarCliente');
  //categoriaT
  Route::get('categoriasT/create','CategoriaController@createT')->name('createT');
  Route::post('categoriasT','CategoriaController@storeT')->name('storeT');
  Route::get('categoriasT/{id}/edit','CategoriaController@editT')->name('editT');
  Route::put('categoriasT/{id}/update','CategoriaController@updateT')->name('updateT');
  Route::delete('categoriasT/{id}/delete','CategoriaController@destroyT')->name('destroyT');
  Route::get('cuenta/cerrarSesion', 'UserControl@cerrarSesion')->name('cerrarSesion');
});

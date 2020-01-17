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
// Ruta donde creas tus ruletas y agregas la comida
Route::get('/crea', 'ComidaController@show');
Route::post('/crea', 'ComidaController@enviar');
// Ruta de cuenta
// Route::get('/cuenta', 'ComidaController@mostrarComidasUser');
Route::get('/cuenta', 'ComidaController@userBuscar');
// Elimnar comidas
Route::get('/cuenta/{id}', 'ComidaController@eliminar');
// Editar comidas
Route::get('/editar/{id}', 'ComidaController@editar');
Route::post('/editar/{id}', 'ComidaController@update');

//Cuentas Admin
// Vista total de todos los usuarios
Route::get('/admin/cuentas/{id}', 'AdminController@eliminar');
Route::get('/admin/cuentas', 'AdminController@buscar');
Route::get('/admin/comidas/{id}', 'ComidaController@aprobar');
Route::get('/admin/rechazar/{id}', 'ComidaController@denegar');
Route::get('/admin/comidas', 'ComidaController@buscar');
Route::get('/admin/administradores', function () {
    return view('/admin/administradores');
});
Route::post('/admin/administradores', 'AdminController@agregar');

// Vistas a las distintas ruletas
Route::get('/categorias/comida-vegetariana', function () {
    return view('/categorias/comida-vegetariana');
});
Route::get('/categorias/comida-vegana', function () {
    return view('/categorias/comida-vegana');
});
Route::get('/categorias/comida-celiaca', function () {
    return view('/categorias/comida-celiaca');
});
Route::get('/categorias/comida-todo', function () {
    return view('/categorias/comida-todo');
});

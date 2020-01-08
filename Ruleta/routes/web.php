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
Route::get('/comidas', 'ComidaController@show');
Route::post('/comidas', 'ComidaController@enviar');
// Ruta de cuenta
Route::get('/cuenta', 'UserController@show');
// Elimnar comidas
Route::get('/cuenta/{id}', 'ComidaController@eliminar');
// Editar comidas
Route::get('/editar/{id}', 'ComidaController@editar');
Route::post('/editar/{id}', 'ComidaController@update');


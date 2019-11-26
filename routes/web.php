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
    return view('auth.login');
});

Auth::routes();



Route::get('/home', 'HomeController@index');

Route::get('/oficial', 'OficialController@index');

Route::get('/contralor', 'ContralorController@index');



Route::resource('/variables', 'catalogosController');

Route::resource('/valorescatalogos', 'valores_catalogosController');

Route::resource('/materias', 'materiasController');

Route::resource('/distritos','distritosController');

Route::resource('/juzgados', 'juzgadosController');

Route::resource('/juicios', 'juiciosController');

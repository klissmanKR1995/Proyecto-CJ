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


/* Rutas de tipos usuarios */

Route::get('/home', 'HomeController@index');

Route::get('/oficial', 'OficialController@index');

Route::get('/contralor', 'ContralorController@index');


/* Rutas de los componentes en interfaz home (Administrador) */

Route::resource('/distritos','distritosController');

Route::get('distritosAll', 'distritosController@distritosAll')->name('distritosAll');

Route::get('/searchNombreDistrito', 'distritosController@searchNombreDistrito')->name('searchNombreDistrito');

Route::resource('/juzgados', 'juzgadosController');

Route::get('/searchNombreJuzgado', 'juzgadosController@searchNombreJuzgado')->name('searchNombreJuzgado');

Route::resource('/materias', 'materiasController');

Route::get('/searchNombreMateria', 'materiasController@searchNombreMateria')->name('searchNombreMateria');


Route::resource('/juicios', 'juiciosController');

Route::get('/searchByID', 'juiciosController@searchByID')->name('searchByID');

Route::resource('/variables', 'catalogosController');

Route::resource('/valorescatalogos', 'valores_catalogosController');

Route::get('/getCatalogos', 'valores_catalogosController@getCatalogos')->name('getCatalogos');



/* Rutas de los componentes en interfaz Oficial (Oficial de partes) */

Route::resource('/expedientes', 'expedientesController');



/* Rutas del PDF */

Route::get('distritosPDF', 'distritosController@exportPdf')->name('distritos.pdf');

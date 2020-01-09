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

Route::get('materiasAll', 'materiasController@materiasAll')->name('materiasAll');

Route::get('/searchNombreMateria', 'materiasController@searchNombreMateria')->name('searchNombreMateria');

Route::resource('/juicios', 'juiciosController');

Route::get('juiciosAll', 'juiciosController@juiciosAll')->name('juiciosAll');

Route::get('/searchByID', 'juiciosController@searchByID')->name('searchByID');

Route::get('/searchNombreJuicio', 'juiciosController@searchNombreJuicio')->name('searchNombreJuicio');

Route::resource('/variables', 'catalogosController');

Route::get('catalogosAll', 'catalogosController@catalogosAll')->name('catalogosAll');

Route::get('/searchNombreVariable', 'catalogosController@searchNombreVariable')->name('searchNombreVariable');

Route::resource('/valorescatalogos', 'valores_catalogosController');

Route::get('/getCatalogos', 'valores_catalogosController@getCatalogos')->name('getCatalogos');

Route::get('/searchNombreValores', 'valores_catalogosController@searchNombreValores')->name('searchNombreValores');


/* Rutas de los componentes en interfaz Oficial (Oficial de partes) */

Route::resource('/expedientes', 'expedientesController');

Route::get('expedientesAll', 'expedientesController@expedientesAll')->name('expedientesAll');
Route::get('prueba', 'expedientesController@prueba')->name('prueba');

Route::get('/searchNombreExpdiente', 'expedientesController@searchNombreExpdiente')->name('searchNombreExpdiente');

Route::resource('/modulouno', 'ejemploController');


/* Rutas del PDF */

Route::get('distritosPDF', 'distritosController@exportPdf')->name('distritos.pdf');

Route::get('juzgadosPDF', 'juzgadosController@exportPdf')->name('juzgados.pdf');

Route::get('materiasPDF', 'materiasController@exportPdf')->name('materias.pdf');

Route::get('juiciosPDF', 'juiciosController@exportPdf')->name('juicios.pdf');

Route::get('variablesPDF', 'catalogosController@exportPdf')->name('variables.pdf');

Route::get('valoresvariablesPDF', 'valores_catalogosController@exportPdf')->name('valoresvariables.pdf');

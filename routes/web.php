<?php

use Illuminate\Support\Facades\Route;

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
    return view('layout');
});


/* RUTAS CAMILA STEFANIE YACOB*/


/* RUTAS GERSON OLIVA*/
Route::group(['prefix'=>'Abogado'], function (){
    Route::get('index', 'AbogadoController@index')->name('abogado.index');
    Route::get('create', 'AbogadoController@create')->name('abogado.create');
    Route::get('show/{id}','AbogadoController@show')->name('abogado.show');
    Route::post('store', 'AbogadoController@store')->name('abogado.store');
    Route::get('edit/{id}','AbogadoController@edit')->name('abogado.edit');
    Route::put('update/{id}','AbogadotController@update')->name('abogado.update');
    Route::get('delete/{id}','AbogadoController@delete')->name('abogado.delete');
    Route::delete('destroy/{id}','AbogadoController@destroy')->name('abogado.destroy');
});


/* RUTAS DANIEL ROBLES*/

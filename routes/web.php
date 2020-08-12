<?php

use Illuminate\Support\Facades\Route;


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
    Route::put('update/{id}','AbogadoController@update')->name('abogado.update');
    Route::get('delete/{id}','AbogadoController@delete')->name('abogado.delete');
    Route::delete('destroy/{id}','AbogadoController@destroy')->name('abogado.destroy');
});


/* RUTAS DANIEL ROBLES*/

Route::resource('categoriadocumento', 'CategoriaDocumentoController');
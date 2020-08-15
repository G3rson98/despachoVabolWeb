<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('layout');
});


/* RUTAS CAMILA STEFANIE YACOB*/
Route::resource('categoriaanuncio', 'CategoriaAnuncioController');
Route::resource('anuncio', 'AnuncioController');
Route::get('/anuncio/{id}/estado', 'AnuncioController@editEstado');
Route::resource('solicitudcontacto', 'SolicitudContactoController');

/* RUTAS GERSON OLIVA*/
Route::prefix('Abogado')->group( function (){
    Route::get('index', 'AbogadoController@index')->name('abogado.index');
    Route::get('create', 'AbogadoController@create')->name('abogado.create');
    Route::get('show/{id}','AbogadoController@show')->name('abogado.show');
    Route::post('store', 'AbogadoController@store')->name('abogado.store');
    Route::get('edit/{id}','AbogadoController@edit')->name('abogado.edit');
    Route::put('update/{id}','AbogadoController@update')->name('abogado.update');
    Route::get('delete/{id}','AbogadoController@delete')->name('abogado.delete');
    Route::get('destroy/{id}','AbogadoController@destroy')->name('abogado.destroy');
});
Route::prefix('Cliente')->group( function (){
    Route::get('index', 'ClienteController@index')->name('cliente.index');
    Route::get('create', 'ClienteController@create')->name('cliente.create');
    Route::get('show/{id}','ClienteController@show')->name('cliente.show');
    Route::post('store', 'ClienteController@store')->name('cliente.store');
    Route::get('edit/{id}','ClienteController@edit')->name('cliente.edit');
    Route::put('update/{id}','ClienteController@update')->name('cliente.update');
    Route::get('delete/{id}','ClienteController@delete')->name('cliente.delete');
    Route::get('destroy/{id}','ClienteController@destroy')->name('cliente.destroy');
});

/* RUTAS DANIEL ROBLES*/

Route::resource('categoriadocumento', 'CategoriaDocumentoController');
Route::resource('comentario', 'ComentarioController');
Route::get('documento/{id}', 'DocumentoController@show')->name('documento.show');
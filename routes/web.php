<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('layout');
});


/* RUTAS CAMILA STEFANIE YACOB*/


/* RUTAS GERSON OLIVA*/


/* RUTAS DANIEL ROBLES*/

Route::resource('categoriadocumento', 'CategoriaDocumentoController');
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BitacoraController extends Controller
{
    public function index()
    {
        DB::update('update visitas set numero_visitas=numero_visitas+1 where nombre_pagina = ?', ['bitacora']);
        $visitas = DB::select('select * from visitas where nombre_pagina = ?', ['bitacora']);

        $datos = DB::select('select * from bitacora order by id_bitacora desc');

        $tema = [
            "colora" => auth()->user()->colora,
            "colorb" => auth()->user()->colorb,
            "colorc" => auth()->user()->colorc,
            "rol" => auth()->user()->rol,
        ];

        return view('bitacora', compact('visitas','datos','tema'));
    }
}

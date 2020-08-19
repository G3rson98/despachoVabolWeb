<?php

namespace App\Http\Controllers;

use App\Anuncio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LandingController extends Controller
{
    public function getView (){
        DB::update('update visitas set numero_visitas=numero_visitas+1 where nombre_pagina = ?', ['landingpage']);
        $visitas = DB::select('select * from visitas where nombre_pagina = ?', ['landigpage']);

        $anuncios = DB::select('select * from anuncio where anu_estado=1');

        return view('LandingPage.landingPage',compact('anuncios', 'visitas'));
    }
}

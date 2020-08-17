<?php

namespace App\Http\Controllers;

use App\Anuncio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LandingController extends Controller
{
    public function getView (){
        $anuncios = DB::select('select * from anuncio where anu_estado=1');

        return view('LandingPage.landingPage',compact('anuncios'));
    }
}

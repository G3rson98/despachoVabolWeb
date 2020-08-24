<?php

namespace App\Http\Controllers;

use App\Anuncio;
use App\SolicitudContacto;
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

    public function store(Request $request)
    {
        // //Validation
        $campos=[
            'sol_nombre' => 'required|string|max:125',
            'sol_apellido' => 'required|string|max:125',
            'sol_celular' => 'required|numeric',
            'sol_email' => 'required|email|max:125',
            'sol_contenido' => 'required|string|max:500'
        ];
        $Mensaje = [
            "required" => 'El/La :attribute es requerido/a.',
            "max" => 'El/La :attribute debe ser menor a :max caracteres.',
            "string" => 'El/La :attribute debe ser una cadena.',
            "numeric" => 'El/La :attribute debe ser un numero.',
            "email" => 'El/La :attribute debe tener formato de correo electronico.'
        ];
        $this->validate($request,$campos,$Mensaje);
        //--Validation
        
        $solicitud = new SolicitudContacto();
        $solicitud->sol_nombre = $request->input('sol_nombre');
        $solicitud->sol_apellido = $request->input('sol_apellido');
        $solicitud->sol_celular = $request->input('sol_celular');
        $solicitud->sol_email = $request->input('sol_email');
        $solicitud->sol_contenido = $request->input('sol_contenido');
        $solicitud->sol_estado = "Pendiente";
        $solicitud->sol_fecha = date('Y-m-d');
        $solicitud->save();

        //Insercion Bitacora

        $fecha = date('Y-m-d');
        date_default_timezone_set("America/La_Paz");
        $hora = date("G:i:s");

        DB::insert('insert into bitacora (bit_nombre, bit_accion, bit_fecha, bit_hora) values (?, ?, ?, ?)', ['Un invitado.', 'Registró una solicitud de contacto.',$fecha,$hora]);
        //Insercion Bitacora

        return redirect('/');
        // $datosAnuncio = request()->except(['_token']);
        // return response()->json($datosAnuncio);
    }
}

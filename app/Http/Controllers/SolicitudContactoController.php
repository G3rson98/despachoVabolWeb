<?php

namespace App\Http\Controllers;

use App\SolicitudContacto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SolicitudContactoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        DB::update('update visitas set numero_visitas=numero_visitas+1 where nombre_pagina = ?', ['solcontacto_index']);
        $visitas = DB::select('select * from visitas where nombre_pagina = ?', ['solcontacto_index']);

        $datos['solicitudes']=SolicitudContacto::paginate();

        $tema = [
            "colora" => auth()->user()->colora,
            "colorb" => auth()->user()->colorb,
            "colorc" => auth()->user()->colorc,
        ];

        return view('Publicaciones.GestionarSolicitudContacto.indexSolicitudContacto',$datos, compact('visitas','tema'));
    }

    public function create()
    {
        return view('Publicaciones.GestionarSolicitudContacto.createSolicitudContacto');
    }

    public function editEstado($id)
    {
        $abogados = DB::select('select * from abogado where abg_usuario = ?', [auth()->user()->id]);
        
        $solicitud = SolicitudContacto::findOrFail($id);
        $solicitud->sol_estado = "Revisado";

        foreach ($abogados as $abg) {
            $solicitud->sol_abogado = $abg->abg_ci;
        }
        
        $solicitud->update();

        //Insercion Bitacora

        $fecha = date('Y-m-d');
        date_default_timezone_set("America/La_Paz");
        $hora = date("G:i:s");

        DB::insert('insert into bitacora (bit_nombre, bit_accion, bit_fecha, bit_hora) values (?, ?, ?, ?)', [auth()->user()->email, 'Revisó una solicitud de contacto.',$fecha,$hora]);
        //Insercion Bitacora

        return redirect('solicitudcontacto');
    }
}

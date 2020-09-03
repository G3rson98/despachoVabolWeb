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
            "rol" => auth()->user()->rol,
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

    public function estadistica(){
        $tema = [
            "colora" => auth()->user()->colora,
            "colorb" => auth()->user()->colorb,
            "colorc" => auth()->user()->colorc,
            "rol" => auth()->user()->rol,
        ];

        //Estadiscas de solicitudes de contacto
        $junio      = DB::select("select count(*) from solicitudcontacto where sol_fecha >= '2020-06-01' and sol_fecha<= '2020-06-30'");
        $julio      = DB::select("select count(*) from solicitudcontacto where sol_fecha >= '2020-07-01' and sol_fecha<= '2020-07-31'");
        $agosto     = DB::select("select count(*) from solicitudcontacto where sol_fecha >= '2020-08-01' and sol_fecha<= '2020-08-31'");
        $septiembre = DB::select("select count(*) from solicitudcontacto where sol_fecha >= '2020-09-01' and sol_fecha<= '2020-09-30'");

        $listaSolicitudes = [$junio[0]->count, $julio[0]->count, $agosto[0]->count, $septiembre[0]->count];

        return view('Publicaciones.GestionarSolicitudContacto.estadisticas', compact('tema','listaSolicitudes'));
    }
}

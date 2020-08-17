<?php

namespace App\Http\Controllers;

use App\SolicitudContacto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SolicitudContactoController extends Controller
{
    public function index()
    {
        $datos['solicitudes']=SolicitudContacto::paginate();

        return view('Publicaciones.GestionarSolicitudContacto.indexSolicitudContacto',$datos);
    }

    public function create()
    {
        return view('Publicaciones.GestionarSolicitudContacto.createSolicitudContacto');
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

        return redirect('/home');
        // $datosAnuncio = request()->except(['_token']);
        // return response()->json($datosAnuncio);
    }

    public function editEstado($id)
    {
        $solicitud = SolicitudContacto::findOrFail($id);
        $solicitud->sol_estado = "Revisado";
        $solicitud->sol_abogado = 30;
        
        $solicitud->update();
        return redirect('solicitudcontacto');
    }
}

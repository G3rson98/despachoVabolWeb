<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comentario;


class ComentarioController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //Validation
        $campos=[
            'com_contenido' => 'required|string|max:500',
        ];
        $Mensaje = [
            "com_contenido.required" => 'El contenido del comentario es requerido.',
            "com_contenido.max" => 'El contenido del comentario debe ser menor a :max caracteres.',
            "com_contenido.string" => 'El contenido del comentario debe ser una cadena.'
        ];
        $this->validate($request,$campos,$Mensaje);
        //--Validation
        
        $comentario = new Comentario();
        $comentario->com_contenido = $request->input('com_contenido');
        $comentario->com_doc = $request->input('com_doc');
        $comentario->com_usuario = 1;
        $comentario->com_fecha = date('Y-m-d');
        date_default_timezone_set("America/La_Paz");
        $comentario->com_hora = date("G:i:s");
        $comentario->save();
        return redirect()->route('documento.show', ['id' => $request->input('com_doc')]);
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request)
    {
        //Validation
        $campos=[
            'com_contenido' => 'required|string|max:500',
        ];
        $Mensaje = [
            "com_contenido.required" => 'El contenido del comentario es requerido.',
            "com_contenido.max" => 'El contenido del comentario debe ser menor a :max caracteres.',
            "com_contenido.string" => 'El contenido del comentario debe ser una cadena.'
        ];
        $this->validate($request,$campos,$Mensaje);
        //--Validation
        
        $comentario = Comentario::find($request->input('com_id'));
        $comentario->update($request->all());
        return redirect()->route('documento.show', ['id' => $request->input('com_doc')]);
    }

    public function destroy($id)
    {
        $comentario = Comentario::find($id);
        
        $comentario->delete();
        return redirect()->route('documento.show', ['id' => $comentario->com_doc]);
    }

    
}

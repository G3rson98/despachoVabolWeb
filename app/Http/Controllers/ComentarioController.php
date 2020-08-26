<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comentario;
use Illuminate\Support\Facades\DB;


class ComentarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

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
        $comentario->com_usuario = auth()->user()->id;
        $comentario->com_fecha = date('Y-m-d');
        date_default_timezone_set("America/La_Paz");
        $comentario->com_hora = date("G:i:s");
        $comentario->save();

        //Insercion Bitacora
        $fecha = date('Y-m-d');
        $hora = date("G:i:s");
        DB::insert('insert into bitacora (bit_nombre, bit_accion, bit_fecha, bit_hora) values (?, ?, ?, ?)', [auth()->user()->email, 'Registró un comentario.',$fecha,$hora]);
        //Insercion Bitacora
        $request->session()->flash('alert-success', '¡Comentario realizado con éxito!');
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

        //Insercion Bitacora
        $fecha = date('Y-m-d');
        $hora = date("G:i:s");
        DB::insert('insert into bitacora (bit_nombre, bit_accion, bit_fecha, bit_hora) values (?, ?, ?, ?)', [auth()->user()->email, 'Editó un comentario.',$fecha,$hora]);
        //Insercion Bitacora
        $request->session()->flash('alert-success', '¡Comentario modificado con éxito!');
        return redirect()->route('documento.show', ['id' => $request->input('com_doc')]);
    }

    public function destroy($id)
    {
        $comentario = Comentario::find($id);
        $comentario->delete();

        //Insercion Bitacora
        $fecha = date('Y-m-d');
        $hora = date("G:i:s");
        DB::insert('insert into bitacora (bit_nombre, bit_accion, bit_fecha, bit_hora) values (?, ?, ?, ?)', [auth()->user()->email, 'Eliminó un comentario.',$fecha,$hora]);
        //Insercion Bitacora

        return redirect()->route('documento.show', ['id' => $comentario->com_doc]);
    }

    
}

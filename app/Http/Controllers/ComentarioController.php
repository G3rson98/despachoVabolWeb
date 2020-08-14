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

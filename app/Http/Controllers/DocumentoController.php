<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Documento;
use App\Comentario;
use Illuminate\Support\Facades\DB;


class DocumentoController extends Controller
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
        //
    }

    public function show($id)
    {
        $documento = Documento::find($id);
        //$comentariosDoc = Documento::find($id)->comentario;
        $comentariosDoc = DB::select('select * from comentario, usuario where com_usuario = usu_id and com_doc = ?', [$id]);

        return view('Documento.show',compact('documento','comentariosDoc'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}

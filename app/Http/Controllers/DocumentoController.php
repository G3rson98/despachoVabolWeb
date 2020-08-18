<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Documento;
use App\CategoriaDocumento;
use App\Cliente;
use Illuminate\Support\Facades\DB;


class DocumentoController extends Controller
{
    
    public function indexPorCategoria($id)
    {
        $documentosPorCategoria = CategoriaDocumento::find($id)->documento;
        $categoria = CategoriaDocumento::find($id);
        return view('Documento.indexPorDocumento',compact('documentosPorCategoria', 'categoria'));
    }


    public function create()
    {
        $clientes = Cliente::all();
        $categorias = CategoriaDocumento::all();
        return view('Documento.create', compact('clientes', 'categorias'));
    }

    public function store(Request $request)
    {
         //Validation
         $campos=[
            'doc_descripcion' => 'required|string|max:125',
            'doc_cliente' => 'required|integer',
            'doc_categoriadoc' => 'required|integer',
            'doc_url' => 'required',
            
        ];
        $Mensaje = [
            "doc_descripcion.required" => 'El campo descripción es requerido.',
            "doc_cliente.required" => 'Debe escoger a un cliente.',
            "doc_categoriadoc.required" => 'Debe escoger una categoría documento',
            "doc_url.required" => 'Debe escoger un archivo para subir.',
            "doc_descripcion.max" => 'El campo descripción debe ser menor a :max caracteres.',
            "doc_descripcion.string" => 'El campo descripción debe ser una cadena.', 
            "doc_cliente.integer" => 'El campo cliente debe ser un entero.', 
            "doc_categoriadoc.integer" => 'El campo categoría documento debe ser un entero.'
        ];
        $this->validate($request,$campos,$Mensaje);
        //--Validation
        
        if($request->hasFile('doc_url')){
           date_default_timezone_set("America/La_Paz");
           $originalName = $request->doc_url->getClientOriginalName();
           $filename = time().'_'.$request->doc_url->getClientOriginalName();
           $request->doc_url->storeAs('public/upload', $filename);
           $documento = new Documento();
           $documento->doc_titulo = $originalName;
           $documento->doc_descripcion = $request->input('doc_descripcion');           
           $documento->doc_fechasubida = date('Y-m-d');
           $documento->doc_horasubida  = date("G:i:s");
           $documento->doc_url = 'upload/'.$filename;
           $documento->doc_cliente = $request->input('doc_cliente');
           $documento->doc_abogado = 30; 
           $documento->doc_categoriadoc = $request->input('doc_categoriadoc');
           $documento->doc_idmail = 1; 
           $documento->save();
        }
        return redirect()->route('documento.create');
    }

    public function show($id)
    {
        $documento = DB::select('select * from documento, cliente, abogado  where doc_cliente = cl_nit and abg_ci = doc_abogado and doc_id = ?', [$id]);
        $comentariosDoc = DB::select('select * from comentario, usuario where com_usuario = id and com_doc = ?', [$id]);
        $imagenDocumento = $documento[0]->doc_titulo;
        $extensionArchivo = pathinfo($imagenDocumento, PATHINFO_EXTENSION);
        return view('Documento.show',compact('documento','comentariosDoc', 'extensionArchivo'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request)
    {
        //Validation
        $campos=[
            'doc_descripcion' => 'required|string|max:125',
        ];
        $Mensaje = [
            "doc_descripcion.required" => 'El campo descripción es requerido.',
            "doc_descripcion.max" => 'El campo descripción debe ser menor a :max caracteres.',
            "doc_descripcion.string" => 'El campo descripción debe ser una cadena.', 
        ];
        $this->validate($request,$campos,$Mensaje);
        //--Validation
        $documento = Documento::find($request->input('doc_id'));
        $documento->update($request->all());
        return $this->show($documento->doc_id);
    }

    public function destroy($id)
    {
        $documento = Documento::find($id);
        if(Storage::delete('public/'.$documento->doc_url)){
            
            $documento->delete();
            return "Se eliminó";
        }
        return "No se eliminó";
    }

    public function download($id){
        $documento = Documento::find($id);
        return Storage::download('public/'.$documento->doc_url, $documento->doc_titulo);
    }
}

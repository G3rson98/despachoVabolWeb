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
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function indexPorCategoria($id)
    {
        $idUsuario = auth()->user()->id ;
        $rol = auth()->user()->rol;

        if ($rol == "Cliente") {
            $respCliente = DB::select('select cl_nit from cliente where cl_usuario = ?', [$idUsuario]);
            $idCliente = $respCliente[0]->cl_nit;
            $documentosPorCategoria = DB::select('select * from documento where doc_categoriadoc = ? and doc_cliente = ?', [$id, $idCliente]);
            
        }else{
            $resAbog = DB::select('select abg_ci from abogado where abg_usuario = ?', [$idUsuario]);
            $idAbogado = $resAbog[0]->abg_ci;
            $documentosPorCategoria = DB::select('select * from documento where doc_categoriadoc = ? and doc_abogado = ?', [$id, $idAbogado]);
        }

        $categoria = CategoriaDocumento::find($id);

        $tema = [
            "colora" => auth()->user()->colora,
            "colorb" => auth()->user()->colorb,
            "colorc" => auth()->user()->colorc,
        ];

        DB::update('update visitas set numero_visitas=numero_visitas+1 where nombre_pagina = ?', ['documento_index']);
        $visitas = DB::select('select * from visitas where nombre_pagina = ?', ['documento_index']);

        return view('Documento.indexPorDocumento',compact('documentosPorCategoria', 'categoria', 'tema', 'visitas'));
        // $documentosPorCategoria = CategoriaDocumento::find($id)->documento;
        // $categoria = CategoriaDocumento::find($id);
        // return view('Documento.indexPorDocumento',compact('documentosPorCategoria', 'categoria'));
    }


    public function create()
    {
        $clientes = Cliente::all();
        $categorias = CategoriaDocumento::all();

        $tema = [
            "colora" => auth()->user()->colora,
            "colorb" => auth()->user()->colorb,
            "colorc" => auth()->user()->colorc,
        ];

        DB::update('update visitas set numero_visitas=numero_visitas+1 where nombre_pagina = ?', ['documento_create']);
        $visitas = DB::select('select * from visitas where nombre_pagina = ?', ['documento_create']);

        return view('Documento.create', compact('clientes', 'categorias', 'tema', 'visitas'));
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

        $idUsuario = auth()->user()->id ;
        $resAbog = DB::select('select abg_ci from abogado where abg_usuario = ?', [$idUsuario]);
        $idAbogado = $resAbog[0]->abg_ci;
        
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
            $documento->doc_abogado = $idAbogado; 
            $documento->doc_categoriadoc = $request->input('doc_categoriadoc');
            $documento->doc_idmail = 1; 
            $documento->save();

            //Insercion Bitacora
                date_default_timezone_set("America/La_Paz");
                $fecha = date('Y-m-d');
                $hora = date("G:i:s");
                DB::insert('insert into bitacora (bit_nombre, bit_accion, bit_fecha, bit_hora) values (?, ?, ?, ?)', [auth()->user()->email, 'Subió un documento.',$fecha,$hora]);
            //Insercion Bitacora
        }


        return redirect()->route('documento.create');
    }

    public function show($id)
    {
        $documento = DB::select('select * from documento, cliente, abogado  where doc_cliente = cl_nit and abg_ci = doc_abogado and doc_id = ?', [$id]);
        $comentariosDoc = DB::select('select * from comentario, usuario where com_usuario = id and com_doc = ?', [$id]);
        $imagenDocumento = $documento[0]->doc_titulo;
        $extensionArchivo = pathinfo($imagenDocumento, PATHINFO_EXTENSION);

        $tema = [
            "colora" => auth()->user()->colora,
            "colorb" => auth()->user()->colorb,
            "colorc" => auth()->user()->colorc,
        ];

        DB::update('update visitas set numero_visitas=numero_visitas+1 where nombre_pagina = ?', ['documento_show']);
        $visitas = DB::select('select * from visitas where nombre_pagina = ?', ['documento_show']);

        return view('Documento.show',compact('documento','comentariosDoc', 'extensionArchivo', 'tema', 'visitas'));
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

        //Insercion Bitacora
        date_default_timezone_set("America/La_Paz");
        $fecha = date('Y-m-d');
        $hora = date("G:i:s");
        DB::insert('insert into bitacora (bit_nombre, bit_accion, bit_fecha, bit_hora) values (?, ?, ?, ?)', [auth()->user()->email, 'Editó un documento.',$fecha,$hora]);
        //Insercion Bitacora

        return $this->show($documento->doc_id);
    }

    public function destroy($id)
    {
        $documento = Documento::find($id);
        $idCategoria = $documento->doc_categoriadoc;
        if(Storage::delete('public/'.$documento->doc_url)){
            
            $documento->delete();
            //Insercion Bitacora
                date_default_timezone_set("America/La_Paz");
                $fecha = date('Y-m-d');
                $hora = date("G:i:s");
                DB::insert('insert into bitacora (bit_nombre, bit_accion, bit_fecha, bit_hora) values (?, ?, ?, ?)', [auth()->user()->email, 'Eliminó un documento.',$fecha,$hora]);
            //Insercion Bitacora
            return  redirect()->route('documento.documentosPorCategoria', ['id' => $idCategoria]);
        }
        return  redirect()->route('documento.documentosPorCategoria', ['id' => $idCategoria]);
    }

    public function download($id){
        $documento = Documento::find($id);

        //Insercion Bitacora
        date_default_timezone_set("America/La_Paz");
        $fecha = date('Y-m-d');
        $hora = date("G:i:s");
        DB::insert('insert into bitacora (bit_nombre, bit_accion, bit_fecha, bit_hora) values (?, ?, ?, ?)', [auth()->user()->email, 'Descargó un documento.',$fecha,$hora]);
        //Insercion Bitacora

        return Storage::download('public/'.$documento->doc_url, $documento->doc_titulo);
    }

    public function estadistica(){
        $tema = [
            "colora" => auth()->user()->colora,
            "colorb" => auth()->user()->colorb,
            "colorc" => auth()->user()->colorc,
        ];
        $junio      = DB::select("select count(*) from documento where doc_fechasubida >= '2020-06-01' and doc_fechasubida<= '2020-06-30'");
        $julio      = DB::select("select count(*) from documento where doc_fechasubida >= '2020-07-01' and doc_fechasubida<= '2020-07-31'");
        $agosto     = DB::select("select count(*) from documento where doc_fechasubida >= '2020-08-01' and doc_fechasubida<= '2020-08-31'");
        $septiembre = DB::select("select count(*) from documento where doc_fechasubida >= '2020-09-01' and doc_fechasubida<= '2020-08-30'");

        $listaDocumentos = [$junio[0]->count, $julio[0]->count, $agosto[0]->count, $septiembre[0]->count];

        return view('Documento.estadisticas', compact('tema', 'listaDocumentos'));
    }
}

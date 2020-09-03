<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CategoriaDocumento;
use Illuminate\Support\Facades\DB;

class CategoriaDocumentoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $categoriasDocumento = CategoriaDocumento::all();

        $tema = [
            "colora" => auth()->user()->colora,
            "colorb" => auth()->user()->colorb,
            "colorc" => auth()->user()->colorc,
            "rol" => auth()->user()->rol,
        ];

        DB::update('update visitas set numero_visitas=numero_visitas+1 where nombre_pagina = ?', ['catdocumento_index']);
        $visitas = DB::select('select * from visitas where nombre_pagina = ?', ['catdocumento_index']);

        return view('CategoriaDocumento.index',compact('categoriasDocumento', 'visitas', 'tema'));
    }

    public function create()
    {
        DB::update('update visitas set numero_visitas=numero_visitas+1 where nombre_pagina = ?', ['catdocumento_create']);
        $visitas = DB::select('select * from visitas where nombre_pagina = ?', ['catdocumento_create']);

        $tema = [
            "colora" => auth()->user()->colora,
            "colorb" => auth()->user()->colorb,
            "colorc" => auth()->user()->colorc,
            "rol" => auth()->user()->rol,
        ];

        return view('CategoriaDocumento.create', compact('visitas' ,'tema'));
    }

    public function store(Request $request)
    {
        //Validation
        $campos=[
            'catdoc_nombre' => 'required|string|max:125',
            'catdoc_descripcion' => 'required|string|max:255',
        ];
        $Mensaje = [
            "catdoc_nombre.required" => 'El campo nombre es requerido.',
            "catdoc_descripcion.required" => 'El campo descripción es requerido.',
            "catdoc_nombre.max" => 'El campo nombre debe ser menor a :max caracteres.',
            "catdoc_descripcion.max" => 'El campo descripción debe ser menor a :max caracteres.',
            "catdoc_nombre.string" => 'El campo nombre debe ser una cadena.', 
            "catdoc_descripcion.string" => 'El campo descripción debe ser una cadena.', 
        ];
        $this->validate($request,$campos,$Mensaje);
        //--Validation

        $categoriaDocumento = new CategoriaDocumento();
        $categoriaDocumento->catdoc_nombre = $request->input('catdoc_nombre');
        $categoriaDocumento->catdoc_descripcion = $request->input('catdoc_descripcion');
        $categoriaDocumento->save();

        //Insercion Bitacora

        date_default_timezone_set("America/La_Paz");
        $fecha = date('Y-m-d');
        $hora = date("G:i:s");

        DB::insert('insert into bitacora (bit_nombre, bit_accion, bit_fecha, bit_hora) values (?, ?, ?, ?)', [auth()->user()->email, 'Registró una categoría documento.',$fecha,$hora]);
        //Insercion Bitacora
        $request->session()->flash('alert-success', 'Categoría documento registrada con éxito!');
        return redirect()->route('categoriadocumento.index');
    }


    public function edit($id)
    {
        $categoriaDocumento=CategoriaDocumento::find($id);

        $tema = [
            "colora" => auth()->user()->colora,
            "colorb" => auth()->user()->colorb,
            "colorc" => auth()->user()->colorc,
            "rol" => auth()->user()->rol,
        ];

        DB::update('update visitas set numero_visitas=numero_visitas+1 where nombre_pagina = ?', ['catdocumento_edit']);
        $visitas = DB::select('select * from visitas where nombre_pagina = ?', ['catdocumento_edit']);

        return view('CategoriaDocumento.edit',compact('categoriaDocumento', 'tema', 'visitas'));
    }

    public function update(Request $request, $id)
    {
        //Validation
        $campos=[
            'catdoc_nombre' => 'required|string|max:125',
            'catdoc_descripcion' => 'required|string|max:255',
        ];
        $Mensaje = [
            "catdoc_nombre.required" => 'El campo nombre es requerido.',
            "catdoc_descripcion.required" => 'El campo descripción es requerido.',
            "catdoc_nombre.max" => 'El campo nombre debe ser menor a :max caracteres.',
            "catdoc_descripcion.max" => 'El campo descripción debe ser menor a :max caracteres.',
            "catdoc_nombre.string" => 'El campo nombre debe ser una cadena.', 
            "catdoc_descripcion.string" => 'El campo descripción debe ser una cadena.', 
        ];
        $this->validate($request,$campos,$Mensaje);
        //--Validation
        
        $categoriaDocumento = CategoriaDocumento::find($id);
        $categoriaDocumento->update($request->all());

        //Insercion Bitacora
        date_default_timezone_set("America/La_Paz");
        $fecha = date('Y-m-d');
        $hora = date("G:i:s");
        DB::insert('insert into bitacora (bit_nombre, bit_accion, bit_fecha, bit_hora) values (?, ?, ?, ?)', [auth()->user()->email, 'Editó una categoría documento.',$fecha,$hora]);
        //Insercion Bitacora
        $request->session()->flash('alert-success', 'Categoría documento modificada con éxito!');
        return redirect()->route('categoriadocumento.index');
    }

    public function destroy($id)
    {
        $categoriaDocumento = CategoriaDocumento::find($id);
        $categoriaDocumento->delete();

        //Insercion Bitacora
        date_default_timezone_set("America/La_Paz");
        $fecha = date('Y-m-d');
        $hora = date("G:i:s");
        DB::insert('insert into bitacora (bit_nombre, bit_accion, bit_fecha, bit_hora) values (?, ?, ?, ?)', [auth()->user()->email, 'Eliminó una categoría documento.',$fecha,$hora]);
        //Insercion Bitacora
        return redirect()->route('categoriadocumento.index');
    }
}

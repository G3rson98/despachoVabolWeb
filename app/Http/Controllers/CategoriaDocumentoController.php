<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CategoriaDocumento;

class CategoriaDocumentoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $categoriasDocumento = CategoriaDocumento::all();
        return view('CategoriaDocumento.index',compact('categoriasDocumento'));
    }

    public function create()
    {
        return view('CategoriaDocumento.create');
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

        return redirect()->route('categoriadocumento.create');
        
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $categoriaDocumento=CategoriaDocumento::find($id);
        return view('CategoriaDocumento.edit',compact('categoriaDocumento'));
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
        return redirect()->route('categoriadocumento.index');
    }

    public function destroy($id)
    {
        $categoriaDocumento = CategoriaDocumento::find($id);
        $categoriaDocumento->delete();
        return redirect()->route('categoriadocumento.index');
    }
}

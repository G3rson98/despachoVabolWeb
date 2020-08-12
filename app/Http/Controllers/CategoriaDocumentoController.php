<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CategoriaDocumento;

class CategoriaDocumentoController extends Controller
{

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
        $categoriaDocumento = new CategoriaDocumento();
        $categoriaDocumento->catdoc_nombre = $request->input('catdoc_nombre');
        $categoriaDocumento->catdoc_descripcion = $request->input('catdoc_descripcion');
        $categoriaDocumento->save();

        return redirect()->route('categoriadocumento.index');
        
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

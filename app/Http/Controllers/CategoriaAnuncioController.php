<?php

namespace App\Http\Controllers;

use App\CategoriaAnuncio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriaAnuncioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        DB::update('update visitas set numero_visitas=numero_visitas+1 where nombre_pagina = ?', ['catanuncio_index']);
        $visitas = DB::select('select * from visitas where nombre_pagina = ?', ['catanuncio_index']);

        $datos['categorias']=CategoriaAnuncio::paginate();

        return view('Publicaciones.GestionarCategoriaAnuncio.indexCategoriaAnuncio',$datos, compact('visitas'));
    }

    public function create(){
        DB::update('update visitas set numero_visitas=numero_visitas+1 where nombre_pagina = ?', ['catanuncio_create']);
        $visitas = DB::select('select * from visitas where nombre_pagina = ?', ['catanuncio_create']);

        return view('Publicaciones.GestionarCategoriaAnuncio.createCategoriaAnuncio', compact('visitas'));
    }

    public function store(Request $request)
    {
        //Validation
        $campos=[
            'cat_nombre' => 'required|string|max:125',
            'cat_descripcion' => 'required|string|max:300',
        ];
        $Mensaje = [
            "required" => 'El/La :attribute es requerido/a.',
            "max" => 'El/La :attribute debe ser menor a :max caracteres.',
            "string" => 'El/La :attribute debe ser una cadena.'
        ];
        $this->validate($request,$campos,$Mensaje);
        //--Validation

        $datosCategoria=request()->except('_token');

        CategoriaAnuncio::insert($datosCategoria);

        return redirect('categoriaanuncio');
    }

    public function destroy ($id){
        CategoriaAnuncio::destroy($id);

        return redirect('categoriaanuncio');
    }

    public function edit($id){
        DB::update('update visitas set numero_visitas=numero_visitas+1 where nombre_pagina = ?', ['catanuncio_edit']);
        $visitas = DB::select('select * from visitas where nombre_pagina = ?', ['catanuncio_edit']);

        $categoria= CategoriaAnuncio::findOrFail($id);
        return view('Publicaciones.GestionarCategoriaAnuncio.editCategoriaAnuncio',compact('categoria', 'visitas'));
    }

    public function update(Request $request, $id){

        //Validation
        $campos=[
            'cat_nombre' => 'required|string|max:125',
            'cat_descripcion' => 'required|string|max:300',
        ];
        $Mensaje = [
            "required" => 'El/La :attribute es requerido/a.',
            "max" => 'El/La :attribute debe ser menor a :max caracteres.',
            "string" => 'El/La :attribute debe ser una cadena.'
        ];
        $this->validate($request,$campos,$Mensaje);
        //--Validation
        
        $datosCategoria=request()->except(['_token','_method']);
        CategoriaAnuncio::where('cat_id','=',$id)->update($datosCategoria);

        return redirect('categoriaanuncio');
    }
}

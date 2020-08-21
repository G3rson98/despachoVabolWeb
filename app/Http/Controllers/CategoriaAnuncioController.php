<?php

namespace App\Http\Controllers;

use App\CategoriaAnuncio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriaAnuncioController extends Controller
{
    public function index(){
        DB::update('update visitas set numero_visitas=numero_visitas+1 where nombre_pagina = ?', ['catanuncio_index']);
        $visitas = DB::select('select * from visitas where nombre_pagina = ?', ['catanuncio_index']);

        $datos['categorias']=CategoriaAnuncio::paginate();

        $tema = [
            "colora" => auth()->user()->colora,
            "colorb" => auth()->user()->colorb,
            "colorc" => auth()->user()->colorc,
        ];

        return view('Publicaciones.GestionarCategoriaAnuncio.indexCategoriaAnuncio',$datos, compact('visitas','tema'));
    }

    public function create(){
        DB::update('update visitas set numero_visitas=numero_visitas+1 where nombre_pagina = ?', ['catanuncio_create']);
        $visitas = DB::select('select * from visitas where nombre_pagina = ?', ['catanuncio_create']);

        $tema = [
            "colora" => auth()->user()->colora,
            "colorb" => auth()->user()->colorb,
            "colorc" => auth()->user()->colorc,
        ];

        return view('Publicaciones.GestionarCategoriaAnuncio.createCategoriaAnuncio', compact('visitas','tema'));
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

        //Insercion Bitacora

        $fecha = date('Y-m-d');
        date_default_timezone_set("America/La_Paz");
        $hora = date("G:i:s");

        DB::insert('insert into bitacora (bit_nombre, bit_accion, bit_fecha, bit_hora) values (?, ?, ?, ?)', [auth()->user()->email, 'Registró una categoría de anuncio.',$fecha,$hora]);
        //Insercion Bitacora

        return redirect('categoriaanuncio');
    }

    public function destroy ($id){
        CategoriaAnuncio::destroy($id);
        
        //Insercion Bitacora

        $fecha = date('Y-m-d');
        date_default_timezone_set("America/La_Paz");
        $hora = date("G:i:s");

        DB::insert('insert into bitacora (bit_nombre, bit_accion, bit_fecha, bit_hora) values (?, ?, ?, ?)', [auth()->user()->email, 'Eliminó una categoría de anuncio.',$fecha,$hora]);
        //Insercion Bitacora

        return redirect('categoriaanuncio');
    }

    public function edit($id){
        DB::update('update visitas set numero_visitas=numero_visitas+1 where nombre_pagina = ?', ['catanuncio_edit']);
        $visitas = DB::select('select * from visitas where nombre_pagina = ?', ['catanuncio_edit']);

        $tema = [
            "colora" => auth()->user()->colora,
            "colorb" => auth()->user()->colorb,
            "colorc" => auth()->user()->colorc,
        ];
        
        $categoria= CategoriaAnuncio::findOrFail($id);
        return view('Publicaciones.GestionarCategoriaAnuncio.editCategoriaAnuncio',compact('categoria', 'visitas','tema'));
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

        //Insercion Bitacora

        $fecha = date('Y-m-d');
        date_default_timezone_set("America/La_Paz");
        $hora = date("G:i:s");

        DB::insert('insert into bitacora (bit_nombre, bit_accion, bit_fecha, bit_hora) values (?, ?, ?, ?)', [auth()->user()->email, 'Modificó una categoría de anuncio.',$fecha,$hora]);
        //Insercion Bitacora

        return redirect('categoriaanuncio');
    }
}

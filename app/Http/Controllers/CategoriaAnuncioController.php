<?php

namespace App\Http\Controllers;

use App\CategoriaAnuncio;
use Illuminate\Http\Request;

class CategoriaAnuncioController extends Controller
{
    public function index(){
        $datos['categorias']=CategoriaAnuncio::paginate(5);

        return view('Publicaciones.GestionarCategoriaAnuncio.indexCategoriaAnuncio',$datos);
    }

    public function create(){
        return view('Publicaciones.GestionarCategoriaAnuncio.createCategoriaAnuncio');
    }

    public function store(Request $request)
    {
        $datosCategoria=request()->except('_token');

        CategoriaAnuncio::insert($datosCategoria);

        return response()->json($datosCategoria);
    }

    public function destroy ($id){
        CategoriaAnuncio::destroy($id);

        return redirect('categoriaanuncio');
    }

    public function edit($id){
        $categoria= CategoriaAnuncio::findOrFail($id);
        return view('Publicaciones.GestionarCategoriaAnuncio.editCategoriaAnuncio',compact('categoria'));
    }
}

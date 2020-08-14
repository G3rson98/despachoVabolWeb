<?php

namespace App\Http\Controllers;

use App\Abogado;
use App\Anuncio;
use App\CategoriaAnuncio;
use Illuminate\Http\Request;

class AnuncioController extends Controller
{
    public function index(){
        $datos['anuncios']=Anuncio::paginate();

        return view('Publicaciones.GestionarAnuncio.indexAnuncio',$datos);
    }

    public function create(){
        $abogados = Abogado::all();
        $categorias = CategoriaAnuncio::all();
        return view('Publicaciones.GestionarAnuncio.createAnuncio',compact('abogados'),compact('categorias'));
    }

    public function store(Request $request)
    {
        $datosAnuncio=request()->except('_token');

        // Anuncio::insert($datosAnuncio);

        // return redirect('anuncio');
        return response()->json($datosAnuncio);
    }

    public function destroy ($id){
        Anuncio::destroy($id);

        return redirect('anuncio');
    }

    public function edit($id){
        $anuncio= Anuncio::findOrFail($id);
        return view('Publicaciones.GestionarAnuncio.editAnuncio',compact('anuncio'));
    }

    public function update(Request $request, $id){
        $datosAnuncio=request()->except(['_token','_method']);
        Anuncio::where('anu_id','=',$id)->update($datosAnuncio);

        return redirect('anuncio');
    }
}

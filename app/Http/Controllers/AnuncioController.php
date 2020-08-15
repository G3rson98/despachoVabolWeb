<?php

namespace App\Http\Controllers;

use App\Abogado;
use App\Anuncio;
use App\CategoriaAnuncio;
use Illuminate\Http\Request;

class AnuncioController extends Controller
{
    public function index()
    {
        $datos['anuncios'] = Anuncio::paginate();

        return view('Publicaciones.GestionarAnuncio.indexAnuncio', $datos);
    }

    public function create()
    {
        $abogados = Abogado::all();
        $categorias = CategoriaAnuncio::all();
        return view('Publicaciones.GestionarAnuncio.createAnuncio', compact('abogados'), compact('categorias'));
    }

    public function store(Request $request)
    {
        $anuncio = new Anuncio();
        $anuncio->anu_titulo = $request->input('anu_titulo');
        $anuncio->anu_contenido = $request->input('anu_contenido');
        $anuncio->anu_abogado = $request->input('anu_abogado');
        $anuncio->anu_categoria = $request->input('anu_categoria');
        $anuncio->anu_estado = 1;
        $anuncio->anu_fechapub = date('Y-m-d');
        date_default_timezone_set("America/La_Paz");
        $anuncio->anu_horapub = date("G:i:s");
        $anuncio->save();
        return redirect('anuncio');
    }

    public function destroy($id)
    {
        Anuncio::destroy($id);

        return redirect('anuncio');
    }

    public function edit($id)
    {
        $anuncio = Anuncio::findOrFail($id);
        return view('Publicaciones.GestionarAnuncio.editAnuncio', compact('anuncio'));
    }

    public function update(Request $request, $id)
    {
        $datosAnuncio = request()->except(['_token', '_method']);
        Anuncio::where('anu_id', '=', $id)->update($datosAnuncio);

        return redirect('anuncio');
    }
}

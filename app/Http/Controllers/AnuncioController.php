<?php

namespace App\Http\Controllers;

use App\Abogado;
use App\Anuncio;
use App\CategoriaAnuncio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnuncioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        // $datos['anuncios'] = Anuncio::paginate();

        $datos['anuncios'] = DB::table('anuncio')
            ->join('abogado', 'anuncio.anu_abogado', '=', 'abogado.abg_ci')
            ->join('categoriaanuncio', 'anuncio.anu_categoria', '=', 'categoriaanuncio.cat_id')
            ->select('anuncio.*', 'abogado.abg_nombre', 'abogado.abg_apellidop', 'abogado.abg_apellidom', 'categoriaanuncio.cat_nombre')
            ->get();

        // return response()->json($datos);
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
        //Validation
        $campos=[
            'anu_titulo' => 'required|string|max:125',
            'anu_contenido' => 'required|string|max:500',
            'anu_abogado' => 'required|numeric',
            'anu_categoria' => 'required|numeric',
        ];
        $Mensaje = [
            "required" => 'El/La :attribute es requerido/a.',
            "max" => 'El/La :attribute debe ser menor a :max caracteres.',
            "string" => 'El/La :attribute debe ser una cadena.',
            "numeric" => 'El/La :attribute debe ser un numero.'
        ];
        $this->validate($request,$campos,$Mensaje);
        //--Validation
        
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
        $abogados = Abogado::all();
        $categorias = CategoriaAnuncio::all();

        return view('Publicaciones.GestionarAnuncio.editAnuncio', compact('anuncio', 'abogados', 'categorias'));
    }

    public function editEstado($id)
    {
        $anuncio = Anuncio::findOrFail($id);
        if ($anuncio->anu_estado == 1) {
            $anuncio->anu_estado = 0;
        } else {
            $anuncio->anu_estado = 1;
        }
        // Anuncio::where('anu_id', '=', $id)->update($anuncio);
        $anuncio->update();
        return redirect('anuncio');
    }

    public function update(Request $request, $id)
    {
        //Validation
        $campos=[
            'anu_titulo' => 'required|string|max:125',
            'anu_contenido' => 'required|string|max:500',
            'anu_abogado' => 'required|numeric',
            'anu_categoria' => 'required|numeric',
        ];
        $Mensaje = [
            "required" => 'El/La :attribute es requerido/a.',
            "max" => 'El/La :attribute debe ser menor a :max caracteres.',
            "string" => 'El/La :attribute debe ser una cadena.',
            "numeric" => 'El/La :attribute debe ser un numero.'
        ];
        $this->validate($request,$campos,$Mensaje);
        //--Validation
        
        $datosAnuncio = request()->except(['_token', '_method']);
        Anuncio::where('anu_id', '=', $id)->update($datosAnuncio);

        return redirect('anuncio');
        // return response()->json($datosAnuncio);
    }
}

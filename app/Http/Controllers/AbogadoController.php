<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Abogado;

class AbogadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $abogados= Abogado::all();
        return view('Usuario.GestionarAbogado.index',['Abogados'=>$abogados]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Usuario.GestionarAbogado.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        $abogado= new Abogado($request->all());             
        $fecha="".$request['abg_ano']."-".$request['abg_mes']."-".$request['abg_dia'];
        $abogado->abg_fnacimiento=$fecha;
        $abogado->save();
        return redirect()->route('abogado.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   $Abogado= new Abogado();
        $Abogado=Abogado::findOrFail($id);
        return view('Usuario.GestionarAbogado.edit',['Abogado'=>$Abogado]);
        //echo(substr($Abogado->abg_fnacimiento,5,2));
        //echo($Abogado);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $Abogado= new Abogado();
        $Abogado=Abogado::find($id);
        $Abogado->abg_nombre = $request['abg_nombre'];
        $Abogado->abg_apellidop = $request ['abg_apellidop'];
        $Abogado->abg_apellidom = $request['abg_apellidom'];
        $Abogado->abg_especialidad = $request['abg_especialidad'];
        $Abogado->abg_celular = $request['abg_celular'];
        $fecha="".$request['abg_ano']."-".$request['abg_mes']."-".$request['abg_dia'];
        $Abogado->abg_fnacimiento=$fecha;
        $Abogado->abg_genero = $request['abg_genero'];
        $Abogado->abg_nrocolabogados = $request['abg_nrocolabogados'];
        $Abogado->abg_nrominjusticia = $request['abg_nrominjusticia'];
        $Abogado->abg_numregcorte = $request['abg_numregcorte'];
        $Abogado->update($Abogado);
        return redirect()->route('abogado.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Abogado= new Abogado();
        $Abogado=Abogado::findOrFail($id);
        $Abogado->delete();
        redirect()->route('Abogado.index');
    }
}

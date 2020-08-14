<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cliente= Cliente::all();
        return view('Usuario.GestionarCliente.index',['Clientes'=>$cliente]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Usuario.GestionarCliente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cliente= new Cliente($request->all());                     
        $cliente->save();
        return redirect()->route('Cliente.index');
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
    {
        $cliente= new Cliente();
        $Abogado=Cliente::findOrFail($id);
        return view('Usuario.GestionarCliente.edit',['Cliente'=>$Abogado]);
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
        $cliente= new Cliente();
        $cliente=Cliente::findOrFail($id);
        $cliente->abg_nombre = $request['abg_nombre'];
        $cliente->abg_apellidop = $request ['abg_apellidop'];
        $cliente->abg_apellidom = $request['abg_apellidom'];
        $cliente->abg_especialidad = $request['abg_especialidad'];
        $cliente->abg_celular = $request['abg_celular'];               
        $cliente->abg_genero = $request['abg_genero'];
        $cliente->abg_nrocolabogados = $request['abg_nrocolabogados'];
        $cliente->abg_nrominjusticia = $request['abg_nrominjusticia'];
        $cliente->abg_numregcorte = $request['abg_numregcorte'];
        $cliente->save();
        return redirect()->route('cliente.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente= new Cliente();
        $cliente=Cliente::findOrFail($id);
        $cliente->delete();
        redirect()->route('cliente.index');
    }
}

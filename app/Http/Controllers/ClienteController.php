<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use App\Usuario;
use Illuminate\Support\Facades\Hash;

class ClienteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
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
        $campos=[
            'cl_nit' => 'required|unique:cliente',
            'cl_ciudad' => 'required|string',
            'cl_descripcion' => 'required|string',
            'cl_direccion' => 'required|string|max:125',
            'cl_nrepresentante' => 'required|string',
            'cl_paginaweb' => 'nullable|string',
            'cl_pais' => 'required|string',
            'cl_razonsocial' => 'required|string',
            'cl_rubro' => 'required|string',
            'cl_telefono' => 'required|numeric',
            'email' => 'required|email|unique:usuario',
            'password' => 'required|min:8',
            'password_Confirm' => 'required|same:password',

        ];
        $Mensaje = [            
            "cl_nit.required" => 'El nit es requerido',
            "cl_nit.unique" => 'Nit existente por favor intente con otro',
            "cl_ciudad.required" => 'La ciudad es requerido',
            "cl_ciudad.string" => 'La ciudad debe ser una cadena',
            "cl_descripcion.required" => 'La descripcion de la empresa es requerido',
            "cl_descripcion.string" => 'La descripcion debe ser una cadena',
            "cl_direccion.required" => 'La direccion de la empresa es requerido',
            "cl_direccion.string" => 'La direccion de la empresa debe ser una cadena',
            "cl_direccion.max" => 'La direccion de la empresa es demasiado larga',
            "cl_nrepresentante.required" => 'El nombre del representante es requerido',
            "cl_nrepresentante.string" => 'El nombre del representante debe ser una cadena',
            "cl_paginaweb.string" => 'la pagina web debe ser una cadena',
            "cl_pais.required" => 'El pais es requerido',
            "cl_pais.string" => 'El pais debe ser una cadena',
            "cl_razonsocial.required" => 'La razon social es requerido',
            "cl_razonsocial.string" => 'La razon social debe ser una cadena',
            "cl_rubro.required" => 'El rubro es requerido',  
            "cl_rubro.string" => 'El rubro debe ser una cadena',  
            "cl_telefono.required" => 'El telefono es requerido',
            "cl_telefono.numeric" => 'El telefono debe ser numerico',            
            "email.required" => 'El email es requerido',                        
            "email.email" => 'El email no es un formato valido',                        
            "email.unique" => 'Email existente por favor ingrese otro email',
            "password.required" => 'La contraseña es requerida',                        
            "password.min" => 'La contraseña debe contener al menos 8 caracteres',
            "password_Confirm.same" => 'Las contraseñas no coinciden',
        ];
        $this->validate($request,$campos,$Mensaje);

        $usuario= new Usuario();
        $usuario->email=$request['email'];
        $usuario->password = Hash::make($request['password']);
        $usuario->rol = 'Cliente';
        $usuario->save();
        $cliente= new Cliente();
        $cliente->cl_nit = $request['cl_nit'];        
        $cliente->cl_ciudad = $request['cl_ciudad'];
        $cliente->cl_descripcion = $request ['cl_descripcion'];
        $cliente->cl_direccion = $request['cl_direccion'];
        $cliente->cl_nrepresentante = $request['cl_nrepresentante'];
        $cliente->cl_paginaweb = $request['cl_paginaweb'];               
        $cliente->cl_pais = $request['cl_pais'];
        $cliente->cl_razonsocial = $request['cl_razonsocial'];
        $cliente->cl_rubro = $request['cl_rubro'];
        $cliente->cl_telefono = $request['cl_telefono'];
        $cliente->cl_usuario = $usuario['id'];
        $cliente->save();
        return redirect()->route('cliente.index');                             
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
        $cliente=Cliente::findOrFail($id);
        return view('Usuario.GestionarCliente.edit',['cliente'=>$cliente]);
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
        $cliente->cl_ciudad = $request['cl_ciudad'];
        $cliente->cl_descripcion = $request ['cl_descripcion'];
        $cliente->cl_direccion = $request['cl_direccion'];
        $cliente->cl_nrepresentante = $request['cl_nrepresentante'];
        $cliente->cl_paginaweb = $request['cl_paginaweb'];               
        $cliente->cl_pais = $request['cl_pais'];
        $cliente->cl_razonsocial = $request['cl_razonsocial'];
        $cliente->cl_rubro = $request['cl_rubro'];
        $cliente->cl_telefono = $request['cl_telefono'];
        $cliente->update();
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use App\Usuario;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

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
        $tema = $this->getTema();        
        $visitas = $this->updateGetVisitas('cliente_index');
        $cliente= Cliente::all();
        return view('Usuario.GestionarCliente.index',['Clientes'=>$cliente],compact('visitas','tema'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tema = $this->getTema();        
        $visitas = $this->updateGetVisitas('cliente_create');
        return view('Usuario.GestionarCliente.create',compact('visitas','tema'));
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
        $usuario->colora='#343A40';
        $usuario->colorb='#212529';
        $usuario->colorc='#F8F9FA';
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
        $this->bitacora('Registro un nuevo cliente con nit:'.$request['cl_nit'].'y razon social:'.$request['cl_razonsocial']);
        $tema = $this->getTema();        
        $visitas =$this->updateGetVisitas('cliente_index');
        return redirect()->route('cliente.index',compact('visitas','tema'));                             
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
        $tema = $this->getTema();       
        $visitas = $this->updateGetVisitas('cliente_edit');
        return view('Usuario.GestionarCliente.edit',['cliente'=>$cliente],compact('visitas','tema'));
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
        ];
        $this->validate($request,$campos,$Mensaje);
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
        $this->bitacora('Modifico el cliente con nit:'.$cliente->cl_nit.' y razon social :'.$cliente->cl_razonsocial);
        $tema = $this->getTema();        
        $visitas = $this->updateGetVisitas('cliente_index');
        return redirect()->route('cliente.index',compact('visitas','tema'));    

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
        $id= $cliente['cl_usuario'];
        Usuario::destroy($id);   
        $this->bitacora('Elimino el cliente con nit:'.$cliente->cl_nit.' y razon social:'.$cliente->cl_razonsocial);        
        $tema = $this->getTema();        
        $visitas = $this->updateGetVisitas('abogado_index');
        redirect()->route('cliente.index',compact('visitas','tema'));
    }

    public function getTema()
    {
        return  [
            "colora" => auth()->user()->colora,
            "colorb" => auth()->user()->colorb,
            "colorc" => auth()->user()->colorc,
        ];
    }

    public function updateGetVisitas($nombre_pagina)
    {
        DB::update('update visitas set numero_visitas=numero_visitas+1 where nombre_pagina = ?', [$nombre_pagina]);
        $visitas = DB::select('select * from visitas where nombre_pagina = ?', [$nombre_pagina]);
        return $visitas;
    }
    public function bitacora($accion)
    {
        $fecha = date('Y-m-d');
        date_default_timezone_set("America/La_Paz");
        $hora = date("G:i:s");        
        DB::insert('insert into bitacora (bit_nombre, bit_accion, bit_fecha, bit_hora) values (?, ?, ?, ?)', [auth()->user()->email,$accion,$fecha,$hora]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Abogado;
use App\Usuario;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AbogadoController extends Controller
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
        $visitas = $this->updateGetVisitas('abogado_index');
        $abogados= Abogado::all();
        return view('Usuario.GestionarAbogado.index',['Abogados'=>$abogados],compact('visitas','tema'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $tema = $this->getTema();        
        $visitas = $this->updateGetVisitas('abogado_create');
        return view('Usuario.GestionarAbogado.create',compact('visitas','tema'));
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
            'abg_ci' => 'required|string|max:125|unique:abogado',
            'abg_nombre' => 'required|string|max:500',
            'abg_apellidop' => 'required|string',
            'abg_apellidom' => 'required|string',
            'abg_especialidad' => 'required|string',
            'abg_celular' => 'required|numeric',
            'abg_ano' => 'required|numeric|max:2020',
            'abg_mes' => 'required|numeric|max:12',
            'abg_dia' => 'required|numeric|max:31',
            'abg_genero' => 'required|string',
            'abg_nrocolabogados' => 'required|numeric',
            'abg_nrominjusticia' => 'required|numeric',
            'abg_numregcorte' => 'required|numeric',
            'email' => 'required|email|unique:usuario',
            'password' => 'required|min:8',
            'password_Confirm' => 'required|same:password',

        ];
        $Mensaje = [
            "abg_ci.required" => 'El ci es requerido',
            "abg_ci.unique" => 'El ci ya existe',
            "abg_nombre.required" => 'El nombre es requerido',
            "abg_nombre.string" => 'El nombre debe ser una cadena',
            "abg_apellidop.required" => 'El apellido paterno es requerido',
            "abg_apellidop.string" => 'El apellido paterno debe ser una cadena',
            "abg_apellidom.string" => 'El apellido materno debe ser una cadena',
            "abg_apellidom.required" => 'El apellido materno es requerido',
            "abg_especialidad.required" => 'La especialidad es requerida',
            "abg_especialidad.string" => 'La especialidad debe ser una cadena',
            "abg_celular.required" => 'El numero de celular es requerido', 
            "abg_celular.numeric" => 'El numero de celular debe contener solo numeros',
            "abg_ano.required" => 'El año es requerido',
            "abg_ano.numeric" => 'El año debe ser numerico',
            "abg_ano.max" => 'El año no es valido',
            "abg_mes.required" => 'El mes es requerido',        
            "abg_mes.numeric" => 'El mes debe ser numerico',
            "abg_mes.max" => 'El mes no es valido',     
            "abg_dia.required" => 'El día es requerido',        
            "abg_dia.numeric" => 'El día debe ser numerico',
            "abg_dia.max" => 'El día no es valido',
            "abg_genero.required" => 'El genero es requerido',                        
            "abg_genero.string" => 'El genero debe ser una cadena',
            "abg_nrocolabogados.required" => 'El numero de colegio de abogados es requerido',
            "abg_nrocolabogados.numeric" => 'El numero de colegio de abogados debe ser numerico',
            "abg_nrominjusticia.numeric" => 'El numero de ministerio de justicia debe ser numerico',
            "abg_nrominjusticia.required" => 'El numero de ministerio de justicia es requerido',                        
            "abg_numregcorte.required" => 'El numero de registro en la corte es requerido',
            "abg_numregcorte.numeric" => 'El numero de registro en la corte debe ser numerico',
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
        $usuario->rol = $request['rol'];
        $usuario->colora='#343A40';
        $usuario->colorb='#212529';
        $usuario->colorc='#F8F9FA';
        $usuario->save();       
        $Abogado= new Abogado();
        $Abogado->abg_ci = $request['abg_ci'];             
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
        $Abogado->abg_usuario = $usuario['id'];
        $Abogado->save();
        
        $this->bitacora('Registro un nuevo abogado con ci:'.$request['abg_ci'].' y nombre:'.$request['abg_nombre']);
        $tema = $this->getTema();        
        $visitas =$this->updateGetVisitas('abogado_index');

        //mensaje OK!
        $request->session()->flash('alert-success', 'Abogado registrado con éxito!'); 

        return redirect()->route('abogado.index',compact('visitas','tema'));
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
        $tema = $this->getTema();       
        $visitas = $this->updateGetVisitas('abogado_edit');
        return view('Usuario.GestionarAbogado.edit',['Abogado'=>$Abogado],compact('visitas','tema'));
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
            'abg_nombre' => 'required|string|max:500',
            'abg_apellidop' => 'required|string',
            'abg_apellidom' => 'required|string',
            'abg_especialidad' => 'required|string',
            'abg_celular' => 'required|numeric',
            'abg_ano' => 'required|numeric|max:2020',
            'abg_mes' => 'required|numeric|max:12',
            'abg_dia' => 'required|numeric|max:31',
            'abg_genero' => 'required|string',
            'abg_nrocolabogados' => 'required|numeric',
            'abg_nrominjusticia' => 'required|numeric',
            'abg_numregcorte' => 'required|numeric',            
        ];
        $Mensaje = [                        
            "abg_nombre.required" => 'El nombre es requerido',
            "abg_nombre.string" => 'El nombre debe ser una cadena',
            "abg_apellidop.required" => 'El apellido paterno es requerido',
            "abg_apellidop.string" => 'El apellido paterno debe ser una cadena',
            "abg_apellidom.string" => 'El apellido materno debe ser una cadena',
            "abg_apellidom.required" => 'El apellido materno es requerido',
            "abg_especialidad.required" => 'La especialidad es requerida',
            "abg_especialidad.string" => 'La especialidad debe ser una cadena',
            "abg_celular.required" => 'El numero de celular es requerido', 
            "abg_celular.numeric" => 'El numero de celular debe contener solo numeros',
            "abg_ano.required" => 'El año es requerido',
            "abg_ano.numeric" => 'El año debe ser numerico',
            "abg_ano.max" => 'El año no es valido',
            "abg_mes.required" => 'El mes es requerido',        
            "abg_mes.numeric" => 'El mes debe ser numerico',
            "abg_mes.max" => 'El mes no es valido',     
            "abg_dia.required" => 'El día es requerido',        
            "abg_dia.numeric" => 'El día debe ser numerico',
            "abg_dia.max" => 'El día no es valido',
            "abg_genero.required" => 'El genero es requerido',                        
            "abg_genero.string" => 'El genero debe ser una cadena',
            "abg_nrocolabogados.required" => 'El numero de colegio de abogados es requerido',
            "abg_nrocolabogados.numeric" => 'El numero de colegio de abogados debe ser numerico',
            "abg_nrominjusticia.numeric" => 'El numero de ministerio de justicia debe ser numerico',
            "abg_nrominjusticia.required" => 'El numero de ministerio de justicia es requerido',                        
            "abg_numregcorte.required" => 'El numero de registro en la corte es requerido',
            "abg_numregcorte.numeric" => 'El numero de registro en la corte debe ser numerico',
        ];
        $this->validate($request,$campos,$Mensaje);
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
        $Abogado->update();

         $this->bitacora('Modifico el abogado con ci:'.$Abogado->abg_ci.' y nombre:'.$Abogado->abg_nombre);
         $tema = $this->getTema();        
         $visitas = $this->updateGetVisitas('abogado_index');

        //mensaje OK!
         $request->session()->flash('alert-success', 'Abogado modificado con éxito!'); 
        return redirect()->route('abogado.index',compact('visitas','tema'));
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
        //$Abogado->delete();
        $id= $Abogado['abg_usuario'];
        Usuario::destroy($id);    
        $this->bitacora('Elimino el abogado con ci:'.$Abogado->abg_ci.' y nombre:'.$Abogado->abg_nombre);        
        $tema = $this->getTema();        
        $visitas = $this->updateGetVisitas('abogado_index');
        return redirect()->route('abogado.index',compact('visitas','tema'));
    }

    public function buscador(Request $request)
    {   
        $Abogados = Abogado::where('abg_ci','like', $request->texto.'%')->get();
        $tema = $this->getTema();        
        $visitas = $this->updateGetVisitas('abogado_index');
        return view('Usuario.GestionarAbogado.tableAbogado',compact('Abogados','tema','visitas'));
    }
    public function getTema()
    {
        return  [
            "colora" => auth()->user()->colora,
            "colorb" => auth()->user()->colorb,
            "colorc" => auth()->user()->colorc,
            "rol" => auth()->user()->rol,
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
    public function estadistica(){
        $tema = $this->getTema(); 
        $Administrador = DB::select("select count(*) from bitacora where bit_accion like '%inicio sesion%'and bit_nombre in ( select email from usuario where rol='Administrador')");
        $Abogado      = DB::select("select count(*) from bitacora where bit_accion like '%inicio sesion%'and bit_nombre in ( select email from usuario where rol='Abogado')");
        $Cliente     = DB::select("select count(*) from bitacora where bit_accion like '%inicio sesion%'and bit_nombre in ( select email from usuario where rol='Cliente')");        

        $listaAbogados = [$Administrador[0]->count, $Abogado[0]->count, $Cliente[0]->count];

        return view('Usuario.GestionarAbogado.estadisticas', compact('tema', 'listaAbogados'));
    }
}

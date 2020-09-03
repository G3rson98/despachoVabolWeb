<?php

namespace App\Http\Controllers;

use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $tema = $this->getTema();
        return view('Usuario.GestionarUsuario.show', compact('tema'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $campos = [
            'password' => 'nullable|min:8',
            'password_Confirm' => 'nullable|same:password',
            'picture' => 'mimes:jpeg,bmp,png'
        ];
        $Mensaje = [
            "password.min" => 'La contraseña debe contener al menos 8 caracteres',
            "password_Confirm.same" => 'Las contraseñas no coinciden',
            "picture.mimes" => 'La foto de perfil debe ser formatos png o jpg',
        ];
        $this->validate($request, $campos, $Mensaje);

        $Usuario = new Usuario();
        $Usuario = Usuario::where('email', auth()->user()->email)->first();
        if ($request->hasFile('picture')) {           
            $Usuario->picture = $request->file('picture')->store('upload', 'public');
        }
        if ($request->password != null) {
            $Usuario->password = Hash::make($request->password);    
            $Usuario->update();        
        }
        
        return redirect()->route('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
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
    public function bitacora($accion)
    {
        $fecha = date('Y-m-d');
        date_default_timezone_set("America/La_Paz");
        $hora = date("G:i:s");
        DB::insert('insert into bitacora (bit_nombre, bit_accion, bit_fecha, bit_hora) values (?, ?, ?, ?)', [auth()->user()->email, $accion, $fecha, $hora]);
    }
}

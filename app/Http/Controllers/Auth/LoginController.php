<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Usuario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest', ['only' => 'showLoginForm']);
    }
    public function showLoginForm()
    {
        return view('login');
    }

    public function login()
    {

        $credentials = $this->validate(request(), [
            'email' => 'email|required|string',
            'password' => 'required|string'
        ]);
        $usu_email = $credentials['email'];
        $usu_contrasena = $credentials['password'];
        if (Auth::attempt(array(
            'password' => $usu_contrasena,
            'email' => $usu_email
        ))) {
            $this->bitacora('El usuario: '.auth()->user()->email .' inicio sesion en el sistema.');
            $this->getDatos($usu_email);            
            return redirect()->route('dashboard');
            //session()->put('nombre','Gerson');
            //return session()->all();
            //return Auth()->user()->rol;
        }
        return back()
            ->withErrors(['email' => 'Estas credenciales no concuerdan con nuestros registros'])
            ->withInput(request(['email']));
    }

    public function logout()
    {
        $this->bitacora('El usuario: '.auth()->user()->email .' cerro sesion del sistema.');
        Auth::logout();
        session()->forget('Usuario');
        return redirect('/');
    }
    private function getDatos($email)
    {
        $Usuario = Usuario::where('email', $email)->first();
        if ($Usuario->rol == 'Administrador' || $Usuario->rol == 'Abogado') {
            $tabla='abogado';
            $foreignKey = 'abg_usuario';
        }else{
            $tabla='cliente';
            $foreignKey = 'cl_usuario';
        }

        $UsuarioLogueado = Usuario::where('email', $email)->join($tabla, 'usuario.id', '=', $foreignKey)->first();
        session()->put('Usuario',$UsuarioLogueado);        
    }
    public function bitacora($accion)
    {
        $fecha = date('Y-m-d');
        date_default_timezone_set("America/La_Paz");
        $hora = date("G:i:s");        
        DB::insert('insert into bitacora (bit_nombre, bit_accion, bit_fecha, bit_hora) values (?, ?, ?, ?)', [auth()->user()->email,$accion,$fecha,$hora]);
    }
}

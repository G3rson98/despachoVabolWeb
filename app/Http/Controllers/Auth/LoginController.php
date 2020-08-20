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
        $this->middleware('guest',['only' => 'showLoginForm']);
    }
    public function showLoginForm(){
        return view('login');
    }

    public function login()
    {

        $credentials=$this->validate(request(),[
            'email' => 'email|required|string',
            'password' => 'required|string'
        ]);
        $usu_email= $credentials['email'];
        $usu_contrasena = $credentials ['password'];          
        if(Auth::attempt(array(
            'password' => $usu_contrasena,
            'email' => $usu_email
        ))){            
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
        Auth::logout();
        session()->forget('nombre');
        return redirect('/');
    }
    public function getDatos($email)
    {
        $Usuario= DB::table('usuario')
        ->join('abogado', 'usuario.id', '=', 'abogado.abg_usuario')
        ->get();
        
        
    }
}

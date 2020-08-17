<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
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
            //return redirect()->route('abogado.index');
            return auth()->user()->email;
        }
            return back()
            ->withErrors(['email' => 'Estas credenciales no concuerdan con nuestros registros'])
            ->withInput(request(['email']));
    }   


}

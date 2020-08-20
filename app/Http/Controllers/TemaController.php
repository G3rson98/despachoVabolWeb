<?php

namespace App\Http\Controllers;

use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TemaController extends Controller
{
    public function temaDark(Request $request){
        $id = auth()->user()->id;
        $usuario= new Usuario();
        $usuario=Usuario::find($id);
        $usuario->colora = $request['colora'];
        $usuario->colorb = $request['colorb'];
        $usuario->colorc = $request['colorc'];
        $usuario->update();
        return redirect()->route('dashboard');
        // return response()->json($request);
    }
    public function temaLight(Request $request){
        $id = auth()->user()->id;
        $usuario= new Usuario();
        $usuario=Usuario::find($id);
        $usuario->colora = $request['colora'];
        $usuario->colorb = $request['colorb'];
        $usuario->colorc = $request['colorc'];
        $usuario->update();
        return redirect()->route('dashboard');
        // return response()->json($request);
    }
    public function temaColor(Request $request){
        $id = auth()->user()->id;
        $usuario= new Usuario();
        $usuario=Usuario::find($id);
        $usuario->colora = $request['colora'];
        $usuario->colorb = $request['colorb'];
        $usuario->colorc = $request['colorc'];
        $usuario->update();
        return redirect()->route('dashboard');
        // return response()->json($request);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $tema = [
            "colora" => auth()->user()->colora,
            "colorb" => auth()->user()->colorb,
            "colorc" => auth()->user()->colorc,
            "rol" => auth()->user()->rol,
        ];
        return view('dashboard', compact('tema'));
    }
}

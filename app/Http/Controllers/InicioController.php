<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd(session()->all()['nombre_usuario']);
        return view('inicio');
    }

    public function laravel(){
        return view('welcome');
    }

    
}

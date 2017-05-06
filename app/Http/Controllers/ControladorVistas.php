<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ControladorVistas extends Controller
{
    public function inicioSesion(){

    	return view('inicioSesion');

    }

    public function inicioAdministracion(){

    	return view('inicioAdministracion');
    	
    }

    public function inicioPedidos(){

    	return view('inicioPedidos');
    	
    }
}

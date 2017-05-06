<?php

namespace App\Http\Controllers;

use Illuminate\Http\Requests;
use Auth;
use Session;
use Redirect;
use App\User;
use App\Http\Requests\RequestInicioSesion;

/*Controlador encargado de manejar los métodos referentes a las sesiones de los usuarios, ya sea iniciar o cerrar sesión*/
class ControladorInicioSesion extends Controller
{
    
	/*Método con el cual se autentica el usuario, en caso de que sea un chef, se redirige a la pantalla de chef, en caso de que sea un mesero, se redirige a la pantalla de mesero*/
	public function store(RequestInicioSesion $requestInicioSesion){

		//Listamos todos los usuarios
		$listadoUsuarios = User::all();

		//se recorre el listado de usuarios
		foreach ($listadoUsuarios as $usuario) {

			//se verifica que el usuario ingresado tenga un email y una contraseña correctos
			if ($usuario->email == $requestInicioSesion->email && $usuario->password == $requestInicioSesion->password) {

				//Si el usuario es un chef se direcciona a la pantalla de administracion
				if ($usuario->tipoUsuarios=='chef') {
					
					return Redirect::to('inicioAdministracion/retornarIngredientes');

				//Si el usuario es un mesero, se direcciona a la pantalla de mesero
				}elseif ($usuario->tipoUsuarios=='mesero') {
					
					return Redirect::to('inicioPedidos/areaPedidos');

			}		

			}	

		}

		//Si el usuario no es correcto, se direcciona a la misma página de inicio de sesión
		return Redirect::to('/');

	}

	/*Método que permite cerrar sesion, se ejecuta luego de que el usuario, ya sea un chef o un mesero, presionen el botón para salir dentro de sus respectivas interfaces*/
	public function cerrarSesion(RequestInicioSesion $requestInicioSesion){

		Auth::logout();
		//Luego de que se cierra la sesión, se dirreciona a la pantalla de incio de sesión, o panralla raiz del proyecto.
		return Redirect::to('/');

	}


}

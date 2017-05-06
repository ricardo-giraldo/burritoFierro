<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\http\Controllers\Controller;
use App\Pedido;
use App\Ingrediente;
use App\Comida;
use App\Bebida;
use App\Pedido__Comida;
use App\Pedido__Bebida;
use Session;
use Redirect;

/*Controlador encargado de contener los metodos referentes a las funciones del administrador*/
class ControladorAdministracion extends Controller
{

	
/*Método para retornar a la vista los pedidos pendientes, para que sean mostrados al chef*/
	public function retornarPedidos(){

		$listadoPedidosComidas = Pedido__Comida::all();

		foreach ($listadoPedidosComidas as $pedidoComida) {
			
			$idPedido = $pedidoComida->Pedido_idPedido;

			$pedido::find($idPedido);

			if ($pedido->estado_pedido == 'pendiente') {
				
				return view('inicioAdministracion', compact('pedido'));

			}

		}

	}

/*Método para verificar las comidas pedidas para una mesa*/
public function verificarPedidoMesa(){

		$listadoPedidos = Pedido::all();
		$listadoPedidosComidas = Pedido__Comida::all();
		$listadoComidas = Comida::all();
		$listadoComidasARetornar = NULL;

		$pedidoMesaUno = NULL;
		$pedidoMesaDos = NULL;
		$pedidoMesaTres = NULL;
		$pedidoMesaCuatro = NULL;
		$pedidoMesaCinco = NULL;
		$pedidoMesaSeis = NULL;
		$pedidoMesaSiete = NULL;

		foreach ($listadoPedidos as $pedido) {

			/*if ($pedido->mesa == '1' && $pedido->estado_pedido == 'pendiente') {
				
				foreach ($listadoPedidosComidas as $pedidoComida) {

					if ($pedidoComida->Pedido_idPedido == $pedido->idPedido) {
						
						$comida = Comida::find($pedidoComida->Comida_idComida);

						$pedidoMesaUno = array('' => , );

					}
				}

			}*/

			$pedido = mysql_query(' select mesa.numero_mesa, p.idPedido, pc.cantidad_comida, c.idComida, c.nombre_comida, pb.cantidad_bebida, b.idBebida, b.nombre_bebida, p.estado_pedido, f.valor_cuenta from mesa mesa inner join pedido p on mesa.idMesa=p.mesa_idMesa inner join pedido__comida pc on pc.pedido_idPedido=p.idPedido inner join comida c on pc.comida_idComida = c.idComida left join pedido__bebida pb on pb.pedido_idPedido=p.idPedido left join bebida b on pb.bebida_idBebida = b.idBebida inner join factura f on f.pedido_idPedido=p.idPedido order by mesa.numero_mesa, p.idPedido');


			if ($pedido->mesa == '2' && $pedido->estado_pedido == 'pendiente') {
				
				$pedidoMesaDos = $pedido;

			}
			if ($pedido->mesa == '3' && $pedido->estado_pedido == 'pendiente') {
				
				$pedidoMesaTres = $pedido;

			}
			if ($pedido->mesa == '4' && $pedido->estado_pedido == 'pendiente') {
				
				$pedidoMesaCuatro = $pedido;

			}
			if ($pedido->mesa == '5' && $pedido->estado_pedido == 'pendiente') {
				
				$pedidoMesaCinco = $pedido;

			}
			if ($pedido->mesa == '6' && $pedido->estado_pedido == 'pendiente') {
				
				$pedidoMesaDos = $pedido;

			}
			if ($pedido->mesa == '7' && $pedido->estado_pedido == 'pendiente') {
				
				$pedidoMesaTres = $pedido;

			}

		}

	}


/*Método para editar un ingrediente del inventario, simplemente se actualizará la cantidad de dicho ingrediente existente en el inventario*/
	public function editarIngrediente($ingrediente){

		$ingrediente = Ingrediente::find($ingrediente);
		return view('editarIngrediente', compact('ingrediente'));

	}

/*Método para actualizar la cantidad de un ingrediente en el inventario*/
	public function actualizarIngrediente($idIngrediente, Request $request){

		$ingrediente = Ingrediente::find($idIngrediente);
		$ingrediente -> fill($request->all());
		$ingrediente -> save();

		return Redirect::to('inicioAdministracion');

	}

/*Método para retornar a la vista todos los ingredientes registrados en la base de datos, para que sean mostrados en la tabla de ingredientes*/
	public function retornarIngredientes(){

		$listadoIngredientes = Ingrediente::all();

		return view('inicioAdministracion', compact('listadoIngredientes'));

	}

}

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
use App\Factura;
use Illuminate\Support\Facades\DB;
use Session;
use Redirect;
use Carbon\Carbon;

/*Controlador encargado de contener los metodos referentes a las funciones del administrador*/
class ControladorAdministracion extends Controller
{

	
/*Método para verificar las comidas pedidas para la mesa uno*/
public function generarPedidoComidaMesaUno(){

		$comidasMesaUno = array();

		$consultaPedidosPendientesComidasMesa1 = "select p.idPedido, f.valor_cuenta, c.nombre_comida, pc.cantidad_comida from mesa mesa inner join pedido p on mesa.idMesa=p.mesa_idMesa inner join pedido__comida pc on pc.pedido_idPedido=p.idPedido inner join comida c on pc.comida_idComida = c.idComida inner join factura f on f.pedido_idPedido=p.idPedido where mesa.idMesa = 3 and p.estado_pedido = 'pendiente' order by mesa.numero_mesa, p.idPedido";
		
		$pedidoComidaM1 = DB::select($consultaPedidosPendientesComidasMesa1);

		foreach ($pedidoComidaM1 as $pcm1) {
				
			$idPedido = $pcm1->idPedido;
			$valor_cuenta = $pcm1->valor_cuenta;
			$comida = $pcm1->nombre_comida;
			$cantidad = $pcm1->cantidad_comida;

			$comidasMesaUno[] = array('idPedido' => $idPedido, 'valor_cuenta' => $valor_cuenta, 'nombre_comida' => $comida, 'cantidad_comida' => $cantidad);  

		}
		return $comidasMesaUno;
}

/*Método para verificar las bebidas pedidas para la mesa uno*/
public function generarPedidoBebidaMesaUno(){

	$bebidasMesaUno = array();

	$consultaPedidosPendientesBebidasMesa1 = "select p.idPedido, b.nombre_bebida, pb.cantidad_bebida from mesa mesa inner join pedido p on mesa.idMesa=p.mesa_idMesa inner join pedido__bebida pb on pb.pedido_idPedido=p.idPedido inner join bebida b on pb.Bebida_idBebida = b.idBebida inner join factura f on f.pedido_idPedido=p.idPedido where mesa.idMesa = 3 and p.estado_pedido = 'pendiente' order by mesa.numero_mesa, p.idPedido";

	$pedidoBebidaM1 = DB::select($consultaPedidosPendientesBebidasMesa1);

	foreach ($pedidoBebidaM1 as $pbm1) {
				
		$idPedido = $pbm1->idPedido;
		$bebida = $pbm1->nombre_bebida;
		$cantidad = $pbm1->cantidad_bebida;

		$bebidasMesaUno[] = array('idPedido' => $idPedido, 'nombre_bebida' => $bebida, 'cantidad_bebida' => $cantidad);  

	}
	return $bebidasMesaUno;
}

/*Método para verificar las comidas pedidas para la mesa dos*/
public function generarPedidoComidaMesaDos(){

		$comidasMesaDos = array();

		$consultaPedidosPendientesComidasMesa2 = "select p.idPedido, f.valor_cuenta, c.nombre_comida, pc.cantidad_comida from mesa mesa inner join pedido p on mesa.idMesa=p.mesa_idMesa inner join pedido__comida pc on pc.pedido_idPedido=p.idPedido inner join comida c on pc.comida_idComida = c.idComida inner join factura f on f.pedido_idPedido=p.idPedido where mesa.idMesa = 4 and p.estado_pedido = 'pendiente' order by mesa.numero_mesa, p.idPedido";
		
		$pedidoComidaM2 = DB::select($consultaPedidosPendientesComidasMesa2);

		foreach ($pedidoComidaM2 as $pcm2) {
				
			$idPedido = $pcm2->idPedido;
			$valor_cuenta = $pcm2->valor_cuenta;
			$comida = $pcm2->nombre_comida;
			$cantidad = $pcm2->cantidad_comida;

			$comidasMesaDos[] = array('idPedido' => $idPedido, 'valor_cuenta' => $valor_cuenta, 'nombre_comida' => $comida, 'cantidad_comida' => $cantidad);  

		}
		return $comidasMesaDos;
}

/*Método para verificar las bebidas pedidas para la mesa dos*/
public function generarPedidoBebidaMesaDos(){

	$bebidasMesaDos = array();

	$consultaPedidosPendientesBebidasMesa2 = "select p.idPedido, b.nombre_bebida, pb.cantidad_bebida from mesa mesa inner join pedido p on mesa.idMesa=p.mesa_idMesa inner join pedido__bebida pb on pb.pedido_idPedido=p.idPedido inner join bebida b on pb.Bebida_idBebida = b.idBebida inner join factura f on f.pedido_idPedido=p.idPedido where mesa.idMesa = 4 and p.estado_pedido = 'pendiente' order by mesa.numero_mesa, p.idPedido";

	$pedidoBebidaM2 = DB::select($consultaPedidosPendientesBebidasMesa2);

	foreach ($pedidoBebidaM2 as $pbm2) {
				
		$idPedido = $pbm2->idPedido;
		$bebida = $pbm2->nombre_bebida;
		$cantidad = $pbm2->cantidad_bebida;

		$bebidasMesaDos[] = array('idPedido' => $idPedido, 'nombre_bebida' => $bebida, 'cantidad_bebida' => $cantidad);  

	}
	return $bebidasMesaDos;
}


/*Método para verificar las comidas pedidas para la mesa tres*/
public function generarPedidoComidaMesaTres(){

		$comidasMesaTres = array();

		$consultaPedidosPendientesComidasMesa3 = "select p.idPedido, f.valor_cuenta, c.nombre_comida, pc.cantidad_comida from mesa mesa inner join pedido p on mesa.idMesa=p.mesa_idMesa inner join pedido__comida pc on pc.pedido_idPedido=p.idPedido inner join comida c on pc.comida_idComida = c.idComida inner join factura f on f.pedido_idPedido=p.idPedido where mesa.idMesa = 5 and p.estado_pedido = 'pendiente' order by mesa.numero_mesa, p.idPedido";
		
		$pedidoComidaM3 = DB::select($consultaPedidosPendientesComidasMesa3);

		foreach ($pedidoComidaM3 as $pcm3) {
				
			$idPedido = $pcm3->idPedido;
			$valor_cuenta = $pcm3->valor_cuenta;
			$comida = $pcm3->nombre_comida;
			$cantidad = $pcm3->cantidad_comida;

			$comidasMesaTres[] = array('idPedido' => $idPedido, 'valor_cuenta' => $valor_cuenta, 'nombre_comida' => $comida, 'cantidad_comida' => $cantidad);  

		}
		return $comidasMesaTres;
}

/*Método para verificar las bebidas pedidas para la mesa tres*/
public function generarPedidoBebidaMesaTres(){

	$bebidasMesaTres = array();

	$consultaPedidosPendientesBebidasMesa3 = "select p.idPedido, b.nombre_bebida, pb.cantidad_bebida from mesa mesa inner join pedido p on mesa.idMesa=p.mesa_idMesa inner join pedido__bebida pb on pb.pedido_idPedido=p.idPedido inner join bebida b on pb.Bebida_idBebida = b.idBebida inner join factura f on f.pedido_idPedido=p.idPedido where mesa.idMesa = 5 and p.estado_pedido = 'pendiente' order by mesa.numero_mesa, p.idPedido";

	$pedidoBebidaM3 = DB::select($consultaPedidosPendientesBebidasMesa3);

	foreach ($pedidoBebidaM3 as $pbm3) {
				
		$idPedido = $pbm3->idPedido;
		$bebida = $pbm3->nombre_bebida;
		$cantidad = $pbm3->cantidad_bebida;

		$bebidasMesaTres[] = array('idPedido' => $idPedido, 'nombre_bebida' => $bebida, 'cantidad_bebida' => $cantidad);  

	}
	return $bebidasMesaTres;
}


/*Método para verificar las comidas pedidas para la mesa cuatro*/
public function generarPedidoComidaMesaCuatro(){

		$comidasMesaCuatro = array();

		$consultaPedidosPendientesComidasMesa4 = "select p.idPedido, f.valor_cuenta, c.nombre_comida, pc.cantidad_comida from mesa mesa inner join pedido p on mesa.idMesa=p.mesa_idMesa inner join pedido__comida pc on pc.pedido_idPedido=p.idPedido inner join comida c on pc.comida_idComida = c.idComida inner join factura f on f.pedido_idPedido=p.idPedido where mesa.idMesa = 6 and p.estado_pedido = 'pendiente' order by mesa.numero_mesa, p.idPedido";
		
		$pedidoComidaM4 = DB::select($consultaPedidosPendientesComidasMesa4);

		foreach ($pedidoComidaM4 as $pcm4) {
				
			$idPedido = $pcm4->idPedido;
			$valor_cuenta = $pcm4->valor_cuenta;
			$comida = $pcm4->nombre_comida;
			$cantidad = $pcm4->cantidad_comida;

			$comidasMesaCuatro[] = array('idPedido' => $idPedido, 'valor_cuenta' => $valor_cuenta, 'nombre_comida' => $comida, 'cantidad_comida' => $cantidad);  

		}
		return $comidasMesaCuatro;
}

/*Método para verificar las bebidas pedidas para la mesa cuatro*/
public function generarPedidoBebidaMesaCuatro(){

	$bebidasMesaCuatro = array();

	$consultaPedidosPendientesBebidasMesa4 = "select p.idPedido, b.nombre_bebida, pb.cantidad_bebida from mesa mesa inner join pedido p on mesa.idMesa=p.mesa_idMesa inner join pedido__bebida pb on pb.pedido_idPedido=p.idPedido inner join bebida b on pb.Bebida_idBebida = b.idBebida inner join factura f on f.pedido_idPedido=p.idPedido where mesa.idMesa = 6 and p.estado_pedido = 'pendiente' order by mesa.numero_mesa, p.idPedido";

	$pedidoBebidaM4 = DB::select($consultaPedidosPendientesBebidasMesa4);

	foreach ($pedidoBebidaM4 as $pbm4) {
				
		$idPedido = $pbm4->idPedido;
		$bebida = $pbm4->nombre_bebida;
		$cantidad = $pbm4->cantidad_bebida;

		$bebidasMesaCuatro[] = array('idPedido' => $idPedido, 'nombre_bebida' => $bebida, 'cantidad_bebida' => $cantidad);  

	}
	return $bebidasMesaCuatro;
}


/*Método para verificar las comidas pedidas para la mesa cinco*/
public function generarPedidoComidaMesaCinco(){

		$comidasMesaCinco = array();

		$consultaPedidosPendientesComidasMesa5 = "select p.idPedido, f.valor_cuenta, c.nombre_comida, pc.cantidad_comida from mesa mesa inner join pedido p on mesa.idMesa=p.mesa_idMesa inner join pedido__comida pc on pc.pedido_idPedido=p.idPedido inner join comida c on pc.comida_idComida = c.idComida inner join factura f on f.pedido_idPedido=p.idPedido where mesa.idMesa = 7 and p.estado_pedido = 'pendiente' order by mesa.numero_mesa, p.idPedido";
		
		$pedidoComidaM5 = DB::select($consultaPedidosPendientesComidasMesa5);

		foreach ($pedidoComidaM5 as $pcm5) {
				
			$idPedido = $pcm5->idPedido;
			$valor_cuenta = $pcm5->valor_cuenta;
			$comida = $pcm5->nombre_comida;
			$cantidad = $pcm5->cantidad_comida;

			$comidasMesaCinco[] = array('idPedido'=>$idPedido, 'valor_cuenta' => $valor_cuenta, 'nombre_comida' => $comida, 'cantidad_comida' => $cantidad);  

		}
		return $comidasMesaCinco;
}

/*Método para verificar las bebidas pedidas para la mesa cinco*/
public function generarPedidoBebidaMesaCinco(){

	$bebidasMesaCinco = array();

	$consultaPedidosPendientesBebidasMesa5 = "select p.idPedido, b.nombre_bebida, pb.cantidad_bebida from mesa mesa inner join pedido p on mesa.idMesa=p.mesa_idMesa inner join pedido__bebida pb on pb.pedido_idPedido=p.idPedido inner join bebida b on pb.Bebida_idBebida = b.idBebida inner join factura f on f.pedido_idPedido=p.idPedido where mesa.idMesa = 7 and p.estado_pedido = 'pendiente' order by mesa.numero_mesa, p.idPedido";

	$pedidoBebidaM5 = DB::select($consultaPedidosPendientesBebidasMesa5);

	foreach ($pedidoBebidaM5 as $pbm5) {
				
		$idPedido = $pbm5->idPedido;
		$bebida = $pbm5->nombre_bebida;
		$cantidad = $pbm5->cantidad_bebida;

		$bebidasMesaCinco[] = array('idPedido' => $idPedido, 'nombre_bebida' => $bebida, 'cantidad_bebida' => $cantidad);  

	}
	return $bebidasMesaCinco;
}


/*Método para verificar las comidas pedidas para la mesa seis*/
public function generarPedidoComidaMesaSeis(){

		$comidasMesaSeis = array();

		$consultaPedidosPendientesComidasMesa6 = "select p.idPedido, f.valor_cuenta, c.nombre_comida, pc.cantidad_comida from mesa mesa inner join pedido p on mesa.idMesa=p.mesa_idMesa inner join pedido__comida pc on pc.pedido_idPedido=p.idPedido inner join comida c on pc.comida_idComida = c.idComida inner join factura f on f.pedido_idPedido=p.idPedido where mesa.idMesa = 8 and p.estado_pedido = 'pendiente' order by mesa.numero_mesa, p.idPedido";
		
		$pedidoComidaM6 = DB::select($consultaPedidosPendientesComidasMesa6);

		foreach ($pedidoComidaM6 as $pcm6) {
				
			$idPedido = $pcm6->idPedido;
			$valor_cuenta = $pcm6->valor_cuenta;
			$comida = $pcm6->nombre_comida;
			$cantidad = $pcm6->cantidad_comida;

			$comidasMesaSeis[] = array('idPedido' => $idPedido, 'valor_cuenta' => $valor_cuenta, 'nombre_comida' => $comida, 'cantidad_comida' => $cantidad);  

		}
		return $comidasMesaSeis;
}

/*Método para verificar las bebidas pedidas para la mesa seis*/
public function generarPedidoBebidaMesaSeis(){

	$bebidasMesaSeis = array();

	$consultaPedidosPendientesBebidasMesa6 = "select p.idPedido, b.nombre_bebida, pb.cantidad_bebida from mesa mesa inner join pedido p on mesa.idMesa=p.mesa_idMesa inner join pedido__bebida pb on pb.pedido_idPedido=p.idPedido inner join bebida b on pb.Bebida_idBebida = b.idBebida inner join factura f on f.pedido_idPedido=p.idPedido where mesa.idMesa = 8 and p.estado_pedido = 'pendiente' order by mesa.numero_mesa, p.idPedido";

	$pedidoBebidaM6 = DB::select($consultaPedidosPendientesBebidasMesa6);

	foreach ($pedidoBebidaM6 as $pbm6) {
				
		$idPedido = $pbm6->idPedido;
		$bebida = $pbm6->nombre_bebida;
		$cantidad = $pbm6->cantidad_bebida;

		$bebidasMesaSeis[] = array('idPedido' => $idPedido, 'nombre_bebida' => $bebida, 'cantidad_bebida' => $cantidad);  

	}
	return $bebidasMesaSeis;
}


/*Método para verificar las comidas pedidas para la mesa siete*/
public function generarPedidoComidaMesaSiete(){

		$comidasMesaSiete = array();

		$consultaPedidosPendientesComidasMesa7 = "select p.idPedido, f.valor_cuenta, c.nombre_comida, pc.cantidad_comida from mesa mesa inner join pedido p on mesa.idMesa=p.mesa_idMesa inner join pedido__comida pc on pc.pedido_idPedido=p.idPedido inner join comida c on pc.comida_idComida = c.idComida inner join factura f on f.pedido_idPedido=p.idPedido where mesa.idMesa = 9 and p.estado_pedido = 'pendiente' order by mesa.numero_mesa, p.idPedido";
		
		$pedidoComidaM7 = DB::select($consultaPedidosPendientesComidasMesa7);

		foreach ($pedidoComidaM7 as $pcm7) {
				
			$idPedido = $pcm7->idPedido;
			$valor_cuenta = $pcm7->valor_cuenta;
			$comida = $pcm7->nombre_comida;
			$cantidad = $pcm7->cantidad_comida;

			$comidasMesaSiete[] = array('idPedido' => $idPedido, 'valor_cuenta' => $valor_cuenta, 'nombre_comida' => $comida, 'cantidad_comida' => $cantidad);  

		}
		return $comidasMesaSiete;
}

/*Método para verificar las bebidas pedidas para la mesa siete*/
public function generarPedidoBebidaMesaSiete(){

	$bebidasMesaSiete = array();

	$consultaPedidosPendientesBebidasMesa7 = "select p.idPedido, b.nombre_bebida, pb.cantidad_bebida from mesa mesa inner join pedido p on mesa.idMesa=p.mesa_idMesa inner join pedido__bebida pb on pb.pedido_idPedido=p.idPedido inner join bebida b on pb.Bebida_idBebida = b.idBebida inner join factura f on f.pedido_idPedido=p.idPedido where mesa.idMesa = 9 and p.estado_pedido = 'pendiente' order by mesa.numero_mesa, p.idPedido";

	$pedidoBebidaM7 = DB::select($consultaPedidosPendientesBebidasMesa7);

	foreach ($pedidoBebidaM7 as $pbm7) {
				
		$idPedido = $pbm7->idPedido;
		$bebida = $pbm7->nombre_bebida;
		$cantidad = $pbm7->cantidad_bebida;

		$bebidasMesaSiete[] = array('idPedido' => $idPedido, 'nombre_bebida' => $bebida, 'cantidad_bebida' => $cantidad);  

	}
	return $bebidasMesaSiete;
}



/*Método para editar un ingrediente del inventario, simplemente se actualizará la cantidad de dicho ingrediente existente en el inventario*/
	public function editarIngrediente($ingrediente){

		$ingrediente = Ingrediente::find($ingrediente);
		return view('editarIngrediente', compact('ingrediente'));

	}

/*Método para actualizar la cantidad de un ingrediente en el inventario*/
	public function actualizarIngrediente(Request $request, $idIngrediente){

		$ingrediente = Ingrediente::find($idIngrediente);
		$ingrediente -> fill($request->all());
		$ingrediente -> save();

		return Redirect::to('inicioAdministracion/retornarIngredientes');

	}

	public function terminarPedido($idPedido){

		if ($idPedido == 1) {
			$pedido=self::generarPedidoComidaMesaUno();
			$idPedidoM1 = $pedido[0];
			$idPedidoM = $idPedidoM1['idPedido'];
			$pedidoTerminar = Pedido::find($idPedidoM);
			$pedidoTerminar->estado_pedido = 'entregado';
			$pedidoTerminar -> save();
		}

		elseif ($idPedido == 2) {
			$pedido=self::generarPedidoComidaMesaDos();
			$idPedidoM1 = $pedido[0];
			$idPedidoM = $idPedidoM1['idPedido'];
			$pedidoTerminar = Pedido::find($idPedidoM);
			$pedidoTerminar->estado_pedido = 'entregado';
			$pedidoTerminar -> save();
		}

		elseif ($idPedido == 3) {
			$pedido=self::generarPedidoComidaMesaTres();
			$idPedidoM1 = $pedido[0];
			$idPedidoM = $idPedidoM1['idPedido'];
			$pedidoTerminar = Pedido::find($idPedidoM);
			$pedidoTerminar->estado_pedido = 'entregado';
			$pedidoTerminar -> save();
		}

		elseif ($idPedido == 4) {
			$pedido=self::generarPedidoComidaMesaCuatro();
			$idPedidoM1 = $pedido[0];
			$idPedidoM = $idPedidoM1['idPedido'];
			$pedidoTerminar = Pedido::find($idPedidoM);
			$pedidoTerminar->estado_pedido = 'entregado';
			$pedidoTerminar -> save();
		}

		elseif ($idPedido == 5) {
			$pedido=self::generarPedidoComidaMesaCinco();
			$idPedidoM1 = $pedido[0];
			$idPedidoM = $idPedidoM1['idPedido'];
			$pedidoTerminar = Pedido::find($idPedidoM);
			$pedidoTerminar->estado_pedido = 'entregado';
			$pedidoTerminar -> save();
		}

		elseif ($idPedido == 6) {
			$pedido=self::generarPedidoComidaMesaSeis();
			$idPedidoM1 = $pedido[0];
			$idPedidoM = $idPedidoM1['idPedido'];
			$pedidoTerminar = Pedido::find($idPedidoM);
			$pedidoTerminar->estado_pedido = 'entregado';
			$pedidoTerminar -> save();
		}

		elseif ($idPedido == 7) {
			$pedido=self::generarPedidoComidaMesaSiete();
			$idPedidoM1 = $pedido[0];
			$idPedidoM = $idPedidoM1['idPedido'];
			$pedidoTerminar = Pedido::find($idPedidoM);
			$pedidoTerminar->estado_pedido = 'entregado';
			$pedidoTerminar -> save();
		}

		return Redirect::to('inicioAdministracion/retornarIngredientes');

	}

	/*Método para retornar el precio de la factura de la mesa 1*/
	public function calcularPrecioMesa1(){

		$factura=self::generarPedidoComidaMesaUno();
		if ($factura <> null) {
			$precioFactura = $factura[0];
			$precioMesaUno = $precioFactura['valor_cuenta'];
			return $precioMesaUno;
		}

		return 0;
	}

	/*Método para retornar el precio de la factura de la mesa 2*/
	public function calcularPrecioMesa2(){

		$factura=self::generarPedidoComidaMesaDos();
		if ($factura <> null) {
			$precioFactura = $factura[0];
			$precioMesaDos = $precioFactura['valor_cuenta'];
			return $precioMesaDos;
		}

		return 0;
	}

	/*Método para retornar el precio de la factura de la mesa 3*/
	public function calcularPrecioMesa3(){

		$factura=self::generarPedidoComidaMesaTres();
		if ($factura <> null) {
			$precioFactura = $factura[0];
			$precioMesaTres = $precioFactura['valor_cuenta'];
			return $precioMesaTres;
		}

		return 0;
	}

	/*Método para retornar el precio de la factura de la mesa 4*/
	public function calcularPrecioMesa4(){

		$factura=self::generarPedidoComidaMesaCuatro();
		if ($factura <> null) {
			$precioFactura = $factura[0];
			$precioMesaCuatro = $precioFactura['valor_cuenta'];
			return $precioMesaCuatro;
		}

		return 0;
	}

	/*Método para retornar el precio de la factura de la mesa 5*/
	public function calcularPrecioMesa5(){

		$factura=self::generarPedidoComidaMesaCinco();
		if ($factura <> null) {
			$precioFactura = $factura[0];
			$precioMesaCinco = $precioFactura['valor_cuenta'];
			return $precioMesaCinco;
		}

		return 0;
	}

	/*Método para retornar el precio de la factura de la mesa 6*/
	public function calcularPrecioMesa6(){

		$factura=self::generarPedidoComidaMesaSeis();
		if ($factura <> null) {
			$precioFactura = $factura[0];
			$precioMesaSeis = $precioFactura['valor_cuenta'];
			return $precioMesaSeis;
		}

		return 0;
	}

	/*Método para retornar el precio de la factura de la mesa 7*/
	public function calcularPrecioMesa7(){

		$factura=self::generarPedidoComidaMesaSiete();
		if ($factura <> null) {
			$precioFactura = $factura[0];
			$precioMesaSiete = $precioFactura['valor_cuenta'];
			return $precioMesaSiete;
		}

		return 0;
	}

/*Método para retornar a la vista todos los ingredientes registrados en la base de datos, para que sean mostrados en la tabla de ingredientes*/
	public function retornarIngredientes(){

		$listadoIngredientes = Ingrediente::all();

		$listadoReportes = self::retornarReporte();

		$listadoNotificaciones = self::retornarNotificacion();

		$pedidoComidaM1 = self::generarPedidoComidaMesaUno();
		$pedidoBebidaM1 = self::generarPedidoBebidaMesaUno();
		$pedidoComidaM2 = self::generarPedidoComidaMesaDos();
		$pedidoBebidaM2 = self::generarPedidoBebidaMesaDos();
		$pedidoComidaM3 = self::generarPedidoComidaMesaTres();
		$pedidoBebidaM3 = self::generarPedidoBebidaMesaTres();
		$pedidoComidaM4 = self::generarPedidoComidaMesaCuatro();
		$pedidoBebidaM4 = self::generarPedidoBebidaMesaCuatro();
		$pedidoComidaM5 = self::generarPedidoComidaMesaCinco();
		$pedidoBebidaM5 = self::generarPedidoBebidaMesaCinco();
		$pedidoComidaM6 = self::generarPedidoComidaMesaSeis();
		$pedidoBebidaM6 = self::generarPedidoBebidaMesaSeis();
		$pedidoComidaM7 = self::generarPedidoComidaMesaSiete();
		$pedidoBebidaM7 = self::generarPedidoBebidaMesaSiete();

		$precioPedidoMesa1 = self::calcularPrecioMesa1();
		$precioPedidoMesa2 = self::calcularPrecioMesa2();
		$precioPedidoMesa3 = self::calcularPrecioMesa3();
		$precioPedidoMesa4 = self::calcularPrecioMesa4();
		$precioPedidoMesa5 = self::calcularPrecioMesa5();
		$precioPedidoMesa6 = self::calcularPrecioMesa6();
		$precioPedidoMesa7 = self::calcularPrecioMesa7();

		return view('inicioAdministracion', compact('listadoIngredientes', 'listadoReportes', 'pedidoComidaM1', 'pedidoBebidaM1', 'precioPedidoMesa1', 'pedidoComidaM2', 'pedidoBebidaM2', 'precioPedidoMesa2', 'pedidoComidaM3', 'pedidoBebidaM3', 'precioPedidoMesa3', 'pedidoComidaM4', 'pedidoBebidaM4', 'precioPedidoMesa4', 'pedidoComidaM5', 'pedidoBebidaM5', 'precioPedidoMesa5', 'pedidoComidaM6', 'pedidoBebidaM6', 'precioPedidoMesa6', 'pedidoComidaM7', 'pedidoBebidaM7', 'precioPedidoMesa7', 'listadoNotificaciones'));

	}

/*Método para generar un reporte dependiendo de su tipo y de su rango de fechas*/
	public function generarReporte(Request $request){

		return Redirect::to('inicioAdministracion/retornarIngredientes');

	}

/*Método para retornar los reportes a la vista de reportes*/
	public function retornarReporte(){
	
		$acumuladorValorFacturasDia = self::generarReporteVentasDia();
		$reporteVentasDia = 'Las ventas del d&iacute;a fueron de: $'.$acumuladorValorFacturasDia;

		$acumuladorPedidosDia = self::generarReportePedidosDia();
		$reportePedidosDia = 'El n&uacute;mero de pedidos realizados hoy es de: '.$acumuladorPedidosDia;

		$acumuladorValorFacturasSemana = self::generarReporteVentasSemana();
		$reporteVentasSemana = 'Las ventas de la semana fueron de: $'.$acumuladorValorFacturasSemana;

		$acumuladorPedidosSemana = self::generarReportePedidosSemana();
		$reportePedidosSemana = 'El n&uacute;mero de pedidos realizados esta semana es de: '.$acumuladorPedidosSemana;

		$acumuladorValorFacturasMes = self::generarReporteVentasMes();
		$reporteVentasMes = 'Las ventas del mes fueron de: $'.$acumuladorValorFacturasMes;

		$acumuladorPedidosMes = self::generarReportePedidosMes();
		$reportePedidosMes = 'El n&uacute;mero de pedidos realizados este mes es de: '.$acumuladorPedidosMes;

		$acumuladorValorFacturasAnio = self::generarReporteVentasAnio();
		$reporteVentasAnio = 'Las ventas del &uacute;ltimo a&ntilde;o fueron de: $'.$acumuladorValorFacturasAnio;

		$reportes = array('reporteVentasDia' => $reporteVentasDia, 'reportePedidosDia' => $reportePedidosDia, 'reporteVentasSemana' => $reporteVentasSemana, 'reportePedidosSemana' => $reportePedidosSemana, 'reporteVentasMes' => $reporteVentasMes, 'reportePedidosMes' => $reportePedidosMes, 'reporteVentasAnio' => $reporteVentasAnio);

		return $reportes;

	}

/*Método para generar el reporte de ventas del día*/
	public function generarReporteVentasDia(){

		$fechaActual = Carbon::now();
		$fechaMenosUnDia = new Carbon('yesterday');

		$acumuladorValorFacturasDia =0;

		$listadoFacturas = Factura::all();

		foreach ($listadoFacturas as $factura) {
			
			if ($factura->created_at > $fechaMenosUnDia) {
				
				$acumuladorValorFacturasDia = $acumuladorValorFacturasDia+($factura->valor_cuenta);
			}

		}

		return $acumuladorValorFacturasDia;

	}

	/*Método para generar el reporte de pedidos del día*/
	public function generarReportePedidosDia(){

		$fechaActual = Carbon::now();
		$fechaMenosUnDia = new Carbon('yesterday');

		$acumuladorPedidosDia =0;

		$listadoPedidos = Pedido::all();

		foreach ($listadoPedidos as $pedido) {
			
			if ($pedido->created_at > $fechaMenosUnDia) {
				
				$acumuladorPedidosDia = $acumuladorPedidosDia + 1;
			}

		}

		return $acumuladorPedidosDia;

	}

	/*Método para generar el reporte de ventas de la semana*/
	public function generarReporteVentasSemana(){

		$fechaActual = Carbon::now();
		$fechaMenosUnaSemana = date('Y-m-d', strtotime('-1 week')) ;;

		$acumuladorValorFacturasSemana =0;

		$listadoFacturas = Factura::all();

		foreach ($listadoFacturas as $factura) {
			
			if ($factura->created_at >= $fechaMenosUnaSemana) {
				
				$acumuladorValorFacturasSemana = $acumuladorValorFacturasSemana + ($factura->valor_cuenta);
			}

		}

		return $acumuladorValorFacturasSemana;

	}

	/*Método para generar el reporte de pedidos de la semana*/
	public function generarReportePedidosSemana(){

		$fechaActual = Carbon::now();
		$fechaMenosUnaSemana = date('Y-m-d', strtotime('-1 week')) ;;

		$acumuladorPedidosSemana =0;

		$listadoPedidos = Pedido::all();

		foreach ($listadoPedidos as $pedido) {
			
			if ($pedido->created_at >= $fechaMenosUnaSemana) {
				
				$acumuladorPedidosSemana = $acumuladorPedidosSemana + 1;
			}

		}

		return $acumuladorPedidosSemana;

	}


/*Método para generar el reporte de ventas del mes*/
	public function generarReporteVentasMes(){

		$fechaActual = Carbon::now();
		$fechaMenosUnMes = date('Y-m-d', strtotime('-1 month')) ;

		$acumuladorValorFacturasMes =0;

		$listadoFacturas = Factura::all();

		foreach ($listadoFacturas as $factura) {
			
			if ($factura->created_at >= $fechaMenosUnMes) {
				
				$acumuladorValorFacturasMes = $acumuladorValorFacturasMes+($factura->valor_cuenta);
			}

		}

		return $acumuladorValorFacturasMes;

	}

	/*Método para generar el reporte de pedidos del mes*/
	public function generarReportePedidosMes(){

		$fechaActual = Carbon::now();
		$fechaMenosUnMes = date('Y-m-d', strtotime('-1 month')) ;

		$acumuladorPedidosMes =0;

		$listadoPedidos = Pedido::all();

		foreach ($listadoPedidos as $pedido) {
			
			if ($pedido->created_at >= $fechaMenosUnMes) {
				
				$acumuladorPedidosMes = $acumuladorPedidosMes + 1;
			}

		}


		return $acumuladorPedidosMes;

	}

	/*Método para generar el reporte de ventas del año*/
	public function generarReporteVentasAnio(){

		$fechaActual = Carbon::now();
		$fechaMenosUnAnio = date('Y-m-d', strtotime('-1 year')) ;

		$acumuladorValorFacturasAnio =0;

		$listadoFacturas = Factura::all();

		foreach ($listadoFacturas as $factura) {
			
			if ($factura->created_at >= $fechaMenosUnAnio) {
				
				$acumuladorValorFacturasAnio = $acumuladorValorFacturasAnio+($factura->valor_cuenta);
			}

		}

		return $acumuladorValorFacturasAnio;

	}

	public function verNotificaciones(Request $request){

		return Redirect::to('inicioAdministracion/retornarIngredientes');

	}

	public function retornarNotificacion(){
	
		/*Se obtiene la cantidad de jamon y se verifica si esta en un nivel de alerta
		en este caso 5 porciones, luego se genera la notificacion si el ingrediente es suficiente o escaso */
		$cantidadJamon = self::generarNotificacionJamon();

		$reporteJamon =  'Jamon Suficiente: ' .$cantidadJamon;

		if ($cantidadJamon <= '5') {

			$reporteJamon =  'Jamon Escaso: ' .$cantidadJamon;
		}

		/*Se obtiene la cantidad de carney se verifica si esta en un nivel de alerta
		en este caso 5 porciones, luego se genera la notificacion si el ingrediente es suficiente o escaso */
		$cantidadCarne = self::generarNotificacionCarne();

		$reporteCarne =  'Carne Suficiente: ' .$cantidadCarne;

		if ($cantidadCarne <= '5') {

			$reporteCarne =  'Carne Escasa: ' .$cantidadCarne;
		}

		/*Se obtiene la cantidad de queso y se verifica si esta en un nivel de alerta
		en este caso 5 porciones, luego se genera la notificacion si el ingrediente es suficiente o escaso */
		$cantidadQueso = self::generarNotificacionQueso();

		$reporteQueso=  'Queso Suficiente: ' .$cantidadQueso;

		if ($cantidadQueso <= '5') {

			$reporteQueso =  'Queso Escaso: ' .$cantidadQueso;
		}

		/*Se obtiene la cantidad de champiñones y se verifica si esta en un nivel de alerta en este caso 5 porciones, luego se genera la notificacion si el ingrediente es suficiente o escaso */
		$cantidadChampinon = self::generarNotificacionChampinon();

		$reporteChampinon =  'Champiñones Suficientes: ' .$cantidadChampinon;

		if ($cantidadChampinon <= '5') {

			$reporteChampinon =  'Champiñones Escasos: ' .$cantidadChampinon;
		}

		/*Se obtiene la cantidad de champiñonesy si verifica si esta en un nivel de alerta en este caso 5 porciones, luego se genera la notificacion si el ingrediente es suficiente o escaso */
		$cantidadPina = self::generarNotificacionPina();

		$reportePina =  'Piña Suficiente: ' .$cantidadPina;

		if ($cantidadPina <= '5') {

			$reportePina =  'Piña Escaso: ' .$cantidadPina;
		}

		/*Se obtiene la cantidad de frijol y se verifica si esta en un nivel de alerta en este caso 5 porciones, luego se genera la notificacion si el ingrediente es suficiente o escaso */
		$cantidadFrijol = self::generarNotificacionFrijol();

		$reporteFrijol =  'Frijol Suficiente: ' .$cantidadFrijol;

		if ($cantidadFrijol <= '5') {

			$reporteFrijol =  'Frijol Escaso: ' .$cantidadFrijol;
		}

		/*Se obtiene la cantidad de chicharron y se verifica si esta en un nivel de alerta en este caso 5 porciones, luego se genera la notificacion si el ingrediente es suficiente o escaso */
		$cantidadChicharron = self::generarNotificacionChicharron();

		$reporteChicharron =  'Chicharron Suficiente: ' .$cantidadChicharron;

		if ($cantidadChicharron <= '5') {

			$reporteChicharron =  'Chicharron Escaso: ' .$cantidadChicharron;
		}

		/*Se obtiene la cantidad de carne de res y se verifica si esta en un nivel de alerta en este caso 5 porciones, luego se genera la notificacion si el ingrediente es suficiente o escaso */
		$cantidadCarneRes = self::generarNotificacionCarneRes();

		$reporteCarneRes =  'Carne de Res Suficiente: ' .$cantidadCarneRes;

		if ($cantidadCarneRes <= '5') {

			$reporteCarneRes =  'Carne de Res Escasa: ' .$cantidadCarneRes;
		}

		/*Se obtiene la cantidad de lechuga y se verifica si esta en un nivel de alerta en este caso 5 porciones, luego se genera la notificacion si el ingrediente es suficiente o escaso */
		$cantidadLechuga = self::generarNotificacionLechuga();

		$reporteLechuga =  'Lechuga Suficiente: ' .$cantidadLechuga;

		if ($cantidadLechuga <= '5') {

			$reporteLechuga =  'Lechuga Escasa: ' .$cantidadLechuga;
		}

		/*Se obtiene la cantidad de cebolla y se verifica si esta en un nivel de alerta en este caso 5 porciones, luego se genera la notificacion si el ingrediente es suficiente o escaso */
		$cantidadCebolla = self::generarNotificacionCebolla();

		$reporteCebolla =  'Cebolla Suficiente: ' .$cantidadCebolla;

		if ($cantidadCebolla <= '5') {

			$reporteCebolla =  'Cebolla Escasa: ' .$cantidadCebolla;
		}

		/*Se obtiene la cantidad de tocineta y se verifica si esta en un nivel de alerta en este caso 5 porciones, luego se genera la notificacion si el ingrediente es suficiente o escaso */
		$cantidadTocineta= self::generarNotificacionTocineta();

		$reporteTocineta =  'Tocineta Suficiente: ' .$cantidadTocineta;

		if ($cantidadTocineta <= '5') {

			$reporteTocineta =  'Tocineta Escasa: ' .$cantidadTocineta;
		}

		/*Se obtiene la cantidad de tortilla y se verifica si esta en un nivel de alerta en este caso 5 porciones, luego se genera la notificacion si el ingrediente es suficiente o escaso */
		$cantidadTortilla= self::generarNotificacionTortilla();

		$reporteTortilla=  'Tortilla Suficiente: ' .$cantidadTortilla;

		if ($cantidadTortilla <= '5') {

			$reporteTortilla =  'Tortilla Escasa: ' .$cantidadTortilla;
		}

		$notificaciones = array('reporteJamon' => $reporteJamon, 'reporteCarne' => $reporteCarne,'reporteQueso' => $reporteQueso, 'reporteChampinon' => $reporteChampinon, 'reportePina' => $reportePina, 'reporteFrijol' => $reporteFrijol, 'reporteChicharron' => $reporteChicharron, 'reporteCarneRes' => $reporteCarneRes, 'reporteLechuga' => $reporteLechuga, 'reporteCebolla' => $reporteCebolla, 'reporteTocineta' => $reporteTocineta, 'reporteTortilla' => $reporteTortilla);

			return $notificaciones;
		}

		/*Método para obtener la cantidad de jamon*/
		public function generarNotificacionJamon(){

		$cantidadJamon = 0;

		$listadodeIngredientesDeJamon =  Ingrediente::all();

		//se recorre el listado de ingredientes buscando el jamon
		foreach ($listadodeIngredientesDeJamon as $listadodeIngredientesDeJamon) {			
			
			if ($listadodeIngredientesDeJamon->idIngrediente == '1') {
				
				$cantidadJamon = $listadodeIngredientesDeJamon->cantidad;

			}	
			
		}
		return $cantidadJamon;
	}

	/*Método para obtener la cantidad de carne*/
		public function generarNotificacionCarne(){

		$cantidadCarne= 0;

		$listadodeIngredientesDeCarne =  Ingrediente::all();

		//se recorre el listado de ingredientes buscando la carne
		foreach ($listadodeIngredientesDeCarne as $listadodeIngredientesDeCarne) {			
			
			if ($listadodeIngredientesDeCarne->idIngrediente == '2') {
				
				$cantidadCarne = $listadodeIngredientesDeCarne->cantidad;

			}	

				
		}
		return $cantidadCarne;
	}

	/*Método para obtener la cantidad de queso*/
		public function generarNotificacionQueso(){

		$cantidadQueso = 0;

		$listadodeIngredientesDeQueso =  Ingrediente::all();

		//se recorre el listado de ingredientes buscando el queso
		foreach ($listadodeIngredientesDeQueso as $listadodeIngredientesDeQueso) {			
			
			if ($listadodeIngredientesDeQueso->idIngrediente == '7') {
				
				$cantidadQueso = $listadodeIngredientesDeQueso->cantidad;

			}	
				
		}

		return $cantidadQueso;
	}

	/*Método para obtener la cantidad de champiñones*/
		public function generarNotificacionChampinon(){

		$cantidadChampinon = 0;

		$listadodeIngredientesDeChampinon =  Ingrediente::all();

		//se recorre el listado de ingredientes buscando los champiñones
		foreach ($listadodeIngredientesDeChampinon as $listadodeIngredientesDeChampinon) {			
			
			if ($listadodeIngredientesDeChampinon->idIngrediente == '8') {
				
				$cantidadChampinon = $listadodeIngredientesDeChampinon->cantidad;

			}	
				
		}

		return $cantidadChampinon;
	}

	/*Método para obtener la cantidad de piña*/
		public function generarNotificacionPina(){

		$cantidadPina = 0;

		$listadodeIngredientesDePina =  Ingrediente::all();

		//se recorre el listado de ingredientes buscando la piña
		foreach ($listadodeIngredientesDePina as $listadodeIngredientesDePina) {			
			
			if ($listadodeIngredientesDePina->idIngrediente == '9') {
				
				$cantidadPina = $listadodeIngredientesDePina->cantidad;

			}	
				
		}

		return $cantidadPina;
	}

	/*Método para obtener la cantidad de frijol*/
		public function generarNotificacionFrijol(){

		$cantidadFrijol = 0;

		$listadodeIngredientesDeFrijol =  Ingrediente::all();

		//se recorre el listado de ingredientes buscando el frijol
		foreach ($listadodeIngredientesDeFrijol as $listadodeIngredientesDeFrijol) {			
			
			if ($listadodeIngredientesDeFrijol->idIngrediente == '10') {
				
				$cantidadFrijol = $listadodeIngredientesDeFrijol->cantidad;

			}	
				
		}

		return $cantidadFrijol;
	}

	/*Método para obtener la cantidad de chicharron*/
		public function generarNotificacionChicharron(){

		$cantidadChicharron = 0;

		$listadodeIngredientesDeChicharron =  Ingrediente::all();

		//se recorre el listado de ingredientes buscando el chicharron
		foreach ($listadodeIngredientesDeChicharron as $listadodeIngredientesDeChicharron) {			
			
			if ($listadodeIngredientesDeChicharron->idIngrediente == '11') {
				
				$cantidadChicharron = $listadodeIngredientesDeChicharron->cantidad;

			}	
				
		}

		return $cantidadChicharron;
	}

	/*Método para obtener la cantidad de carne de res*/
		public function generarNotificacionCarneRes(){

		$cantidadCarneRes = 0;

		$listadodeIngredientesDeCarneRes =  Ingrediente::all();

		//se recorre el listado de ingredientes buscando la carne de res
		foreach ($listadodeIngredientesDeCarneRes as $listadodeIngredientesDeCarneRes) {			
			
			if ($listadodeIngredientesDeCarneRes->idIngrediente == '12') {
				
				$cantidadCarneRes = $listadodeIngredientesDeCarneRes->cantidad;

			}	
				
		}

		return $cantidadCarneRes;
	}

	/*Método para obtener la cantidad de lechuga*/
		public function generarNotificacionLechuga(){

		$cantidadLechuga = 0;

		$listadodeIngredientesDeLechuga =  Ingrediente::all();

		//se recorre el listado de ingredientes buscando la lechuga
		foreach ($listadodeIngredientesDeLechuga as $listadodeIngredientesDeLechuga) {			
			
			if ($listadodeIngredientesDeLechuga->idIngrediente == '13') {
				
				$cantidadLechuga = $listadodeIngredientesDeLechuga->cantidad;

			}	
				
		}

		return $cantidadLechuga;
	}

	/*Método para obtener la cantidad de cebolla*/
		public function generarNotificacionCebolla(){

		$cantidadCebolla = 0;

		$listadodeIngredientesDeCebolla =  Ingrediente::all();

		//se recorre el listado de ingredientes buscando la cebolla
		foreach ($listadodeIngredientesDeCebolla as $listadodeIngredientesDeCebolla) {			
			
			if ($listadodeIngredientesDeCebolla->idIngrediente == '15') {
				
				$cantidadCebolla = $listadodeIngredientesDeCebolla->cantidad;

			}	
				
		}

		return $cantidadCebolla;
	}

	/*Método para obtener la cantidad de tocineta*/
		public function generarNotificacionTocineta(){

		$cantidadTocineta = 0;

		$listadodeIngredientesDeTocineta =  Ingrediente::all();

		//se recorre el listado de ingredientes buscando la tocineta
		foreach ($listadodeIngredientesDeTocineta as $listadodeIngredientesDeTocineta) {			
			
			if ($listadodeIngredientesDeTocineta->idIngrediente == '17') {
				
				$cantidadTocineta = $listadodeIngredientesDeTocineta->cantidad;

			}	
				
		}

		return $cantidadTocineta;
	}

	/*Método para obtener la cantidad de tortilla*/
		public function generarNotificacionTortilla(){

		$cantidadTortilla = 0;

		$listadodeIngredientesDeTortilla =  Ingrediente::all();

		//se recorre el listado de ingredientes buscando la tortilla
		foreach ($listadodeIngredientesDeTortilla as $listadodeIngredientesDeTortilla) {			
			
			if ($listadodeIngredientesDeTortilla->idIngrediente == '18') {
				
				$cantidadTortilla = $listadodeIngredientesDeTortilla->cantidad;

			}	
				
		}

		return $cantidadTortilla;
	}

}

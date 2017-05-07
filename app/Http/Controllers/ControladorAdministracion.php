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

		$consultaPedidosPendientesComidasMesa1 = "select c.nombre_comida, pc.cantidad_comida from mesa mesa inner join pedido p on mesa.idMesa=p.mesa_idMesa inner join pedido__comida pc on pc.pedido_idPedido=p.idPedido inner join comida c on pc.comida_idComida = c.idComida inner join factura f on f.pedido_idPedido=p.idPedido where mesa.idMesa = 3 and p.estado_pedido = 'pendiente' order by mesa.numero_mesa, p.idPedido";
		
		$pedidoComidaM1 = DB::select($consultaPedidosPendientesComidasMesa1);

		foreach ($pedidoComidaM1 as $pcm1) {
				
			$comida = $pcm1->nombre_comida;
			$cantidad = $pcm1->cantidad_comida;

			$comidasMesaUno[] = array('nombre_comida' => $comida, 'cantidad_comida' => $cantidad);  

		}
		return $comidasMesaUno;
}

/*Método para verificar las bebidas pedidas para la mesa uno*/
public function generarPedidoBebidaMesaUno(){

	$bebidasMesaUno = array();

	$consultaPedidosPendientesBebidasMesa1 = "select b.nombre_bebida, pb.cantidad_bebida from mesa mesa inner join pedido p on mesa.idMesa=p.mesa_idMesa inner join pedido__bebida pb on pb.pedido_idPedido=p.idPedido inner join bebida b on pb.Bebida_idBebida = b.idBebida inner join factura f on f.pedido_idPedido=p.idPedido where mesa.idMesa = 3 and p.estado_pedido = 'pendiente' order by mesa.numero_mesa, p.idPedido";

	$pedidoBebidaM1 = DB::select($consultaPedidosPendientesBebidasMesa1);

	foreach ($pedidoBebidaM1 as $pbm1) {
				
		$bebida = $pbm1->nombre_bebida;
		$cantidad = $pbm1->cantidad_bebida;

		$bebidasMesaUno[] = array('nombre_bebida' => $bebida, 'cantidad_bebida' => $cantidad);  

	}
	return $bebidasMesaUno;
}

/*Método para verificar las comidas pedidas para la mesa dos*/
public function generarPedidoComidaMesaDos(){

		$comidasMesaDos = array();

		$consultaPedidosPendientesComidasMesa2 = "select c.nombre_comida, pc.cantidad_comida from mesa mesa inner join pedido p on mesa.idMesa=p.mesa_idMesa inner join pedido__comida pc on pc.pedido_idPedido=p.idPedido inner join comida c on pc.comida_idComida = c.idComida inner join factura f on f.pedido_idPedido=p.idPedido where mesa.idMesa = 4 and p.estado_pedido = 'pendiente' order by mesa.numero_mesa, p.idPedido";
		
		$pedidoComidaM2 = DB::select($consultaPedidosPendientesComidasMesa2);

		foreach ($pedidoComidaM2 as $pcm2) {
				
			$comida = $pcm2->nombre_comida;
			$cantidad = $pcm2->cantidad_comida;

			$comidasMesaDos[] = array('nombre_comida' => $comida, 'cantidad_comida' => $cantidad);  

		}
		return $comidasMesaDos;
}

/*Método para verificar las bebidas pedidas para la mesa dos*/
public function generarPedidoBebidaMesaDos(){

	$bebidasMesaDos = array();

	$consultaPedidosPendientesBebidasMesa2 = "select b.nombre_bebida, pb.cantidad_bebida from mesa mesa inner join pedido p on mesa.idMesa=p.mesa_idMesa inner join pedido__bebida pb on pb.pedido_idPedido=p.idPedido inner join bebida b on pb.Bebida_idBebida = b.idBebida inner join factura f on f.pedido_idPedido=p.idPedido where mesa.idMesa = 4 and p.estado_pedido = 'pendiente' order by mesa.numero_mesa, p.idPedido";

	$pedidoBebidaM2 = DB::select($consultaPedidosPendientesBebidasMesa2);

	foreach ($pedidoBebidaM2 as $pbm2) {
				
		$bebida = $pbm2->nombre_bebida;
		$cantidad = $pbm2->cantidad_bebida;

		$bebidasMesaDos[] = array('nombre_bebida' => $bebida, 'cantidad_bebida' => $cantidad);  

	}
	return $bebidasMesaDos;
}


/*Método para verificar las comidas pedidas para la mesa tres*/
public function generarPedidoComidaMesaTres(){

		$comidasMesaTres = array();

		$consultaPedidosPendientesComidasMesa3 = "select c.nombre_comida, pc.cantidad_comida from mesa mesa inner join pedido p on mesa.idMesa=p.mesa_idMesa inner join pedido__comida pc on pc.pedido_idPedido=p.idPedido inner join comida c on pc.comida_idComida = c.idComida inner join factura f on f.pedido_idPedido=p.idPedido where mesa.idMesa = 5 and p.estado_pedido = 'pendiente' order by mesa.numero_mesa, p.idPedido";
		
		$pedidoComidaM3 = DB::select($consultaPedidosPendientesComidasMesa3);

		foreach ($pedidoComidaM3 as $pcm3) {
				
			$comida = $pcm3->nombre_comida;
			$cantidad = $pcm3->cantidad_comida;

			$comidasMesaTres[] = array('nombre_comida' => $comida, 'cantidad_comida' => $cantidad);  

		}
		return $comidasMesaTres;
}

/*Método para verificar las bebidas pedidas para la mesa tres*/
public function generarPedidoBebidaMesaTres(){

	$bebidasMesaTres = array();

	$consultaPedidosPendientesBebidasMesa3 = "select b.nombre_bebida, pb.cantidad_bebida from mesa mesa inner join pedido p on mesa.idMesa=p.mesa_idMesa inner join pedido__bebida pb on pb.pedido_idPedido=p.idPedido inner join bebida b on pb.Bebida_idBebida = b.idBebida inner join factura f on f.pedido_idPedido=p.idPedido where mesa.idMesa = 5 and p.estado_pedido = 'pendiente' order by mesa.numero_mesa, p.idPedido";

	$pedidoBebidaM3 = DB::select($consultaPedidosPendientesBebidasMesa3);

	foreach ($pedidoBebidaM3 as $pbm3) {
				
		$bebida = $pbm3->nombre_bebida;
		$cantidad = $pbm3->cantidad_bebida;

		$bebidasMesaTres[] = array('nombre_bebida' => $bebida, 'cantidad_bebida' => $cantidad);  

	}
	return $bebidasMesaTres;
}


/*Método para verificar las comidas pedidas para la mesa cuatro*/
public function generarPedidoComidaMesaCuatro(){

		$comidasMesaCuatro = array();

		$consultaPedidosPendientesComidasMesa4 = "select c.nombre_comida, pc.cantidad_comida from mesa mesa inner join pedido p on mesa.idMesa=p.mesa_idMesa inner join pedido__comida pc on pc.pedido_idPedido=p.idPedido inner join comida c on pc.comida_idComida = c.idComida inner join factura f on f.pedido_idPedido=p.idPedido where mesa.idMesa = 6 and p.estado_pedido = 'pendiente' order by mesa.numero_mesa, p.idPedido";
		
		$pedidoComidaM4 = DB::select($consultaPedidosPendientesComidasMesa4);

		foreach ($pedidoComidaM4 as $pcm4) {
				
			$comida = $pcm4->nombre_comida;
			$cantidad = $pcm4->cantidad_comida;

			$comidasMesaCuatro[] = array('nombre_comida' => $comida, 'cantidad_comida' => $cantidad);  

		}
		return $comidasMesaCuatro;
}

/*Método para verificar las bebidas pedidas para la mesa cuatro*/
public function generarPedidoBebidaMesaCuatro(){

	$bebidasMesaCuatro = array();

	$consultaPedidosPendientesBebidasMesa4 = "select b.nombre_bebida, pb.cantidad_bebida from mesa mesa inner join pedido p on mesa.idMesa=p.mesa_idMesa inner join pedido__bebida pb on pb.pedido_idPedido=p.idPedido inner join bebida b on pb.Bebida_idBebida = b.idBebida inner join factura f on f.pedido_idPedido=p.idPedido where mesa.idMesa = 6 and p.estado_pedido = 'pendiente' order by mesa.numero_mesa, p.idPedido";

	$pedidoBebidaM4 = DB::select($consultaPedidosPendientesBebidasMesa4);

	foreach ($pedidoBebidaM4 as $pbm4) {
				
		$bebida = $pbm4->nombre_bebida;
		$cantidad = $pbm4->cantidad_bebida;

		$bebidasMesaCuatro[] = array('nombre_bebida' => $bebida, 'cantidad_bebida' => $cantidad);  

	}
	return $bebidasMesaCuatro;
}


/*Método para verificar las comidas pedidas para la mesa cinco*/
public function generarPedidoComidaMesaCinco(){

		$comidasMesaCinco = array();

		$consultaPedidosPendientesComidasMesa5 = "select c.nombre_comida, pc.cantidad_comida from mesa mesa inner join pedido p on mesa.idMesa=p.mesa_idMesa inner join pedido__comida pc on pc.pedido_idPedido=p.idPedido inner join comida c on pc.comida_idComida = c.idComida inner join factura f on f.pedido_idPedido=p.idPedido where mesa.idMesa = 7 and p.estado_pedido = 'pendiente' order by mesa.numero_mesa, p.idPedido";
		
		$pedidoComidaM5 = DB::select($consultaPedidosPendientesComidasMesa5);

		foreach ($pedidoComidaM5 as $pcm5) {
				
			$comida = $pcm5->nombre_comida;
			$cantidad = $pcm5->cantidad_comida;

			$comidasMesaCinco[] = array('nombre_comida' => $comida, 'cantidad_comida' => $cantidad);  

		}
		return $comidasMesaCinco;
}

/*Método para verificar las bebidas pedidas para la mesa cinco*/
public function generarPedidoBebidaMesaCinco(){

	$bebidasMesaCinco = array();

	$consultaPedidosPendientesBebidasMesa5 = "select b.nombre_bebida, pb.cantidad_bebida from mesa mesa inner join pedido p on mesa.idMesa=p.mesa_idMesa inner join pedido__bebida pb on pb.pedido_idPedido=p.idPedido inner join bebida b on pb.Bebida_idBebida = b.idBebida inner join factura f on f.pedido_idPedido=p.idPedido where mesa.idMesa = 7 and p.estado_pedido = 'pendiente' order by mesa.numero_mesa, p.idPedido";

	$pedidoBebidaM5 = DB::select($consultaPedidosPendientesBebidasMesa5);

	foreach ($pedidoBebidaM5 as $pbm5) {
				
		$bebida = $pbm5->nombre_bebida;
		$cantidad = $pbm5->cantidad_bebida;

		$bebidasMesaCinco[] = array('nombre_bebida' => $bebida, 'cantidad_bebida' => $cantidad);  

	}
	return $bebidasMesaCinco;
}


/*Método para verificar las comidas pedidas para la mesa seis*/
public function generarPedidoComidaMesaSeis(){

		$comidasMesaSeis = array();

		$consultaPedidosPendientesComidasMesa6 = "select c.nombre_comida, pc.cantidad_comida from mesa mesa inner join pedido p on mesa.idMesa=p.mesa_idMesa inner join pedido__comida pc on pc.pedido_idPedido=p.idPedido inner join comida c on pc.comida_idComida = c.idComida inner join factura f on f.pedido_idPedido=p.idPedido where mesa.idMesa = 8 and p.estado_pedido = 'pendiente' order by mesa.numero_mesa, p.idPedido";
		
		$pedidoComidaM6 = DB::select($consultaPedidosPendientesComidasMesa6);

		foreach ($pedidoComidaM6 as $pcm6) {
				
			$comida = $pcm6->nombre_comida;
			$cantidad = $pcm6->cantidad_comida;

			$comidasMesaSeis[] = array('nombre_comida' => $comida, 'cantidad_comida' => $cantidad);  

		}
		return $comidasMesaSeis;
}

/*Método para verificar las bebidas pedidas para la mesa seis*/
public function generarPedidoBebidaMesaSeis(){

	$bebidasMesaSeis = array();

	$consultaPedidosPendientesBebidasMesa6 = "select b.nombre_bebida, pb.cantidad_bebida from mesa mesa inner join pedido p on mesa.idMesa=p.mesa_idMesa inner join pedido__bebida pb on pb.pedido_idPedido=p.idPedido inner join bebida b on pb.Bebida_idBebida = b.idBebida inner join factura f on f.pedido_idPedido=p.idPedido where mesa.idMesa = 8 and p.estado_pedido = 'pendiente' order by mesa.numero_mesa, p.idPedido";

	$pedidoBebidaM6 = DB::select($consultaPedidosPendientesBebidasMesa6);

	foreach ($pedidoBebidaM6 as $pbm6) {
				
		$bebida = $pbm6->nombre_bebida;
		$cantidad = $pbm6->cantidad_bebida;

		$bebidasMesaSeis[] = array('nombre_bebida' => $bebida, 'cantidad_bebida' => $cantidad);  

	}
	return $bebidasMesaSeis;
}


/*Método para verificar las comidas pedidas para la mesa siete*/
public function generarPedidoComidaMesaSiete(){

		$comidasMesaSiete = array();

		$consultaPedidosPendientesComidasMesa7 = "select c.nombre_comida, pc.cantidad_comida from mesa mesa inner join pedido p on mesa.idMesa=p.mesa_idMesa inner join pedido__comida pc on pc.pedido_idPedido=p.idPedido inner join comida c on pc.comida_idComida = c.idComida inner join factura f on f.pedido_idPedido=p.idPedido where mesa.idMesa = 9 and p.estado_pedido = 'pendiente' order by mesa.numero_mesa, p.idPedido";
		
		$pedidoComidaM7 = DB::select($consultaPedidosPendientesComidasMesa7);

		foreach ($pedidoComidaM7 as $pcm7) {
				
			$comida = $pcm7->nombre_comida;
			$cantidad = $pcm7->cantidad_comida;

			$comidasMesaSiete[] = array('nombre_comida' => $comida, 'cantidad_comida' => $cantidad);  

		}
		return $comidasMesaSiete;
}

/*Método para verificar las bebidas pedidas para la mesa siete*/
public function generarPedidoBebidaMesaSiete(){

	$bebidasMesaSiete = array();

	$consultaPedidosPendientesBebidasMesa7 = "select b.nombre_bebida, pb.cantidad_bebida from mesa mesa inner join pedido p on mesa.idMesa=p.mesa_idMesa inner join pedido__bebida pb on pb.pedido_idPedido=p.idPedido inner join bebida b on pb.Bebida_idBebida = b.idBebida inner join factura f on f.pedido_idPedido=p.idPedido where mesa.idMesa = 9 and p.estado_pedido = 'pendiente' order by mesa.numero_mesa, p.idPedido";

	$pedidoBebidaM7 = DB::select($consultaPedidosPendientesBebidasMesa7);

	foreach ($pedidoBebidaM7 as $pbm7) {
				
		$bebida = $pbm7->nombre_bebida;
		$cantidad = $pbm7->cantidad_bebida;

		$bebidasMesaSiete[] = array('nombre_bebida' => $bebida, 'cantidad_bebida' => $cantidad);  

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

/*Método para retornar a la vista todos los ingredientes registrados en la base de datos, para que sean mostrados en la tabla de ingredientes*/
	public function retornarIngredientes(){

		$listadoIngredientes = Ingrediente::all();

		$listadoReportes = self::retornarReporte();

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

		return view('inicioAdministracion', compact('listadoIngredientes', 'listadoReportes', 'pedidoComidaM1', 'pedidoBebidaM1', 'pedidoComidaM2', 'pedidoBebidaM2', 'pedidoComidaM3', 'pedidoBebidaM3', 'pedidoComidaM4', 'pedidoBebidaM4', 'pedidoComidaM5', 'pedidoBebidaM5', 'pedidoComidaM6', 'pedidoBebidaM6', 'pedidoComidaM7', 'pedidoBebidaM7'));

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
			
			if ($factura->created_at >= $fechaMenosUnDia) {
				
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
			
			if ($pedido->created_at >= $fechaMenosUnDia) {
				
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

}

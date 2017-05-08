<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pedido;
use App\Comida;
use App\Bebida;
use App\Adicional;
use App\Mesa;
use App\Factura;
use App\Pedido__Comida;
use App\Pedido__Bebida;
use App\Pedido__Adicional;
use App\Ingrediente;
use App\Ingrediente_Comida;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ControladorPedidos extends Controller
{
/*Método encargado de crear un pedido, incluyendo la mesa, los platos y las bebidas*/
	public function crearPedido(Request $request){

		$fecha = Carbon::now();
		$hora = $fecha->toTimeString();

	  $consultaPedidosPendientes = "select p.idPedido, f.idFactura, f.valor_cuenta from mesa mesa inner join pedido p on mesa.idMesa=p.mesa_idMesa inner join factura f on f.pedido_idPedido=p.idPedido where mesa.idMesa = '".$request->mesa."' and p.estado_pedido = 'pendiente' order by mesa.numero_mesa, p.idPedido";
		
		$pedidoPendiente = DB::select($consultaPedidosPendientes);

		foreach ($pedidoPendiente as $pedido) {
					
			$idPedido = $pedido->idPedido;
			$idFactura = $pedido->idFactura;
			$valor_cuenta = $pedido->valor_cuenta;

			$pedidoPendiente1[] = array('idPedido' => $idPedido, 'idFactura' => $idFactura, 'valor_cuenta' => $valor_cuenta);  

		}

		if ($pedidoPendiente == null) {
			
			Pedido::create([
			'fecha'=> $fecha,
			'hora'=>$hora,
			'estado_pedido'=>'pendiente',
			'Mesa_idMesa'=>$request->mesa,
			'Mesero_idMesero'=>'2',
			'Restaurante_idRestaurante'=>'1'
			]);

			//Variable para acumular el valor de la factura
			$acumuladoValorFactura = 0;

		}else{

			//Variable para acumular el valor de la factura
			$pedidoM = $pedidoPendiente1[0];
			$acumuladoValorFactura = $pedidoM['valor_cuenta'];
			 
		}


		

		//Se obtiene el último pedido registrado para poder registrar las comidas y bebidas en el pedido registrado inmediatamente anterior.
		if ($pedidoPendiente == null) {

			$pedido = Pedido::all();
			$ultimoPedido = $pedido->last();
			$idPedido = $ultimoPedido->idPedido;

		}else{
			
			$pedidoM = $pedidoPendiente1[0];
			$idPedido= $pedidoM['idPedido'];
			 
		}

		

		//Se verifica si dentro del pedido enviado por el mesero, hay comidas para crear la tabla intermedia entre el pedido y las comidas
	 	$acumuladoValorFactura = self::crearPedidosComidas($request, $idPedido, $acumuladoValorFactura);
 
     	//Se verifica si dentro del pedido enviado por el mesero, hay bebidas para crear la tabla intermedia entre el pedido y las comidas
     	$acumuladoValorFactura = self::crearPedidosBebidas($request, $idPedido, $acumuladoValorFactura);

		//Cuando se termine de verificar el contenido del pedido, se crea la factura para el pedido
		if ($pedidoPendiente == null) {
			self::crearFactura($idPedido, $acumuladoValorFactura);
		}else{

			$pedidoM = $pedidoPendiente1[0];
			$pedidoMesa = $pedidoM['idFactura'];

			self::modificarFactura($idPedido, $acumuladoValorFactura, $pedidoMesa);
		}
		

		//Cuando se termine de verificar el contenido del pedido y crear la facura, se redirecciona a la misma página
		return view('inicioPedidos');


	}

	/*Método que sirve de intermediario entre los metodos de crear pedido, y los metodos de crear el pedido de una comida*/
	public function crearPedidosComidas($requestP, $idPedidoP, $acumuladoValorFactura){

		$request = $requestP;
		$idPedido = $idPedidoP;
		//$acumuladoValorFactura = $acumuladoValorFacturaP;

		$acumuladoValorFactura = self::crearPedidoTacoFierro($request, $idPedido, $acumuladoValorFactura);
     	$acumuladoValorFactura = self::crearPedidoTacoMorelo($request, $idPedido, $acumuladoValorFactura);
     	$acumuladoValorFactura = self::crearPedidoTacoPastor($request, $idPedido, $acumuladoValorFactura);
     	$acumuladoValorFactura = self::crearPedidoQuesadillaArequipe($request, $idPedido, $acumuladoValorFactura);
     	$acumuladoValorFactura = self::crearPedidoQuesadillaChampinon($request, $idPedido, $acumuladoValorFactura);
     	$acumuladoValorFactura = self::crearPedidoQuesadillaJamon($request, $idPedido, $acumuladoValorFactura);
     	$acumuladoValorFactura = self::crearPedidoQuesadillaPina($request, $idPedido, $acumuladoValorFactura);
     	$acumuladoValorFactura = self::crearPedidoQuesadillaQueso($request, $idPedido, $acumuladoValorFactura);
     	$acumuladoValorFactura = self::crearPedidoGringaChicharrona($request, $idPedido, $acumuladoValorFactura);
     	$acumuladoValorFactura = self::crearPedidoGringa($request, $idPedido, $acumuladoValorFactura);
     	$acumuladoValorFactura = self::crearPedidoBurroAlbondigon($request, $idPedido, $acumuladoValorFactura);
     	$acumuladoValorFactura = self::crearPedidoBurroCuate($request, $idPedido, $acumuladoValorFactura);
     	$acumuladoValorFactura = self::crearPedidoBurroFestival($request, $idPedido, $acumuladoValorFactura);
     	$acumuladoValorFactura = self::crearPedidoBurroNorteno($request, $idPedido, $acumuladoValorFactura);
     	$acumuladoValorFactura = self::crearPedidoBurroPoblano($request, $idPedido, $acumuladoValorFactura);
     	$acumuladoValorFactura = self::crearPedidoAlambrePastor($request, $idPedido, $acumuladoValorFactura);
     	$acumuladoValorFactura = self::crearPedidoNachosPastor($request, $idPedido, $acumuladoValorFactura);

     	return $acumuladoValorFactura;

	}

	/*Método que sirve de intermediario entre los metodos de crear pedido, y los metodos de crear el pedido de una bebida*/
	public function crearPedidosBebidas($requestP, $idPedidoP, $acumuladoValorFactura){

		$request = $requestP;
		$idPedido = $idPedidoP;
		//$acumuladoValorFactura = $acumuladoValorFacturaP;

		$acumuladoValorFactura = self::crearPedidoCorona($request, $idPedido, $acumuladoValorFactura);
     	$acumuladoValorFactura = self::crearPedidoClubColombia($request, $idPedido, $acumuladoValorFactura);
     	$acumuladoValorFactura = self::crearPedidoManzana($request, $idPedido, $acumuladoValorFactura);
     	$acumuladoValorFactura = self::crearPedidoUva($request, $idPedido, $acumuladoValorFactura);
     	$acumuladoValorFactura = self::crearPedidoNaranja($request, $idPedido, $acumuladoValorFactura);
     	$acumuladoValorFactura = self::crearPedidoColombiana($request, $idPedido, $acumuladoValorFactura);
     	$acumuladoValorFactura = self::crearPedidoCocaCola($request, $idPedido, $acumuladoValorFactura);
     	$acumuladoValorFactura = self::crearPedidoHitMora($request, $idPedido, $acumuladoValorFactura);
     	$acumuladoValorFactura = self::crearPedidoHitNaranja($request, $idPedido, $acumuladoValorFactura);
     	$acumuladoValorFactura = self::crearPedidoHitLulo($request, $idPedido, $acumuladoValorFactura);
     	$acumuladoValorFactura = self::crearPedidoHitMango($request, $idPedido, $acumuladoValorFactura);
     	$acumuladoValorFactura = self::crearPedidoHitTropical($request, $idPedido, $acumuladoValorFactura);
     	$acumuladoValorFactura = self::crearPedidoHorchata($request, $idPedido, $acumuladoValorFactura);
     	$acumuladoValorFactura = self::crearPedidoTamarindo($request, $idPedido, $acumuladoValorFactura);
     	$acumuladoValorFactura = self::crearPedidoMaracuya($request, $idPedido, $acumuladoValorFactura);
     	$acumuladoValorFactura = self::crearPedidoJamaica($request, $idPedido, $acumuladoValorFactura);
     	$acumuladoValorFactura = self::crearPedidoAgua($request, $idPedido, $acumuladoValorFactura);

     	return $acumuladoValorFactura;

	}

	/*Método para crear una factura*/
	public function crearFactura($idPedidoP, $acumuladoValorFacturaP){

		$idPedido = $idPedidoP;
		$acumuladoValorFactura = $acumuladoValorFacturaP;

		Factura::create([

			'valor_cuenta'=>$acumuladoValorFactura,
			'Pedido_idPedido'=>$idPedido,

		]);

	}

	/*Método para crear una factura*/
	public function modificarFactura($idPedidoP, $acumuladoValorFacturaP, $idFacturaP){

		$idPedido = $idPedidoP;
		$acumuladoValorFactura = $acumuladoValorFacturaP;
		$idFactura = $idFacturaP;

		$factura = Factura::find($idFactura);
		$factura->valor_cuenta = $acumuladoValorFactura;
		$factura -> save();

	}

/*Si en la pantalla pedidos, se selecciona alguna cantidad de tacos fierros, se crea el registro del pedido en la tabla intermedia entre pedido y comida*/
	public function crearPedidoTacoFierro($request, $idPedido, $acumuladoValorFactura){

		$acumuladorIngrediente = 0;
		$totalIngrediente = 0;
		$cero=0;

		if ($request->tacoFierro > $cero) {
			
			Pedido__Comida::create([
				'Pedido_idPedido'=>$idPedido,
				'Comida_idComida'=>'10',
				'cantidad_comida'=>$request->tacoFierro,
			]);

			$comida = Comida::find('10');

			$listaIngredienteTacoFierro = Ingrediente_Comida::all();

			$acumuladoValorFactura = $acumuladoValorFactura + ($comida->precio_comida * $request->tacoFierro);
			//Se recorre la lista de ingredientes buscando los ingredientes necesarios para el tacoFierro, se calculan el total de ingredientes consumidos y se hace la resta al ingrediente correspondiente
			foreach ($listaIngredienteTacoFierro as $listaIngredienteTacoFierro) {

				if ($listaIngredienteTacoFierro->Comida_idComida == '10') {

					$acumuladorIngrediente = $acumuladorIngrediente  + ($request->tacoFierro * $listaIngredienteTacoFierro->cantidad_ingrediente);

					$ingredienteTacoFierro = Ingrediente::find($listaIngredienteTacoFierro->Ingrediente_idIngrediente);

					$totalIngrediente = ($ingredienteTacoFierro->cantidad - $acumuladorIngrediente);

					$ingredienteTacoFierro->cantidad = $totalIngrediente;	

					$ingredienteTacoFierro -> save();
				}

			$totalIngrediente = 0;	

			$acumuladorIngrediente = 0;	
			}
			
			

		}

		return $acumuladoValorFactura;
		
	}

//Si en la pantalla pedidos, se selecciona alguna cantidad de tacos Morelo, se crea el registro del pedido en la tabla intermedia entre pedido y comida
	public function crearPedidoTacoMorelo($request, $idPedido, $acumuladoValorFactura){

		$acumuladorIngrediente = 0;
		$totalIngrediente = 0;
		$cero=0;

		if ($request->tacoMorelo > $cero) {
			
			Pedido__Comida::create([
				'Pedido_idPedido'=>$idPedido,
				'Comida_idComida'=>'11',
				'cantidad_comida'=>$request->tacoMorelo,
			]);

			$comida = Comida::find('11');

			$listaIngredienteTacoMorelo = Ingrediente_Comida::all();

			$acumuladoValorFactura = $acumuladoValorFactura + ($comida->precio_comida * $request->tacoMorelo);

			//Se recorre la lista de ingredientes buscando los ingredientes necesarios para el tacoMorelo, se calculan el total de ingredientes consumidos y se hace la resta al ingrediente correspondiente
			foreach ($listaIngredienteTacoMorelo as $listaIngredienteTacoMorelo) {

				if ($listaIngredienteTacoMorelo->Comida_idComida == '11') {

					$acumuladorIngrediente = $acumuladorIngrediente  + ($request->tacoMorelo* $listaIngredienteTacoMorelo->cantidad_ingrediente);

					$ingredienteTacoMorelo = Ingrediente::find($listaIngredienteTacoMorelo->Ingrediente_idIngrediente);

					$totalIngrediente = ($ingredienteTacoMorelo->cantidad - $acumuladorIngrediente);

					$ingredienteTacoMorelo->cantidad = $totalIngrediente;

					$ingredienteTacoMorelo -> save();
				}

			$totalIngrediente = 0;

			$acumuladorIngrediente = 0;	
							
			}

		}

		return $acumuladoValorFactura;		
	}

//Si en la pantalla pedidos, se selecciona alguna cantidad de tacos pastor, se crea el registro del pedido en la tabla intermedia entre pedido y comida
	public function crearPedidoTacoPastor($request, $idPedido, $acumuladoValorFactura){

		$acumuladorIngrediente = 0;
		$totalIngrediente = 0;
		$cero=0;
		
		if ($request->tacoPastor > $cero) {
			
			Pedido__Comida::create([
				'Pedido_idPedido'=>$idPedido,
				'Comida_idComida'=>'12',
				'cantidad_comida'=>$request->tacoPastor,
			]);

			$comida = Comida::find('12');

			$listaIngredienteTacoPastor = Ingrediente_Comida::all();

			$acumuladoValorFactura = $acumuladoValorFactura + ($comida->precio_comida * $request->tacoPastor);

			//Se recorre la lista de ingredientes buscando los ingredientes necesarios para el tacoPastor, se calculan el total de ingredientes consumidos y se hace la resta al ingrediente correspondiente
			foreach ($listaIngredienteTacoPastor as $listaIngredienteTacoPastor) {

				if ($listaIngredienteTacoPastor->Comida_idComida == '12') {

					$acumuladorIngrediente = $acumuladorIngrediente  + ($request->tacoPastor* $listaIngredienteTacoPastor->cantidad_ingrediente);

					$ingredienteTacoPastor = Ingrediente::find($listaIngredienteTacoPastor->Ingrediente_idIngrediente);

					$totalIngrediente = ($ingredienteTacoPastor->cantidad - $acumuladorIngrediente);

					$ingredienteTacoPastor->cantidad = $totalIngrediente;

					$ingredienteTacoPastor -> save();
				}

			$totalIngrediente = 0;

			$acumuladorIngrediente = 0;	
							
			}
							
		}

		return $acumuladoValorFactura;
	}		

//Si en la pantalla pedidos, se selecciona alguna cantidad de quesadillas de arequipe, se crea el registro del pedido en la tabla intermedia entre pedido y comida
	public function crearPedidoQuesadillaArequipe($request, $idPedido, $acumuladoValorFactura){

		$acumuladorIngrediente = 0;
		$totalIngrediente = 0;
		$cero=0;

		if ($request->quesadillaArequipe > $cero) {
			
			Pedido__Comida::create([
				'Pedido_idPedido'=>$idPedido,
				'Comida_idComida'=>'13',
				'cantidad_comida'=>$request->quesadillaArequipe,
			]);

			$comida = Comida::find('13');

			$listaIngredienteQuesadillaArequipe = Ingrediente_Comida::all();

			$acumuladoValorFactura = $acumuladoValorFactura + ($comida->precio_comida * $request->quesadillaArequipe);

			//Se recorre la lista de ingredientes buscando los ingredientes necesarios para la quesadilla de arequipe, se calculan el total de ingredientes consumidos y se hace la resta al ingrediente correspondiente
			foreach ($listaIngredienteQuesadillaArequipe as $listaIngredienteQuesadillaArequipe) {

				if ($listaIngredienteQuesadillaArequipe->Comida_idComida == '13') {

					$acumuladorIngrediente = $acumuladorIngrediente  + ($request->quesadillaArequipe* $listaIngredienteQuesadillaArequipe->cantidad_ingrediente);

					$ingredienteQuesadillaArequipe = Ingrediente::find($listaIngredienteQuesadillaArequipe->Ingrediente_idIngrediente);

					$totalIngrediente = ($ingredienteQuesadillaArequipe->cantidad - $acumuladorIngrediente);

					$ingredienteQuesadillaArequipe->cantidad = $totalIngrediente;

					$ingredienteQuesadillaArequipe -> save();
				}

			$totalIngrediente = 0;

			$acumuladorIngrediente = 0;	
							
			}
		}

		return $acumuladoValorFactura;		
	}

//Si en la pantalla pedidos, se selecciona alguna cantidad de quesadillas de champiñones, se crea el registro del pedido en la tabla intermedia entre pedido y comida
	public function crearPedidoQuesadillaChampinon($request, $idPedido, $acumuladoValorFactura){

		$acumuladorIngrediente = 0;
		$totalIngrediente = 0;
		$cero=0;

		if ($request->quesadillaChampinon > $cero) {
			
			Pedido__Comida::create([
				'Pedido_idPedido'=>$idPedido,
				'Comida_idComida'=>'14',
				'cantidad_comida'=>$request->quesadillaChampinon,
			]);

			$comida = Comida::find('14');

			$listaIngredienteQuesadillaChampinon = Ingrediente_Comida::all();

			$acumuladoValorFactura = $acumuladoValorFactura + ($comida->precio_comida * $request->quesadillaChampinon);

			//Se recorre la lista de ingredientes buscando los ingredientes necesarios para la quesadilla de champiñones, se calculan el total de ingredientes consumidos y se hace la resta al ingrediente correspondiente
			foreach ($listaIngredienteQuesadillaChampinon as $listaIngredienteQuesadillaChampinon) {

				if ($listaIngredienteQuesadillaChampinon->Comida_idComida == '14') {

					$acumuladorIngrediente = $acumuladorIngrediente  + ($request->quesadillaChampinon* $listaIngredienteQuesadillaChampinon->cantidad_ingrediente);

					$ingredienteQuesadillaChampinon = Ingrediente::find($listaIngredienteQuesadillaChampinon->Ingrediente_idIngrediente);

					$totalIngrediente = ($ingredienteQuesadillaChampinon->cantidad - $acumuladorIngrediente);

					$ingredienteQuesadillaChampinon->cantidad = $totalIngrediente;

					$ingredienteQuesadillaChampinon -> save();
				}

			$totalIngrediente = 0;

			$acumuladorIngrediente = 0;	
							
			}

		}

		return $acumuladoValorFactura;		
	}

//Si en la pantalla pedidos, se selecciona alguna cantidad de quesadillas de jamón, se crea el registro del pedido en la tabla intermedia entre pedido y comida
	public function crearPedidoQuesadillaJamon($request, $idPedido, $acumuladoValorFactura){

		$acumuladorIngrediente = 0;
		$totalIngrediente = 0;
		$cero=0;
		
		if ($request->quesadillaJamon > $cero) {
			
			Pedido__Comida::create([
				'Pedido_idPedido'=>$idPedido,
				'Comida_idComida'=>'15',
				'cantidad_comida'=>$request->quesadillaJamon,
			]);

			$comida = Comida::find('15');

			$listaIngredienteQuesadillaJamon = Ingrediente_Comida::all();

			$acumuladoValorFactura = $acumuladoValorFactura + ($comida->precio_comida * $request->quesadillaJamon);

			//Se recorre la lista de ingredientes buscando los ingredientes necesarios para la quesadilla de jamon, se calculan el total de ingredientes consumidos y se hace la resta al ingrediente correspondiente
			foreach ($listaIngredienteQuesadillaJamon as $listaIngredienteQuesadillaJamon) {

				if ($listaIngredienteQuesadillaJamon->Comida_idComida == '15') {

					$acumuladorIngrediente = $acumuladorIngrediente  + ($request->quesadillaJamon* $listaIngredienteQuesadillaJamon->cantidad_ingrediente);

					$ingredienteQuesadillaJamon = Ingrediente::find($listaIngredienteQuesadillaJamon->Ingrediente_idIngrediente);

					$totalIngrediente = ($ingredienteQuesadillaJamon->cantidad - $acumuladorIngrediente);

					$ingredienteQuesadillaJamon->cantidad = $totalIngrediente;

					$ingredienteQuesadillaJamon -> save();
				}

			$totalIngrediente = 0;

			$acumuladorIngrediente = 0;	
							
			}

		}

		return $acumuladoValorFactura;		
	}

//Si en la pantalla pedidos, se selecciona alguna cantidad de quesadilla de piña, se crea el registro del pedido en la tabla intermedia entre pedido y comida
	public function crearPedidoQuesadillaPina($request, $idPedido, $acumuladoValorFactura){

		$acumuladorIngrediente = 0;
		$totalIngrediente = 0;
		$cero=0;

		if ($request->quesadillaPina > $cero) {
			
			Pedido__Comida::create([
				'Pedido_idPedido'=>$idPedido,
				'Comida_idComida'=>'16',
				'cantidad_comida'=>$request->quesadillaPina,
			]);

			$comida = Comida::find('16');

			$listaIngredienteQuesadillaPina = Ingrediente_Comida::all();

			$acumuladoValorFactura = $acumuladoValorFactura + ($comida->precio_comida * $request->quesadillaPina);

			//Se recorre la lista de ingredientes buscando los ingredientes necesarios para la quesadilla de piña, se calculan el total de ingredientes consumidos y se hace la resta al ingrediente correspondiente
			foreach ($listaIngredienteQuesadillaPina as $listaIngredienteQuesadillaPina) {

				if ($listaIngredienteQuesadillaPina->Comida_idComida == '16') {

					$acumuladorIngrediente = $acumuladorIngrediente  + ($request->quesadillaPina* $listaIngredienteQuesadillaPina->cantidad_ingrediente);

					$ingredienteQuesadillaPina = Ingrediente::find($listaIngredienteQuesadillaPina->Ingrediente_idIngrediente);

					$totalIngrediente = ($ingredienteQuesadillaPina->cantidad - $acumuladorIngrediente);

					$ingredienteQuesadillaPina->cantidad = $totalIngrediente;

					$ingredienteQuesadillaPina -> save();
				}

			$totalIngrediente = 0;

			$acumuladorIngrediente = 0;	
							
			}

		}

		return $acumuladoValorFactura;		
	}

//Si en la pantalla pedidos, se selecciona alguna cantidad de quesadillas de queso, se crea el registro del pedido en la tabla intermedia entre pedido y comida
	public function crearPedidoQuesadillaQueso($request, $idPedido, $acumuladoValorFactura){

		$acumuladorIngrediente = 0;
		$totalIngrediente = 0;
		$cero=0;

		if ($request->quesadillaQueso > $cero) {
			
			Pedido__Comida::create([
				'Pedido_idPedido'=>$idPedido,
				'Comida_idComida'=>'17',
				'cantidad_comida'=>$request->quesadillaQueso,
			]);

			$comida = Comida::find('17');

			$listaIngredienteQuesadillaQueso = Ingrediente_Comida::all();

			$acumuladoValorFactura = $acumuladoValorFactura + ($comida->precio_comida * $request->quesadillaQueso);

			//Se recorre la lista de ingredientes buscando los ingredientes necesarios para la quesadilla de queso, se calculan el total de ingredientes consumidos y se hace la resta al ingrediente correspondiente
			foreach ($listaIngredienteQuesadillaQueso as $listaIngredienteQuesadillaQueso) {

				if ($listaIngredienteQuesadillaQueso->Comida_idComida == '17') {

					$acumuladorIngrediente = $acumuladorIngrediente  + ($request->quesadillaQueso* $listaIngredienteQuesadillaQueso->cantidad_ingrediente);

					$ingredienteQuesadillaQueso = Ingrediente::find($listaIngredienteQuesadillaQueso->Ingrediente_idIngrediente);

					$totalIngrediente = ($ingredienteQuesadillaQueso->cantidad - $acumuladorIngrediente);

					$ingredienteQuesadillaQueso->cantidad = $totalIngrediente;

					$ingredienteQuesadillaQueso -> save();
				}

			$totalIngrediente = 0;

			$acumuladorIngrediente = 0;	
							
			}

		}

		return $acumuladoValorFactura;		
	}

//Si en la pantalla pedidos, se selecciona alguna cantidad de gringas chicharronas, se crea el registro del pedido en la tabla intermedia entre pedido y comida
	public function crearPedidoGringaChicharrona($request, $idPedido, $acumuladoValorFactura){

		$acumuladorIngrediente = 0;
		$totalIngrediente = 0;
		$cero=0;

		if ($request->gringaChicharrona > $cero) {
			
			Pedido__Comida::create([
				'Pedido_idPedido'=>$idPedido,
				'Comida_idComida'=>'18',
				'cantidad_comida'=>$request->gringaChicharrona,
			]);

			$comida = Comida::find('18');

			$listaIngredienteGringaChicharrona = Ingrediente_Comida::all();

			$acumuladoValorFactura = $acumuladoValorFactura + ($comida->precio_comida * $request->gringaChicharrona);

			//Se recorre la lista de ingredientes buscando los ingredientes necesarios para la gringa chicharrona, se calculan el total de ingredientes consumidos y se hace la resta al ingrediente correspondiente
			foreach ($listaIngredienteGringaChicharrona as $listaIngredienteGringaChicharrona) {

				if ($listaIngredienteGringaChicharrona->Comida_idComida == '18') {

					$acumuladorIngrediente = $acumuladorIngrediente  + ($request->gringaChicharrona* $listaIngredienteGringaChicharrona->cantidad_ingrediente);

					$ingredienteGringaChicharrona = Ingrediente::find($listaIngredienteGringaChicharrona->Ingrediente_idIngrediente);

					$totalIngrediente = ($ingredienteGringaChicharrona->cantidad - $acumuladorIngrediente);

					$ingredienteGringaChicharrona->cantidad = $totalIngrediente;

					$ingredienteGringaChicharrona -> save();
				}

			$totalIngrediente = 0;

			$acumuladorIngrediente = 0;	
							
			}

		}

		return $acumuladoValorFactura;		
	}

//Si en la pantalla pedidos, se selecciona alguna cantidad de gringas, se crea el registro del pedido en la tabla intermedia entre pedido y comida
	public function crearPedidoGringa($request, $idPedido, $acumuladoValorFactura){

		$acumuladorIngrediente = 0;
		$totalIngrediente = 0;
		$cero=0;
		
		if ($request->gringa > $cero) {
			
			Pedido__Comida::create([
				'Pedido_idPedido'=>$idPedido,
				'Comida_idComida'=>'19',
				'cantidad_comida'=>$request->gringa,
			]);

			$comida = Comida::find('19');

			$listaIngredienteGringa = Ingrediente_Comida::all();

			$acumuladoValorFactura = $acumuladoValorFactura + ($comida->precio_comida * $request->gringa);

			//Se recorre la lista de ingredientes buscando los ingredientes necesarios para la gringa, se calculan el total de ingredientes consumidos y se hace la resta al ingrediente correspondiente
			foreach ($listaIngredienteGringa as $listaIngredienteGringa) {

				if ($listaIngredienteGringa->Comida_idComida == '19') {

					$acumuladorIngrediente = $acumuladorIngrediente  + ($request->gringa * $listaIngredienteGringa->cantidad_ingrediente);

					$ingredienteGringa = Ingrediente::find($listaIngredienteGringa->Ingrediente_idIngrediente);

					$totalIngrediente = ($ingredienteGringa->cantidad - $acumuladorIngrediente);

					$ingredienteGringa->cantidad = $totalIngrediente;

					$ingredienteGringa -> save();
				}

			$totalIngrediente = 0;

			$acumuladorIngrediente = 0;	
							
			}

		}

		return $acumuladoValorFactura;		
	}

//Si en la pantalla pedidos, se selecciona alguna cantidad de burros albondigon, se crea el registro del pedido en la tabla intermedia entre pedido y comida
	public function crearPedidoBurroAlbondigon($request, $idPedido, $acumuladoValorFactura){

		$acumuladorIngrediente = 0;
		$totalIngrediente = 0;
		$cero=0;

		if ($request->burroAlbondigon > $cero) {
			
			Pedido__Comida::create([
				'Pedido_idPedido'=>$idPedido,
				'Comida_idComida'=>'20',
				'cantidad_comida'=>$request->burroAlbondigon,
			]);

			$comida = Comida::find('20');

			$listaIngredienteBurroAlbondigon = Ingrediente_Comida::all();

			$acumuladoValorFactura = $acumuladoValorFactura + ($comida->precio_comida * $request->burroAlbondigon);

			//Se recorre la lista de ingredientes buscando los ingredientes necesarios para el burro albondigon, se calculan el total de ingredientes consumidos y se hace la resta al ingrediente correspondiente
			foreach ($listaIngredienteBurroAlbondigon as $listaIngredienteBurroAlbondigon) {

				if ($listaIngredienteBurroAlbondigon->Comida_idComida == '20') {

					$acumuladorIngrediente = $acumuladorIngrediente  + ($request->burroAlbondigon * $listaIngredienteBurroAlbondigon->cantidad_ingrediente);

					$ingredienteBurroAlbondigon = Ingrediente::find($listaIngredienteBurroAlbondigon->Ingrediente_idIngrediente);

					$totalIngrediente = ($ingredienteBurroAlbondigon->cantidad - $acumuladorIngrediente);

					$ingredienteBurroAlbondigon->cantidad = $totalIngrediente;

					$ingredienteBurroAlbondigon -> save();
				}

			$totalIngrediente = 0;

			$acumuladorIngrediente = 0;	
							
			}

		}

		return $acumuladoValorFactura;		
	}

//Si en la pantalla pedidos, se selecciona alguna cantidad de burros cuate, se crea el registro del pedido en la tabla intermedia entre pedido y comida
	public function crearPedidoBurroCuate($request, $idPedido, $acumuladoValorFactura){

		$acumuladorIngrediente = 0;
		$totalIngrediente = 0;
		$cero=0;
		
		if ($request->burroCuate > $cero) {
			
			Pedido__Comida::create([
				'Pedido_idPedido'=>$idPedido,
				'Comida_idComida'=>'21',
				'cantidad_comida'=>$request->burroCuate,
			]);

			$comida = Comida::find('21');

			$listaIngredienteBurroCuate = Ingrediente_Comida::all();

			$acumuladoValorFactura = $acumuladoValorFactura + ($comida->precio_comida * $request->burroCuate);

			//Se recorre la lista de ingredientes buscando los ingredientes necesarios para el burro cuate se calculan el total de ingredientes consumidos y se hace la resta al ingrediente correspondiente
			foreach ($listaIngredienteBurroCuate as $listaIngredienteBurroCuate) {

				if ($listaIngredienteBurroCuate->Comida_idComida == '21') {

					$acumuladorIngrediente = $acumuladorIngrediente  + ($request->burroCuate * $listaIngredienteBurroCuate->cantidad_ingrediente);

					$ingredienteBurroCuate = Ingrediente::find($listaIngredienteBurroCuate->Ingrediente_idIngrediente);

					$totalIngrediente = ($ingredienteBurroCuate->cantidad - $acumuladorIngrediente);

					$ingredienteBurroCuate->cantidad = $totalIngrediente;

					$ingredienteBurroCuate -> save();
				}

			$totalIngrediente = 0;

			$acumuladorIngrediente = 0;	
							
			}

		}

		return $acumuladoValorFactura;		
	}

//Si en la pantalla pedidos, se selecciona alguna cantidad de burros festival, se crea el registro del pedido en la tabla intermedia entre pedido y comida
	public function crearPedidoBurroFestival($request, $idPedido, $acumuladoValorFactura){

		$acumuladorIngrediente = 0;
		$totalIngrediente = 0;
		$cero=0;
		
		if ($request->burroFestival > $cero) {
			
			Pedido__Comida::create([
				'Pedido_idPedido'=>$idPedido,
				'Comida_idComida'=>'22',
				'cantidad_comida'=>$request->burroFestival,
			]);

			$comida = Comida::find('22');

			$listaIngredienteBurroFestival = Ingrediente_Comida::all();

			$acumuladoValorFactura = $acumuladoValorFactura + ($comida->precio_comida * $request->burroFestival);

			//Se recorre la lista de ingredientes buscando los ingredientes necesarios para el burro festival se calculan el total de ingredientes consumidos y se hace la resta al ingrediente correspondiente
			foreach ($listaIngredienteBurroFestival as $listaIngredienteBurroFestival) {

				if ($listaIngredienteBurroFestival->Comida_idComida == '22') {

					$acumuladorIngrediente = $acumuladorIngrediente  + ($request->burroFestival * $listaIngredienteBurroFestival->cantidad_ingrediente);

					$ingredienteBurroFestival= Ingrediente::find($listaIngredienteBurroFestival->Ingrediente_idIngrediente);

					$totalIngrediente = ($ingredienteBurroFestival->cantidad - $acumuladorIngrediente);

					$ingredienteBurroFestival->cantidad = $totalIngrediente;

					$ingredienteBurroFestival -> save();
				}

			$totalIngrediente = 0;

			$acumuladorIngrediente = 0;	
							
			}

		}

		return $acumuladoValorFactura;		
	}

//Si en la pantalla pedidos, se selecciona alguna cantidad de burros norteños, se crea el registro del pedido en la tabla intermedia entre pedido y comida
	public function crearPedidoBurroNorteno($request, $idPedido, $acumuladoValorFactura){

		$acumuladorIngrediente = 0;
		$totalIngrediente = 0;
		$cero=0;
	
		if ($request->burroNorteno > $cero) {
			
			Pedido__Comida::create([
				'Pedido_idPedido'=>$idPedido,
				'Comida_idComida'=>'23',
				'cantidad_comida'=>$request->burroNorteno,
			]);

			$comida = Comida::find('23');

			$listaIngredienteBurroNorteno = Ingrediente_Comida::all();

			$acumuladoValorFactura = $acumuladoValorFactura + ($comida->precio_comida * $request->burroNorteno);

			//Se recorre la lista de ingredientes buscando los ingredientes necesarios para el burro norteño, se calculan el total de ingredientes consumidos y se hace la resta al ingrediente correspondiente
			foreach ($listaIngredienteBurroNorteno as $listaIngredienteBurroNorteno) {

				if ($listaIngredienteBurroNorteno->Comida_idComida == '23') {

					$acumuladorIngrediente = $acumuladorIngrediente  + ($request->burroNorteno * $listaIngredienteBurroNorteno->cantidad_ingrediente);

					$ingredienteBurroNorteno = Ingrediente::find($listaIngredienteBurroNorteno->Ingrediente_idIngrediente);

					$totalIngrediente = ($ingredienteBurroNorteno->cantidad - $acumuladorIngrediente);

					$ingredienteBurroNorteno->cantidad = $totalIngrediente;

					$ingredienteBurroNorteno -> save();
				}

			$totalIngrediente = 0;

			$acumuladorIngrediente = 0;	
							
			}

		}

		return $acumuladoValorFactura;		
	}

//Si en la pantalla pedidos, se selecciona alguna cantidad de burros poblanos, se crea el registro del pedido en la tabla intermedia entre pedido y comida
	public function crearPedidoBurroPoblano($request, $idPedido, $acumuladoValorFactura){

		$acumuladorIngrediente = 0;
		$totalIngrediente = 0;
		$cero=0;
		
		if ($request->burroPoblano > $cero) {
			
			Pedido__Comida::create([
				'Pedido_idPedido'=>$idPedido,
				'Comida_idComida'=>'24',
				'cantidad_comida'=>$request->burroPoblano,
			]);

			$comida = Comida::find('24');

			$listaIngredienteBurroPoblano = Ingrediente_Comida::all();

			$acumuladoValorFactura = $acumuladoValorFactura + ($comida->precio_comida * $request->burroPoblano);

			//Se recorre la lista de ingredientes buscando los ingredientes necesarios para el burro poblano, se calculan el total de ingredientes consumidos y se hace la resta al ingrediente correspondiente
			foreach ($listaIngredienteBurroPoblano as $listaIngredienteBurroPoblano) {

				if ($listaIngredienteBurroPoblano->Comida_idComida == '24') {

					$acumuladorIngrediente = $acumuladorIngrediente  + ($request->burroPoblano * $listaIngredienteBurroPoblano->cantidad_ingrediente);

					$ingredienteBurroPoblano = Ingrediente::find($listaIngredienteBurroPoblano->Ingrediente_idIngrediente);

					$totalIngrediente = ($ingredienteBurroPoblano->cantidad - $acumuladorIngrediente);

					$ingredienteBurroPoblano->cantidad = $totalIngrediente;

					$ingredienteBurroPoblano -> save();
				}

			$totalIngrediente = 0;

			$acumuladorIngrediente = 0;	
							
			}

		}

		return $acumuladoValorFactura;		
	}

//Si en la pantalla pedidos, se selecciona alguna cantidad de alambre pastor, se crea el registro del pedido en la tabla intermedia entre pedido y comida
	public function crearPedidoAlambrePastor($request, $idPedido, $acumuladoValorFactura){

		$acumuladorIngrediente = 0;
		$totalIngrediente = 0;
		$cero=0;	
		
		if ($request->alambrePastor > $cero) {
			
			Pedido__Comida::create([
				'Pedido_idPedido'=>$idPedido,
				'Comida_idComida'=>'25',
				'cantidad_comida'=>$request->alambrePastor,
			]);

			$comida = Comida::find('25');

			$listaIngredienteAlambrePastor = Ingrediente_Comida::all();

			$acumuladoValorFactura = $acumuladoValorFactura + ($comida->precio_comida * $request->alambrePastor);

			//Se recorre la lista de ingredientes buscando los ingredientes necesarios para el alambre pastor, se calculan el total de ingredientes consumidos y se hace la resta al ingrediente correspondiente
			foreach ($listaIngredienteAlambrePastor as $listaIngredienteAlambrePastor) {

				if ($listaIngredienteAlambrePastor->Comida_idComida == '25') {

					$acumuladorIngrediente = $acumuladorIngrediente  + ($request->alambrePastor * $listaIngredienteAlambrePastor->cantidad_ingrediente);

					$ingredienteAlambrePastor = Ingrediente::find($listaIngredienteAlambrePastor->Ingrediente_idIngrediente);

					$totalIngrediente = ($ingredienteAlambrePastor->cantidad - $acumuladorIngrediente);

					$ingredienteAlambrePastor->cantidad = $totalIngrediente;

					$ingredienteAlambrePastor -> save();
				}

			$totalIngrediente = 0;

			$acumuladorIngrediente = 0;	
							
			}

			
		}

		return $acumuladoValorFactura;	
	}

//Si en la pantalla pedidos, se selecciona alguna cantidad de nachos pastor, se crea el registro del pedido en la tabla intermedia entre pedido y comida
	public function crearPedidoNachosPastor($request, $idPedido, $acumuladoValorFactura){

		$acumuladorIngrediente = 0;
		$totalIngrediente = 0;
		$cero=0;
		
		if ($request->nachosPastor > $cero) {
			
			Pedido__Comida::create([
				'Pedido_idPedido'=>$idPedido,
				'Comida_idComida'=>'26',
				'cantidad_comida'=>$request->nachosPastor,
			]);

			$comida = Comida::find('26');

			$listaIngredienteNachoPastor = Ingrediente_Comida::all();

			$acumuladoValorFactura = $acumuladoValorFactura + ($comida->precio_comida * $request->nachosPastor);

			//Se recorre la lista de ingredientes buscando los ingredientes necesarios para el nacho pastor, se calculan el total de ingredientes consumidos y se hace la resta al ingrediente correspondiente
			foreach ($listaIngredienteNachoPastor as $listaIngredienteNachoPastor) {

				if ($listaIngredienteNachoPastor->Comida_idComida == '26') {

					$acumuladorIngrediente = $acumuladorIngrediente  + ($request->nachosPastor* $listaIngredienteNachoPastor->cantidad_ingrediente);

					$ingredienteNachoPastor = Ingrediente::find($listaIngredienteNachoPastor->Ingrediente_idIngrediente);

					$totalIngrediente = ($ingredienteNachoPastor->cantidad - $acumuladorIngrediente);

					$ingredienteNachoPastor->cantidad = $totalIngrediente;

					$ingredienteNachoPastor -> save();
				}

			$totalIngrediente = 0;

			$acumuladorIngrediente = 0;	
							
			}

			
		}

		return $acumuladoValorFactura;		
	}



/*BEBIDAS*/

//Si en la pantalla pedidos, se selecciona alguna cantidad de corona, se crea el registro del pedido en la tabla intermedia entre pedido y bebida
	public function crearPedidoCorona($request, $idPedido, $acumuladoValorFactura){

		$cero=0;
				
		if ($request->corona > $cero) {
			
			Pedido__Bebida::create([
				'Pedido_idPedido'=>$idPedido,
				'Bebida_idBebida'=>'27',
				'cantidad_bebida'=>$request->corona,
			]);

			$bebida = Bebida::find('27');

			$acumuladoValorFactura = $acumuladoValorFactura + ($bebida->precio_bebida * $request->corona);

			}

		return $acumuladoValorFactura;		
	}

//Si en la pantalla pedidos, se selecciona alguna cantidad de clubColombia, se crea el registro del pedido en la tabla intermedia entre pedido y bebida
	public function crearPedidoClubColombia($request, $idPedido, $acumuladoValorFactura){

		$cero=0;
				
		if ($request->clubColombia > $cero) {
			
			Pedido__Bebida::create([
				'Pedido_idPedido'=>$idPedido,
				'Bebida_idBebida'=>'28',
				'cantidad_bebida'=>$request->clubColombia,
			]);

			$bebida = Bebida::find('28');

			$acumuladoValorFactura = $acumuladoValorFactura + ($bebida->precio_bebida * $request->clubColombia);

		}

		return $acumuladoValorFactura;		
	}

//Si en la pantalla pedidos, se selecciona alguna cantidad de manzana, se crea el registro del pedido en la tabla intermedia entre pedido y bebida
	public function crearPedidoManzana($request, $idPedido, $acumuladoValorFactura){

		$cero=0;
		
		if ($request->manzana > $cero) {
			
			Pedido__Bebida::create([
				'Pedido_idPedido'=>$idPedido,
				'Bebida_idBebida'=>'29',
				'cantidad_bebida'=>$request->manzana,
			]);

			$bebida = Bebida::find('29');

			$acumuladoValorFactura = $acumuladoValorFactura + ($bebida->precio_bebida * $request->manzana);

			}

		return $acumuladoValorFactura;		
	}

	
//Si en la pantalla pedidos, se selecciona alguna cantidad de uva, se crea el registro del pedido en la tabla intermedia entre pedido y bebida
	public function crearPedidoUva($request, $idPedido, $acumuladoValorFactura){

		$cero=0;	
		
		if ($request->uva > $cero) {
			
			Pedido__Bebida::create([
				'Pedido_idPedido'=>$idPedido,
				'Bebida_idBebida'=>'30',
				'cantidad_bebida'=>$request->uva,
			]);

			$bebida = Bebida::find('30');

			$acumuladoValorFactura = $acumuladoValorFactura + ($bebida->precio_bebida * $request->uva);

			}

		return $acumuladoValorFactura;		
	}

//Si en la pantalla pedidos, se selecciona alguna cantidad de naranja, se crea el registro del pedido en la tabla intermedia entre pedido y bebida
	public function crearPedidoNaranja($request, $idPedido, $acumuladoValorFactura){

		$cero=0;		
		
		if ($request->naranja > $cero) {
			
			Pedido__Bebida::create([
				'Pedido_idPedido'=>$idPedido,
				'Bebida_idBebida'=>'31',
				'cantidad_bebida'=>$request->naranja,
			]);

			$bebida = Bebida::find('31');

			$acumuladoValorFactura = $acumuladoValorFactura + ($bebida->precio_bebida * $request->naranja);

			}

		return $acumuladoValorFactura;		
	}

//Si en la pantalla pedidos, se selecciona alguna cantidad de colombiana, se crea el registro del pedido en la tabla intermedia entre pedido y bebida
	public function crearPedidoColombiana($request, $idPedido, $acumuladoValorFactura){

		$cero=0;
				
		if ($request->colombiana > $cero) {
			
			Pedido__Bebida::create([
				'Pedido_idPedido'=>$idPedido,
				'Bebida_idBebida'=>'32',
				'cantidad_bebida'=>$request->colombiana,
			]);

			$bebida = Bebida::find('32');

			$acumuladoValorFactura = $acumuladoValorFactura + ($bebida->precio_bebida * $request->colombiana);

			}

		return $acumuladoValorFactura;	
	}

//Si en la pantalla pedidos, se selecciona alguna cantidad de cocaCola, se crea el registro del pedido en la tabla intermedia entre pedido y bebida
	public function crearPedidoCocaCola($request, $idPedido, $acumuladoValorFactura){

		$cero=0;
				
		if ($request->cocaCola > $cero) {
			
			Pedido__Bebida::create([
				'Pedido_idPedido'=>$idPedido,
				'Bebida_idBebida'=>'33',
				'cantidad_bebida'=>$request->cocaCola,
			]);

			$bebida = Bebida::find('33');

			$acumuladoValorFactura = $acumuladoValorFactura + ($bebida->precio_bebida * $request->cocaCola);

			}

		return $acumuladoValorFactura;
	}

//Si en la pantalla pedidos, se selecciona alguna cantidad de hitMora, se crea el registro del pedido en la tabla intermedia entre pedido y bebida
	public function crearPedidoHitMora($request, $idPedido, $acumuladoValorFactura){

		$cero=0;
				
		if ($request->hitMora > $cero) {
			
			Pedido__Bebida::create([
				'Pedido_idPedido'=>$idPedido,
				'Bebida_idBebida'=>'34',
				'cantidad_bebida'=>$request->hitMora,
			]);

			$bebida = Bebida::find('34');

			$acumuladoValorFactura = $acumuladoValorFactura + ($bebida->precio_bebida * $request->hitMora);

			}

		return $acumuladoValorFactura;		
	}

//Si en la pantalla pedidos, se selecciona alguna cantidad de hitNaranja, se crea el registro del pedido en la tabla intermedia entre pedido y bebida
	public function crearPedidoHitNaranja($request, $idPedido, $acumuladoValorFactura){

		$cero=0;
				
		if ($request->hitNaranja > $cero) {
			
			Pedido__Bebida::create([
				'Pedido_idPedido'=>$idPedido,
				'Bebida_idBebida'=>'35',
				'cantidad_bebida'=>$request->hitNaranja,
			]);

			$bebida = Bebida::find('35');

			$acumuladoValorFactura = $acumuladoValorFactura + ($bebida->precio_bebida * $request->hitNaranja);

			}

		return $acumuladoValorFactura;		
	}

//Si en la pantalla pedidos, se selecciona alguna cantidad de hitLulo, se crea el registro del pedido en la tabla intermedia entre pedido y bebida
	public function crearPedidoHitLulo($request, $idPedido, $acumuladoValorFactura){

		$cero=0;
				
		if ($request->hitLulo > $cero) {
			
			Pedido__Bebida::create([
				'Pedido_idPedido'=>$idPedido,
				'Bebida_idBebida'=>'36',
				'cantidad_bebida'=>$request->hitLulo,
			]);

			$bebida = Bebida::find('36');

			$acumuladoValorFactura = $acumuladoValorFactura + ($bebida->precio_bebida * $request->hitLulo);

			}

		return $acumuladoValorFactura;		
	}

//Si en la pantalla pedidos, se selecciona alguna cantidad de hitMango, se crea el registro del pedido en la tabla intermedia entre pedido y bebida
	public function crearPedidoHitMango($request, $idPedido, $acumuladoValorFactura){

		$cero=0;
			
		if ($request->hitMango > $cero) {
			
			Pedido__Bebida::create([
				'Pedido_idPedido'=>$idPedido,
				'Bebida_idBebida'=>'37',
				'cantidad_bebida'=>$request->hitMango,
			]);

			$bebida = Bebida::find('37');

			$acumuladoValorFactura = $acumuladoValorFactura + ($bebida->precio_bebida * $request->hitMango);

			}

		return $acumuladoValorFactura;		
	}

//Si en la pantalla pedidos, se selecciona alguna cantidad de hitFrutasTropicales, se crea el registro del pedido en la tabla intermedia entre pedido y bebida
	public function crearPedidoHitTropical($request, $idPedido, $acumuladoValorFactura){

		$cero=0;
		
		if ($request->hitFrutasTropicales > $cero) {
			
			Pedido__Bebida::create([
				'Pedido_idPedido'=>$idPedido,
				'Bebida_idBebida'=>'38',
				'cantidad_bebida'=>$request->hitFrutasTropicales,
			]);

			$bebida = Bebida::find('38');

			$acumuladoValorFactura = $acumuladoValorFactura + ($bebida->precio_bebida * $request->hitFrutasTropicales);

			}

		return $acumuladoValorFactura;		
	}

//Si en la pantalla pedidos, se selecciona alguna cantidad de horchata, se crea el registro del pedido en la tabla intermedia entre pedido y bebida
	public function crearPedidoHorchata($request, $idPedido, $acumuladoValorFactura){

		$cero=0;
		
		if ($request->horchata > $cero) {
			
			Pedido__Bebida::create([
				'Pedido_idPedido'=>$idPedido,
				'Bebida_idBebida'=>'39',
				'cantidad_bebida'=>$request->horchata,
			]);

			$bebida = Bebida::find('39');

			$acumuladoValorFactura = $acumuladoValorFactura + ($bebida->precio_bebida * $request->horchata);

			}

		return $acumuladoValorFactura;		
	}

//Si en la pantalla pedidos, se selecciona alguna cantidad de tamarindo, se crea el registro del pedido en la tabla intermedia entre pedido y bebida
	public function crearPedidoTamarindo($request, $idPedido, $acumuladoValorFactura){

		$cero=0;
				
		if ($request->tamarindo > $cero) {
			
			Pedido__Bebida::create([
				'Pedido_idPedido'=>$idPedido,
				'Bebida_idBebida'=>'40',
				'cantidad_bebida'=>$request->tamarindo,
			]);

			$bebida = Bebida::find('40');

			$acumuladoValorFactura = $acumuladoValorFactura + ($bebida->precio_bebida * $request->tamarindo);

			}

		return $acumuladoValorFactura;		
	}


//Si en la pantalla pedidos, se selecciona alguna cantidad de maracuya, se crea el registro del pedido en la tabla intermedia entre pedido y bebida
	public function crearPedidoMaracuya($request, $idPedido, $acumuladoValorFactura){

		$cero=0;
			
		if ($request->maracuya > $cero) {
			
			Pedido__Bebida::create([
				'Pedido_idPedido'=>$idPedido,
				'Bebida_idBebida'=>'41',
				'cantidad_bebida'=>$request->maracuya,
			]);

			$bebida = Bebida::find('41');

			$acumuladoValorFactura = $acumuladoValorFactura + ($bebida->precio_bebida * $request->maracuya);

			}

		return $acumuladoValorFactura;		
	}


//Si en la pantalla pedidos, se selecciona alguna cantidad de jamaica, se crea el registro del pedido en la tabla intermedia entre pedido y bebida
	public function crearPedidoJamaica($request, $idPedido, $acumuladoValorFactura){

		$cero=0;	
		
		if ($request->jamaica > $cero) {
			
			Pedido__Bebida::create([
				'Pedido_idPedido'=>$idPedido,
				'Bebida_idBebida'=>'42',
				'cantidad_bebida'=>$request->jamaica,
			]);

			$bebida = Bebida::find('42');

			$acumuladoValorFactura = $acumuladoValorFactura + ($bebida->precio_bebida * $request->jamaica);

			}

		return $acumuladoValorFactura;		
	}


//Si en la pantalla pedidos, se selecciona alguna cantidad de agua, se crea el registro del pedido en la tabla intermedia entre pedido y bebida
	public function crearPedidoAgua($request, $idPedido, $acumuladoValorFactura){

		$cero=0;
		
		if ($request->agua > $cero) {
			
			Pedido__Bebida::create([
				'Pedido_idPedido'=>$idPedido,
				'Bebida_idBebida'=>'43',
				'cantidad_bebida'=>$request->agua,
			]);

			$bebida = Bebida::find('43');

			$acumuladoValorFactura = $acumuladoValorFactura + ($bebida->precio_bebida * $request->agua);

			}

		return $acumuladoValorFactura;			
	}		
}    
	

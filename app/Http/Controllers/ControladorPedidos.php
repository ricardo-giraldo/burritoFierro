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

class ControladorPedidos extends Controller
{
    
/*Método encargado de crear un pedido, incluyendo la mesa, los platos y las bebidas*/
	public function crearPedido(Request $request){


		$carbon = new \Carbon\Carbon();
		$fecha = $carbon->now();
		$hora = $fecha->toTimeString();    

		$acumuladoValorFactura = 0;

		Pedido::create([
			'fecha'=> $fecha,
			'hora'=>$hora,
			'estado_pedido'=>'pendiente',
			'Mesa_idMesa'=>$request->mesa,
			'Mesero_idMesero'=>'2',
			'Restaurante_idRestaurante'=>'1'
		]);

//Se obtiene el último pedido registrado para poder regitrar las comidas y bebidas en el pedido registrado inmediatamente anterior.

		$pedido = Pedido::all();
		$ultimoPedido = $pedido->last();
		$idPedido = $ultimoPedido->idPedido;

		$cero=0;

/*Se verifica si dentro del pedido enviado por el mesero, hay comidas para crear la tabla intermedia entre el pedido y las comidas*/
		

//Si en la pantalla pedidos, se selecciona alguna cantidad de tacos fierros, se crea el registro del pedido en la tabla intermedia entre pedido y comida
		if ($request->tacoFierro > $cero) {
			
			Pedido__Comida::create([
				'Pedido_idPedido'=>$idPedido,
				'Comida_idComida'=>'10',
				'cantidad_comida'=>$request->tacoFierro,
			]);

			$comida = Comida::find('10');

			$acumuladoValorFactura = $acumuladoValorFactura + ($comida->precio_comida * $request->tacoFierro);
		}

		//Si en la pantalla pedidos, se selecciona alguna cantidad de tacos Morelo, se crea el registro del pedido en la tabla intermedia entre pedido y comida
		if ($request->tacoMorelo > $cero) {
			
			Pedido__Comida::create([
				'Pedido_idPedido'=>$idPedido,
				'Comida_idComida'=>'11',
				'cantidad_comida'=>$request->tacoMorelo,
			]);

			$comida = Comida::find('11');

			$acumuladoValorFactura = $acumuladoValorFactura + ($comida->precio_comida * $request->tacoMorelo);
		}

//Si en la pantalla pedidos, se selecciona alguna cantidad de tacos pastor, se crea el registro del pedido en la tabla intermedia entre pedido y comida
		if ($request->tacoPastor > $cero) {
			
			Pedido__Comida::create([
				'Pedido_idPedido'=>$idPedido,
				'Comida_idComida'=>'12',
				'cantidad_comida'=>$request->tacoPastor,
			]);

			$comida = Comida::find('12');

			$acumuladoValorFactura = $acumuladoValorFactura + ($comida->precio_comida * $request->tacoPastor);
		}					

//Si en la pantalla pedidos, se selecciona alguna cantidad de quesadillas de arequipe, se crea el registro del pedido en la tabla intermedia entre pedido y comida
		if ($request->quesadillaArequipe > $cero) {
			
			Pedido__Comida::create([
				'Pedido_idPedido'=>$idPedido,
				'Comida_idComida'=>'13',
				'cantidad_comida'=>$request->quesadillaArequipe,
			]);

			$comida = Comida::find('13');

			$acumuladoValorFactura = $acumuladoValorFactura + ($comida->precio_comida * $request->quesadillaArequipe);
		}

//Si en la pantalla pedidos, se selecciona alguna cantidad de quesadillas de champiñones, se crea el registro del pedido en la tabla intermedia entre pedido y comida
		if ($request->quesadillaChampinon > $cero) {
			
			Pedido__Comida::create([
				'Pedido_idPedido'=>$idPedido,
				'Comida_idComida'=>'14',
				'cantidad_comida'=>$request->quesadillaChampinon,
			]);

			$comida = Comida::find('14');

			$acumuladoValorFactura = $acumuladoValorFactura + ($comida->precio_comida * $request->quesadillaChampinon);
		}

//Si en la pantalla pedidos, se selecciona alguna cantidad de quesadillas de jamón, se crea el registro del pedido en la tabla intermedia entre pedido y comida
		if ($request->quesadillaJamon > $cero) {
			
			Pedido__Comida::create([
				'Pedido_idPedido'=>$idPedido,
				'Comida_idComida'=>'15',
				'cantidad_comida'=>$request->quesadillaJamon,
			]);

			$comida = Comida::find('15');

			$acumuladoValorFactura = $acumuladoValorFactura + ($comida->precio_comida * $request->quesadillaJamon);
		}

//Si en la pantalla pedidos, se selecciona alguna cantidad de quesadilla de piña, se crea el registro del pedido en la tabla intermedia entre pedido y comida
		if ($request->quesadillaPina > $cero) {
			
			Pedido__Comida::create([
				'Pedido_idPedido'=>$idPedido,
				'Comida_idComida'=>'16',
				'cantidad_comida'=>$request->quesadillaPina,
			]);

			$comida = Comida::find('16');

			$acumuladoValorFactura = $acumuladoValorFactura + ($comida->precio_comida * $request->quesadillaPina);
		}

//Si en la pantalla pedidos, se selecciona alguna cantidad de quesadillas de queso, se crea el registro del pedido en la tabla intermedia entre pedido y comida
		if ($request->quesadillaQueso > $cero) {
			
			Pedido__Comida::create([
				'Pedido_idPedido'=>$idPedido,
				'Comida_idComida'=>'17',
				'cantidad_comida'=>$request->quesadillaQueso,
			]);

			$comida = Comida::find('17');

			$acumuladoValorFactura = $acumuladoValorFactura + ($comida->precio_comida * $request->quesadillaQueso);

			/*$listadoIngredientes = Ingrediente::all();
			foreach ($listadoIngredientes as $ingrediente) {
				if ($ingrediente->nombre_ingrediente == 'Queso mozarella') {
					$ingrediente->cantidad = ($ingrediente->cantidad - 3);
				}
				if ($ingrediente->cantidad_ingrediente <= 5) {
					Notificacion::create([
						'ingrediente'->$ingrediente->nombre_ingrediente

					]);
				}
			}*/
		}

//Si en la pantalla pedidos, se selecciona alguna cantidad de gringas chicharronas, se crea el registro del pedido en la tabla intermedia entre pedido y comida
		if ($request->gringaChicharrona > $cero) {
			
			Pedido__Comida::create([
				'Pedido_idPedido'=>$idPedido,
				'Comida_idComida'=>'18',
				'cantidad_comida'=>$request->gringaChicharrona,
			]);

			$comida = Comida::find('18');

			$acumuladoValorFactura = $acumuladoValorFactura + ($comida->precio_comida * $request->gringaChicharrona);
		}

//Si en la pantalla pedidos, se selecciona alguna cantidad de gringas, se crea el registro del pedido en la tabla intermedia entre pedido y comida
		if ($request->gringa > $cero) {
			
			Pedido__Comida::create([
				'Pedido_idPedido'=>$idPedido,
				'Comida_idComida'=>'19',
				'cantidad_comida'=>$request->gringa,
			]);

			$comida = Comida::find('19');

			$acumuladoValorFactura = $acumuladoValorFactura + ($comida->precio_comida * $request->gringa);
		}

//Si en la pantalla pedidos, se selecciona alguna cantidad de burros albondigon, se crea el registro del pedido en la tabla intermedia entre pedido y comida
		if ($request->burroAlbondigon > $cero) {
			
			Pedido__Comida::create([
				'Pedido_idPedido'=>$idPedido,
				'Comida_idComida'=>'20',
				'cantidad_comida'=>$request->burroAlbondigon,
			]);

			$comida = Comida::find('20');

			$acumuladoValorFactura = $acumuladoValorFactura + ($comida->precio_comida * $request->burroAlbondigon);
		}

//Si en la pantalla pedidos, se selecciona alguna cantidad de burros cuate, se crea el registro del pedido en la tabla intermedia entre pedido y comida
		if ($request->burroCuate > $cero) {
			
			Pedido__Comida::create([
				'Pedido_idPedido'=>$idPedido,
				'Comida_idComida'=>'21',
				'cantidad_comida'=>$request->burroCuate,
			]);

			$comida = Comida::find('21');

			$acumuladoValorFactura = $acumuladoValorFactura + ($comida->precio_comida * $request->burroCuate);
		}

//Si en la pantalla pedidos, se selecciona alguna cantidad de burros festival, se crea el registro del pedido en la tabla intermedia entre pedido y comida
		if ($request->burroFestival > $cero) {
			
			Pedido__Comida::create([
				'Pedido_idPedido'=>$idPedido,
				'Comida_idComida'=>'22',
				'cantidad_comida'=>$request->burroFestival,
			]);

			$comida = Comida::find('22');

			$acumuladoValorFactura = $acumuladoValorFactura + ($comida->precio_comida * $request->burroFestival);
		}

//Si en la pantalla pedidos, se selecciona alguna cantidad de burros norteños, se crea el registro del pedido en la tabla intermedia entre pedido y comida
		if ($request->burroNorteno > $cero) {
			
			Pedido__Comida::create([
				'Pedido_idPedido'=>$idPedido,
				'Comida_idComida'=>'23',
				'cantidad_comida'=>$request->burroNorteno,
			]);

			$comida = Comida::find('23');

			$acumuladoValorFactura = $acumuladoValorFactura + ($comida->precio_comida * $request->burroNorteno);
		}

//Si en la pantalla pedidos, se selecciona alguna cantidad de burros poblanos, se crea el registro del pedido en la tabla intermedia entre pedido y comida
		if ($request->burroPoblano > $cero) {
			
			Pedido__Comida::create([
				'Pedido_idPedido'=>$idPedido,
				'Comida_idComida'=>'24',
				'cantidad_comida'=>$request->burroPoblano,
			]);

			$comida = Comida::find('24');

			$acumuladoValorFactura = $acumuladoValorFactura + ($comida->precio_comida * $request->burroPoblano);
		}

//Si en la pantalla pedidos, se selecciona alguna cantidad de alambre pastor, se crea el registro del pedido en la tabla intermedia entre pedido y comida
		if ($request->alambrePastor > $cero) {
			
			Pedido__Comida::create([
				'Pedido_idPedido'=>$idPedido,
				'Comida_idComida'=>'25',
				'cantidad_comida'=>$request->alambrePastor,
			]);

			$comida = Comida::find('25');

			$acumuladoValorFactura = $acumuladoValorFactura + ($comida->precio_comida * $request->alambrePastor);
		}

//Si en la pantalla pedidos, se selecciona alguna cantidad de nachos pastor, se crea el registro del pedido en la tabla intermedia entre pedido y comida
		if ($request->nachosPastor > $cero) {
			
			Pedido__Comida::create([
				'Pedido_idPedido'=>$idPedido,
				'Comida_idComida'=>'26',
				'cantidad_comida'=>$request->nachosPastor,
			]);

			$comida = Comida::find('26');

			$acumuladoValorFactura = $acumuladoValorFactura + ($comida->precio_comida * $request->nachosPastor);
		}



/*Se verifica si dentro del pedido enviado por el mesero, hay bebidas para crear la tabla intermedia entre el pedido y las bebidas*/

//Si en la pantalla pedidos, se selecciona alguna cantidad de corona, se crea el registro del pedido en la tabla intermedia entre pedido y bebida
		if ($request->corona > $cero) {
			
			Pedido__Bebida::create([
				'Pedido_idPedido'=>$idPedido,
				'Bebida_idBebida'=>'27',
				'cantidad_bebida'=>$request->corona,
			]);

			$bebida = Bebida::find('27');

			$acumuladoValorFactura = $acumuladoValorFactura + ($bebida->precio_bebida * $request->corona);
		}

//Si en la pantalla pedidos, se selecciona alguna cantidad de clubColombia, se crea el registro del pedido en la tabla intermedia entre pedido y bebida
		if ($request->clubColombia > $cero) {
			
			Pedido__Bebida::create([
				'Pedido_idPedido'=>$idPedido,
				'Bebida_idBebida'=>'28',
				'cantidad_bebida'=>$request->clubColombia,
			]);

			$bebida = Bebida::find('28');

			$acumuladoValorFactura = $acumuladoValorFactura + ($bebida->precio_bebida * $request->clubColombia);
		}

//Si en la pantalla pedidos, se selecciona alguna cantidad de agua, se crea el registro del pedido en la tabla intermedia entre pedido y bebida
		if ($request->agua > $cero) {
			
			Pedido__Bebida::create([
				'Pedido_idPedido'=>$idPedido,
				'Bebida_idBebida'=>'43',
				'cantidad_bebida'=>$request->agua,
			]);

			$bebida = Bebida::find('43');

			$acumuladoValorFactura = $acumuladoValorFactura + ($bebida->precio_bebida * $request->agua);
		}

//Si en la pantalla pedidos, se selecciona alguna cantidad de cocaCola, se crea el registro del pedido en la tabla intermedia entre pedido y bebida
		if ($request->cocaCola > $cero) {
			
			Pedido__Bebida::create([
				'Pedido_idPedido'=>$idPedido,
				'Bebida_idBebida'=>'33',
				'cantidad_bebida'=>$request->cocaCola,
			]);

			$bebida = Bebida::find('33');

			$acumuladoValorFactura = $acumuladoValorFactura + ($bebida->precio_bebida * $request->cocaCola);
		}

//Si en la pantalla pedidos, se selecciona alguna cantidad de manzana, se crea el registro del pedido en la tabla intermedia entre pedido y bebida
		if ($request->manzana > $cero) {
			
			Pedido__Bebida::create([
				'Pedido_idPedido'=>$idPedido,
				'Bebida_idBebida'=>'29',
				'cantidad_bebida'=>$request->manzana,
			]);

			$bebida = Bebida::find('29');

			$acumuladoValorFactura = $acumuladoValorFactura + ($bebida->precio_bebida * $request->manzana);
		}

//Si en la pantalla pedidos, se selecciona alguna cantidad de uva, se crea el registro del pedido en la tabla intermedia entre pedido y bebida
		if ($request->uva > $cero) {
			
			Pedido__Bebida::create([
				'Pedido_idPedido'=>$idPedido,
				'Bebida_idBebida'=>'30',
				'cantidad_bebida'=>$request->uva,
			]);

			$bebida = Bebida::find('30');

			$acumuladoValorFactura = $acumuladoValorFactura + ($bebida->precio_bebida * $request->uva);
		}

//Si en la pantalla pedidos, se selecciona alguna cantidad de naranja, se crea el registro del pedido en la tabla intermedia entre pedido y bebida
		if ($request->naranja > $cero) {
			
			Pedido__Bebida::create([
				'Pedido_idPedido'=>$idPedido,
				'Bebida_idBebida'=>'31',
				'cantidad_bebida'=>$request->naranja,
			]);

			$bebida = Bebida::find('31');

			$acumuladoValorFactura = $acumuladoValorFactura + ($bebida->precio_bebida * $request->naranja);
		}

//Si en la pantalla pedidos, se selecciona alguna cantidad de colombiana, se crea el registro del pedido en la tabla intermedia entre pedido y bebida
		if ($request->colombiana > $cero) {
			
			Pedido__Bebida::create([
				'Pedido_idPedido'=>$idPedido,
				'Bebida_idBebida'=>'32',
				'cantidad_bebida'=>$request->colombiana,
			]);

			$bebida = Bebida::find('32');

			$acumuladoValorFactura = $acumuladoValorFactura + ($bebida->precio_bebida * $request->colombiana);
		}

//Si en la pantalla pedidos, se selecciona alguna cantidad de hitMora, se crea el registro del pedido en la tabla intermedia entre pedido y bebida
		if ($request->hitMora > $cero) {
			
			Pedido__Bebida::create([
				'Pedido_idPedido'=>$idPedido,
				'Bebida_idBebida'=>'34',
				'cantidad_bebida'=>$request->hitMora,
			]);

			$bebida = Bebida::find('34');

			$acumuladoValorFactura = $acumuladoValorFactura + ($bebida->precio_bebida * $request->hitMora);
		}

//Si en la pantalla pedidos, se selecciona alguna cantidad de hitNaranja, se crea el registro del pedido en la tabla intermedia entre pedido y bebida
		if ($request->hitNaranja > $cero) {
			
			Pedido__Bebida::create([
				'Pedido_idPedido'=>$idPedido,
				'Bebida_idBebida'=>'35',
				'cantidad_bebida'=>$request->hitNaranja,
			]);

			$bebida = Bebida::find('35');

			$acumuladoValorFactura = $acumuladoValorFactura + ($bebida->precio_bebida * $request->hitNaranja);
		}

//Si en la pantalla pedidos, se selecciona alguna cantidad de hitLulo, se crea el registro del pedido en la tabla intermedia entre pedido y bebida
		if ($request->hitLulo > $cero) {
			
			Pedido__Bebida::create([
				'Pedido_idPedido'=>$idPedido,
				'Bebida_idBebida'=>'36',
				'cantidad_bebida'=>$request->hitLulo,
			]);

			$bebida = Bebida::find('36');

			$acumuladoValorFactura = $acumuladoValorFactura + ($bebida->precio_bebida * $request->hitLulo);
		}

//Si en la pantalla pedidos, se selecciona alguna cantidad de hitFrutasTropicales, se crea el registro del pedido en la tabla intermedia entre pedido y bebida
		if ($request->hitFrutasTropicales > $cero) {
			
			Pedido__Bebida::create([
				'Pedido_idPedido'=>$idPedido,
				'Bebida_idBebida'=>'38',
				'cantidad_bebida'=>$request->hitFrutasTropicales,
			]);

			$bebida = Bebida::find('38');

			$acumuladoValorFactura = $acumuladoValorFactura + ($bebida->precio_bebida * $request->hitFrutasTropicales);
		}

//Si en la pantalla pedidos, se selecciona alguna cantidad de hitMango, se crea el registro del pedido en la tabla intermedia entre pedido y bebida
		if ($request->hitMango > $cero) {
			
			Pedido__Bebida::create([
				'Pedido_idPedido'=>$idPedido,
				'Bebida_idBebida'=>'37',
				'cantidad_bebida'=>$request->hitMango,
			]);

			$bebida = Bebida::find('37');

			$acumuladoValorFactura = $acumuladoValorFactura + ($bebida->precio_bebida * $request->hitMango);
		}

//Si en la pantalla pedidos, se selecciona alguna cantidad de maracuya, se crea el registro del pedido en la tabla intermedia entre pedido y bebida
		if ($request->maracuya > $cero) {
			
			Pedido__Bebida::create([
				'Pedido_idPedido'=>$idPedido,
				'Bebida_idBebida'=>'41',
				'cantidad_bebida'=>$request->maracuya,
			]);

			$bebida = Bebida::find('41');

			$acumuladoValorFactura = $acumuladoValorFactura + ($bebida->precio_bebida * $request->maracuya);
		}

//Si en la pantalla pedidos, se selecciona alguna cantidad de tamarindo, se crea el registro del pedido en la tabla intermedia entre pedido y bebida
		if ($request->tamarindo > $cero) {
			
			Pedido__Bebida::create([
				'Pedido_idPedido'=>$idPedido,
				'Bebida_idBebida'=>'40',
				'cantidad_bebida'=>$request->tamarindo,
			]);

			$bebida = Bebida::find('40');

			$acumuladoValorFactura = $acumuladoValorFactura + ($bebida->precio_bebida * $request->tamarindo);
		}

//Si en la pantalla pedidos, se selecciona alguna cantidad de jamaica, se crea el registro del pedido en la tabla intermedia entre pedido y bebida
		if ($request->jamaica > $cero) {
			
			Pedido__Bebida::create([
				'Pedido_idPedido'=>$idPedido,
				'Bebida_idBebida'=>'42',
				'cantidad_bebida'=>$request->jamaica,
			]);

			$bebida = Bebida::find('42');

			$acumuladoValorFactura = $acumuladoValorFactura + ($bebida->precio_bebida * $request->jamaica);
		}

//Si en la pantalla pedidos, se selecciona alguna cantidad de horchata, se crea el registro del pedido en la tabla intermedia entre pedido y bebida
		if ($request->horchata > $cero) {
			
			Pedido__Bebida::create([
				'Pedido_idPedido'=>$idPedido,
				'Bebida_idBebida'=>'39',
				'cantidad_bebida'=>$request->horchata,
			]);

			$bebida = Bebida::find('39');

			$acumuladoValorFactura = $acumuladoValorFactura + ($bebida->precio_bebida * $request->horchata);
		}

		
//Cuando se termine de verificar el contenido del pedido, se crea la factura para el pedido

		Factura::create([

			'valor_cuenta'=>$acumuladoValorFactura,
			'Pedido_idPedido'=>$idPedido,

		]);

//Cuando se termine de verificar el contenido del pedido y crear la facura, se redirecciona a la misma página
		return view('inicioPedidos');

	}

}

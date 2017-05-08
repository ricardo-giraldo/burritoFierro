@extends('layouts.plantillaInicioPedidos')

@section('opciones')
	<section id="opciones">
		<h3>Por favor seleccione una mesa</h3>
		<div class="contenedor">

		{!!Form::open(['route'=>'inicioPedidos.areaPedidos.crearPedido', 'method'=>'POST'])!!}

			{!!Form::select('mesa', ['3' => 'Mesa número 1', '4' => 'Mesa número 2', '5' => 'Mesa número 3', '6' => 'Mesa número 4', '7' => 'Mesa número 5', '8' => 'Mesa número 6', '9' => 'Barra' ])!!}
			</div>
	</section>
	
@endsection


@section('comidas')
	<section id="comidas">
		
	
			<h3>Seleccione las Comidas para realizar el pedido</h3>
			<div class="contenedor">
				<div id="opciones">
					<img src="/imagenesPlatos/tacoFierro.jpg">
					<h4>Taco fierro</h4>
					{!!Form::select('tacoFierro', ['0' => '0','1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9' ])!!}
				</div>
				<div id="opciones">
					<img src="/imagenesPlatos/tacoMorello.jpg">
					<h4>Taco morelo</h4>
					{!!Form::select('tacoMorelo', ['0' => '0','1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9' ])!!}
				</div>
				<div id="opciones">
					<img src="/imagenesPlatos/tacoPastor.jpg">
					<h4>Taco pastor</h4>
					{!!Form::select('tacoPastor', ['0' => '0','1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9' ])!!}
				</div>
				<div id="opciones">
					<img src="/imagenesPlatos/quesadillaArequipe.jpg">
					<h4>Quesadilla de arequipe</h4>
					{!!Form::select('quesadillaArequipe', ['0' => '0','1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9' ])!!}
				</div>
				<div id="opciones">
					<img src="/imagenesPlatos/quesadillaChampinones.jpg">
					<h4>Quesadilla de champi&ntilde;ones</h4>
					{!!Form::select('quesadillaChampinon', ['0' => '0','1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9' ])!!}
				</div>
				<div id="opciones">
					<img src="/imagenesPlatos/quesadillaJamon.jpg">
					<h4>Quesadilla de jamon</h4>
					{!!Form::select('quesadillaJamon', ['0' => '0','1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9' ])!!}
				</div>
				<div id="opciones">
					<img src="/imagenesPlatos/quesadillaPina.jpg">
					<h4>Quesadilla de pi&ntilde;a</h4>
					{!!Form::select('quesadillaPina', ['0' => '0','1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9' ])!!}
				</div>
				<div id="opciones">
					<img src="/imagenesPlatos/quesadillaQueso.jpg">
					<h4>Quesadilla de queso</h4>
					{!!Form::select('quesadillaQueso', ['0' => '0','1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9' ])!!}
				</div>
				<div id="opciones">
					<img src="/imagenesPlatos/gringaChicarrona.jpg">
					<h4>Gringa chicharrona</h4>
					{!!Form::select('gringaChicharrona', ['0' => '0','1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9' ])!!}
				</div>
				<div id="opciones">
					<img src="/imagenesPlatos/gringa.jpg">
					<h4>Gringa</h4>
					{!!Form::select('gringa', ['0' => '0','1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9' ])!!}
				</div>
				<div id="opciones">
					<img src="/imagenesPlatos/burroAlbondigon.jpg">
					<h4>Burro albondigon</h4>
					{!!Form::select('burroAlbondigon', ['0' => '0','1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9' ])!!}
				</div>
				<div id="opciones">
					<img src="/imagenesPlatos/burroCuate.jpg">
					<h4>Burro cuate</h4>
					{!!Form::select('burroCuate', ['0' => '0','1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9' ])!!}
				</div>
				<div id="opciones">
					<img src="/imagenesPlatos/burroFestival.jpg">
					<h4>Burro festival</h4>
					{!!Form::select('burroFestival', ['0' => '0','1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9' ])!!}
				</div>
				<div id="opciones">
					<img src="/imagenesPlatos/burroNorteno.jpg">
					<h4>Burro norte&ntilde;o</h4>
					{!!Form::select('burroNorteno', ['0' => '0','1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9' ])!!}
				</div>
				<div id="opciones">
					<img src="/imagenesPlatos/burroPoblano.jpg">
					<h4>Burro poblano</h4>
					{!!Form::select('burroPoblano', ['0' => '0','1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9' ])!!}
				</div>
				<div id="opciones">
					<img src="/imagenesPlatos/alambrePastor.jpg">
					<h4>Alambre al pastor</h4>
					{!!Form::select('alambrePastor', ['0' => '0','1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9' ])!!}
				</div>
				<div id="opciones">
					<img src="/imagenesPlatos/nachosPastor.jpg">
					<h4>Nachos al pastor</h4>
					{!!Form::select('nachosPastor', ['0' => '0','1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9' ])!!}
				</div>
			</div>
			</section>
@endsection


@section('bebidas')
<section id="pedidosBebidas">
		<h3>Seleccione las Bebidas para realizar el pedido</h3>
			<div class="contenedor">
			
				<div id="opciones">
					<img src="/imagenesBebidas/cervezaCorona.jpg">
					<h4>Corona</h4>
					{!!Form::select('corona', ['0' => '0','1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9' ])!!}
				</div>
				<div id="opciones">
					<img src="/imagenesBebidas/cervezaClubColombia.jpg">
					<h4>Club Colombia</h4>
					{!!Form::select('clubColombia', ['0' => '0','1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9' ])!!}
				</div>
				<div id="opciones">
					<img src="/imagenesBebidas/botellaAgua.png">
					<h4>Agua</h4>
					{!!Form::select('agua', ['0' => '0','1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9' ])!!}
				</div>
				<div id="opciones">
					<img src="/imagenesBebidas/gaseosaCocaCola.png">
					<h4>Coca Cola</h4>
					{!!Form::select('cocaCola', ['0' => '0','1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9' ])!!}
				</div>
				<div id="opciones">
					<img src="/imagenesBebidas/postobon.png">
					<h4>Manzana</h4>
					{!!Form::select('manzana', ['0' => '0','1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9' ])!!}
				</div>
				<div id="opciones">
					<img src="/imagenesBebidas/postobon.png">
					<h4>Uva</h4>
					{!!Form::select('uva', ['0' => '0','1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9' ])!!}
				</div>
				<div id="opciones">
					<img src="/imagenesBebidas/postobon.png">
					<h4>Naranja</h4>
					{!!Form::select('naranja', ['0' => '0','1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9' ])!!}
				</div>
				<div id="opciones">
					<img src="/imagenesBebidas/postobon.png">
					<h4>Colombiana</h4>
					{!!Form::select('colombiana', ['0' => '0','1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9' ])!!}
				</div>
				<div id="opciones">
					<img src="/imagenesBebidas/hit.png">
					<h4>Hit mora</h4>
					{!!Form::select('hitMora', ['0' => '0','1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9' ])!!}
				</div>
				<div id="opciones">
					<img src="/imagenesBebidas/hit.png">
					<h4>Hit naranja-pi&ntilde;a</h4>
					{!!Form::select('hitNaranja', ['0' => '0','1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9' ])!!}
				</div>
				<div id="opciones">
					<img src="/imagenesBebidas/hit.png">
					<h4>Hit lulo</h4>
					{!!Form::select('hitLulo', ['0' => '0','1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9' ])!!}
				</div>
				<div id="opciones">
					<img src="/imagenesBebidas/hit.png">
					<h4>Hit frutas tropicales</h4>
					{!!Form::select('hitFrutasTropicales', ['0' => '0','1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9' ])!!}
				</div>
				<div id="opciones">
					<img src="/imagenesBebidas/hit.png">
					<h4>Hit mango</h4>
					{!!Form::select('hitMango', ['0' => '0','1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9' ])!!}
				</div>
				<div id="opciones">
					<img src="/imagenesBebidas/hit.png">
					<h4>Maracuy&aacute;</h4>
					{!!Form::select('maracuya', ['0' => '0','1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9' ])!!}
				</div>
				<div id="opciones">
					<img src="/imagenesBebidas/hit.png">
					<h4>Tamarindo</h4>
					{!!Form::select('tamarindo', ['0' => '0','1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9' ])!!}
				</div>
				<div id="opciones">
					<img src="/imagenesBebidas/hit.png">
					<h4>Jamaica</h4>
					{!!Form::select('jamaica', ['0' => '0','1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9' ])!!}
				</div>
				<div id="opciones">
					<img src="/imagenesBebidas/hit.png">
					<h4>Horchata</h4>
					{!!Form::select('horchata', ['0' => '0','1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9' ])!!}
				</div>
			</div>
</section>
@endsection

@section('terminarPedido')
	<section id="terminarPedido">
		<h3>Si ya termin&oacute; de tomar el pedido, por favor m&aacute;rquelo como Realizado</h3>
		{!!Form::submit('Terminar pedido')!!}

	{!!Form::close()!!}
</section>
@endsection
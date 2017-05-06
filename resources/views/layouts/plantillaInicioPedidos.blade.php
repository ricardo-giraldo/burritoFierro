<!DOCTYPE html>
<html>

<head>

	<title>Realizar pedidos</title>
	
	{!!Html::style('/css/fontello.css')!!}
	{!!Html::style('/css/estilosInicioPedidos.css')!!}

</head>

<body>
	<header>
		<div class="contenedor">
			<h1 class="icon-comida">El Burrito Fierro</h1>
			<input type="checkbox" id="menu-bar">
			<label class="icon-menu" for="menu-bar"></label>
			<nav class="menu">
				<a href="#opciones" onclick="clicPantallaInicio()">Inicio</a>
				<a href="#pedidosComidas" onclick="clicPantallaComidas()">Comidas</a>
				<a href="#pedidosBebidas" onclick="clicPantallaBebidas()">Bebidas</a>
				<a href="#terminarPedido" onclick="clicTerminarPedido()">Terminar pedido</a>
				<a href="/cierreSesion" onclick="clicCerrarSesion()">Salir</a>
			</nav>
		</div>
	</header>

	<main>
		<section id="banner">
			<img src="/imagenes/encabezadoC.jpg">
			<div class="contenedor">
				<h2>Realizar pedidos</h2>
			</div>
		</section>

	@yield('opciones')

	@yield('comidas')

	@yield('bebidas')

	@yield('terminarPedido')

	</main>

</body>
</html>
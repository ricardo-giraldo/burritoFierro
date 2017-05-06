<!DOCTYPE html>
<html>
<head>
	<title>Administrador</title>

	{!!Html::style('/css/estilosInicioAdministracion.css')!!}
	{!!Html::style('/css/fontello.css')!!}

	<script type="text/javascript">
		
		function clicPantallaPedidos(){

			document.getElementById('pantallaPedidos').style.display = 'block';
			document.getElementById('pantallaInventario').style.display = 'none';
			document.getElementById('pantallaReportes').style.display = 'none';
			document.getElementById('pantallaNotificaciones').style.display = 'none';

		}

		function clicPantallaInventario(){

			document.getElementById('pantallaPedidos').style.display = 'none';
			document.getElementById('pantallaInventario').style.display = 'block';
			document.getElementById('pantallaReportes').style.display = 'none';
			document.getElementById('pantallaNotificaciones').style.display = 'none';

		}

		function clicPantallaReportes(){

			document.getElementById('pantallaPedidos').style.display = 'none';
			document.getElementById('pantallaInventario').style.display = 'none';
			document.getElementById('pantallaReportes').style.display = 'block';
			document.getElementById('pantallaNotificaciones').style.display = 'none';

		}

		function clicPantallaNotificaciones(){

			document.getElementById('pantallaPedidos').style.display = 'none';
			document.getElementById('pantallaInventario').style.display = 'none';
			document.getElementById('pantallaReportes').style.display = 'none';
			document.getElementById('pantallaNotificaciones').style.display = 'block';

		}

	</script>

</head>
<body>
	<header>
		<div class="contenedor">
			<h1 class="icon-comida">El Burrito Fierro</h1>
			<input type="checkbox" id="menu-bar">
			<label class="icon-menu" for="menu-bar"></label>
			<!--Menú de opciones disponibles para el administrador-->
			<nav class="menu">
				<a href="#" onclick="clicPantallaPedidos()">Pedidos</a>
				<a href="administrador/retornarIngredientes" onclick="clicPantallaInventario()">Inventario</a>
				<a href="#" onclick="clicPantallaReportes()">Reportes</a>
				<a href="#" onclick="clicPantallaNotificaciones()">Notificaciones</a>
				<a href="/cierreSesion" onclick="clicSalir()">Salir</a>
			</nav>
		</div>
	</header>

	<main>

		<!--Sección que contiene la pantalla que muestra los pedidos-->	
		<section class="pantallaPedidos">
			
			<div id="general"> 
				<div id="mesa1">
					<label>Mesa 1</label>
					<input type="submit" id="terminarPedidoMesa1" value="Terminar pedido">
				</div>
				<div id="mesa2">
					<label>Mesa 2</label>
					<input type="submit" id="terminarPedidoMesa2" value="Terminar pedido">
				</div>
				<div id="mesa3">
					<label>Mesa 3</label>
					<input type="submit" id="terminarPedidoMesa3" value="Terminar pedido">
				</div>
				<div id="mesa4">
					<label>Mesa 4</label>
					<input type="submit" id="terminarPedidoMesa4" value="Terminar pedido">
				</div>
				<div id="mesa5">
					<label>Mesa 5</label>
					<input type="submit" id="terminarPedidoMesa6" value="Terminar pedido">
				</div>
				<div id="mesa6">
					<label>Mesa 6</label>
					<input type="submit" id="terminarPedidoMesa6" value="Terminar pedido">
				</div>
				<div id="mesa7">
					<label>Barra</label>
					<input type="submit" id="terminarPedidoBarra" value="Terminar pedido">
				</div>
			</div>


		</section>
		
		

		<!--Sección que contiene la pantalla de manejo de inventario-->
		<section class="pantallaInventario">
			
			<div class="contenedorOpcionesInventario">

				<table class="tablaIngredientes">
					<thead>
						<th>Ingrediente</th>
						<th>Cantidad</th>
						<th>Opci&oacute;n</th>
					</thead>

					@foreach($listadoIngredientes as $ingrediente)
						<tbody>
							<td>{{$ingrediente->nombre_ingrediente}}</td>
							<td>{{$ingrediente->cantidad}}</td>
							<td>
								{!!link_to_action('ControladorAdministracion@editarIngrediente', $title = 'Editar', $parameters = [$ingrediente])!!}
							</td>
						</tbody>
					@endforeach
						
				</table>

			</div>

		</section>

	</main>

</body>
</html>

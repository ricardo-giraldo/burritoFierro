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
		@yield('pantallaPedidos')

		<!--Sección que contiene la pantalla de manejo de inventario-->
		@yield('pantallaInventario')

		<!--Seccion que contiene la pantalla de generación de reportes-->
		@yield('pantallaReportes')

		<!--Seccion que contiene la pantalla de notifiaciones-->
		@yield('pantallaNotificaciones')

		<!--Seccion que contiene la pantalla para editar ingredientes-->
		@yield('pantallaEditarIngrediente')

	</main>

</body>
</html>
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

	<style>
		table {
		    border-collapse: collapse;
		    width: 100%;
		}

		th, td {
		    text-align: left;
		    padding: 8px;
		}

		tr:nth-child(even){background-color: #f2f2f2}

		th {
		    background-color: #D5EA06;
		    color: black;
		}
	</style>

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
				<a href="#" onclick="clicPantallaInventario()">Inventario</a>
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
					<label id="mesa">Mesa 1</label>
					<table style="text-align: left;">
						<thead>
							<th>Comida</th>
							<th>Cantidad</th>
						</thead>
						<tbody>
							@foreach($pedidoComidaM1 as $pedido)
							<tr>
								<td>
									{{$pedido['nombre_comida']}}
								</td>
								<td>
									{{$pedido['cantidad_comida']}}
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					<table style="text-align: left;">
						<thead>
							<th>Bebida</th>
							<th>Cantidad</th>
						</thead>
						<tbody>
							@foreach($pedidoBebidaM1 as $pedido)
							<tr>
								<td>
									{{$pedido['nombre_bebida']}}
								</td>
								<td>
									{{$pedido['cantidad_bebida']}}
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					<input type="submit" id="terminarPedidoMesa1" value="Terminar pedido">
				</div>
				<div id="mesa2">
					<label id="mesa">Mesa 2</label>
					<table style="text-align: left;">
						<thead>
							<th>Comida</th>
							<th>Cantidad</th>
						</thead>
						<tbody>
							@foreach($pedidoComidaM2 as $pedido)
							<tr>
								<td>
									{{$pedido['nombre_comida']}}
								</td>
								<td>
									{{$pedido['cantidad_comida']}}
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					<table style="text-align: left;">
						<thead>
							<th>Bebida</th>
							<th>Cantidad</th>
						</thead>
						<tbody>
							@foreach($pedidoBebidaM2 as $pedido)
							<tr>
								<td>
									{{$pedido['nombre_bebida']}}
								</td>
								<td>
									{{$pedido['cantidad_bebida']}}
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					<input type="submit" id="terminarPedidoMesa2" value="Terminar pedido">
				</div>
				<div id="mesa3">
					<label id="mesa">Mesa 3</label>
					<table style="text-align: left;">
						<thead>
							<th>Comida</th>
							<th>Cantidad</th>
						</thead>
						<tbody>
							@foreach($pedidoComidaM3 as $pedido)
							<tr>
								<td>
									{{$pedido['nombre_comida']}}
								</td>
								<td>
									{{$pedido['cantidad_comida']}}
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					<table style="text-align: left;">
						<thead>
							<th>Bebida</th>
							<th>Cantidad</th>
						</thead>
						<tbody>
							@foreach($pedidoBebidaM3 as $pedido)
							<tr>
								<td>
									{{$pedido['nombre_bebida']}}
								</td>
								<td>
									{{$pedido['cantidad_bebida']}}
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					<input type="submit" id="terminarPedidoMesa3" value="Terminar pedido">
				</div>
				<div id="mesa4">
					<label id="mesa">Mesa 4</label>
					<table style="text-align: left;">
						<thead>
							<th>Comida</th>
							<th>Cantidad</th>
						</thead>
						<tbody>
							@foreach($pedidoComidaM4 as $pedido)
							<tr>
								<td>
									{{$pedido['nombre_comida']}}
								</td>
								<td>
									{{$pedido['cantidad_comida']}}
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					<table style="text-align: left;">
						<thead>
							<th>Bebida</th>
							<th>Cantidad</th>
						</thead>
						<tbody>
							@foreach($pedidoBebidaM4 as $pedido)
							<tr>
								<td>
									{{$pedido['nombre_bebida']}}
								</td>
								<td>
									{{$pedido['cantidad_bebida']}}
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					<input type="submit" id="terminarPedidoMesa4" value="Terminar pedido">
				</div>
				<div id="mesa5">
					<label id="mesa">Mesa 5</label>
					<table style="text-align: left;">
						<thead>
							<th>Comida</th>
							<th>Cantidad</th>
						</thead>
						<tbody>
							@foreach($pedidoComidaM5 as $pedido)
							<tr>
								<td>
									{{$pedido['nombre_comida']}}
								</td>
								<td>
									{{$pedido['cantidad_comida']}}
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					<table style="text-align: left;">
						<thead>
							<th>Bebida</th>
							<th>Cantidad</th>
						</thead>
						<tbody>
							@foreach($pedidoBebidaM5 as $pedido)
							<tr>
								<td>
									{{$pedido['nombre_bebida']}}
								</td>
								<td>
									{{$pedido['cantidad_bebida']}}
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					<input type="submit" id="terminarPedidoMesa6" value="Terminar pedido">
				</div>
				<div id="mesa6">
					<label id="mesa">Mesa 6</label>
					<table style="text-align: left;">
						<thead>
							<th>Comida</th>
							<th>Cantidad</th>
						</thead>
						<tbody>
							@foreach($pedidoComidaM6 as $pedido)
							<tr>
								<td>
									{{$pedido['nombre_comida']}}
								</td>
								<td>
									{{$pedido['cantidad_comida']}}
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					<table style="text-align: left;">
						<thead>
							<th>Bebida</th>
							<th>Cantidad</th>
						</thead>
						<tbody>
							@foreach($pedidoBebidaM6 as $pedido)
							<tr>
								<td>
									{{$pedido['nombre_bebida']}}
								</td>
								<td>
									{{$pedido['cantidad_bebida']}}
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					<input type="submit" id="terminarPedidoMesa6" value="Terminar pedido">
				</div>
				<div id="mesa7">
					<label id="mesa">Barra</label>
					<table style="text-align: left;">
						<thead>
							<th>Comida</th>
							<th>Cantidad</th>
						</thead>
						<tbody>
							@foreach($pedidoComidaM7 as $pedido)
							<tr>
								<td>
									{{$pedido['nombre_comida']}}
								</td>
								<td>
									{{$pedido['cantidad_comida']}}
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					<table style="text-align: left;">
						<thead>
							<th>Bebida</th>
							<th>Cantidad</th>
						</thead>
						<tbody>
							@foreach($pedidoBebidaM7 as $pedido)
							<tr>
								<td>
									{{$pedido['nombre_bebida']}}
								</td>
								<td>
									{{$pedido['cantidad_bebida']}}
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					<input type="submit" id="terminarPedidoBarra" value="Terminar pedido">
				</div>
			</div>


		</section>
		
		

		<!--Sección que contiene la pantalla de manejo de inventario-->
		<section class="pantallaInventario">
			
			<div id="contenedorOpcionesInventario">
				</br>
				</br>
				<center><h2>Espacio para el seguimiento y gesti&oacute;n de inventario</h2></center>
				</br>

				<table class="tablaIngredientes">
					<thead>
						<th>Ingrediente</th>
						<th>Cantidad</th>
						<th>Opci&oacute;n</th>
					</thead>

					@foreach($listadoIngredientes as $ingrediente)
						<tbody>
							<tr>
								<td>{{$ingrediente->nombre_ingrediente}}</td>
								<td>{{$ingrediente->cantidad}}</td>
								<td>
									<a href="editarIngrediente/{{$ingrediente->idIngrediente}}" class="btn btn-warning">Editar</a>
								</td>
							</tr>
						</tbody>
					@endforeach
						
				</table>

			</div>

		</section>

		<section class="pantallaReportes">

			</br>
			</br>
			<center><h2>Espacio para la generaci&oacute;n de Reportes</h2></center>

			{!!Form::open(['route'=>'inicioAdministracion.retornarIngredientes.generarReporte', 'method'=>'POST'])!!}
				
				<table class="tablaReportes">
					<thead>
						<th>Reportes</th>
					</thead>

					@foreach($listadoReportes as $reporte)
						<tbody>
							<td>{{$reporte}}</td>
						</tbody>
					@endforeach
						
				</table>
				{!!Form::submit('Actualizar reportes')!!}
				
			{!!Form::close()!!}
			
		</section>

		<section class="pantallaNotificaciones">
			
		</section>

	</main>

</body>
</html>

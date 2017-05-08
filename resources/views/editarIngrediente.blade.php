@extends('layouts.plantillaInicioAdministracion')

@section('pantallaEditarIngrediente')
</br>
</br>
</br>
</br>
<center>
<div  style="background: #E48B0D; margin: 10px; padding: 10px; border-radius: 10px; height: 200px; width: 600px;">
	{!!Form::model($ingrediente, ['route' => ['inicioAdministracion.actualizarIngrediente', $ingrediente->idIngrediente],'method'=>'PUT'])!!}

			<h2>Editar la cantidad de un ingrediente</h2>
			<br>
			<table>
				<tr class="form-group">
					<td>
						{!!Form::label('Ingrediente:')!!}
					</td>
					<td>
						{!!Form::text('nombre_ingrediente',null,['class'=>'form-control'])!!}
					</td>
				</tr>
				<tr class="form-group">
					<td>
						{!!Form::label('Cantidad:')!!}
					</td>
					<td>
						{!!Form::text('cantidad',null,['class'=>'form-control'])!!}
					</td>
				</tr>
			</table>
			<br>
			{!!Form::submit('Editar',['class'=>'btn btn-primary'])!!}

	{!!Form::close()!!}
</div>
	
</center>

	

@endsection
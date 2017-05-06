@extends('layouts.plantillaInicioAdministracion')

@section('pantallaReportes')

	{!!Form::model($ingrediente, ['route' => ['inicioAdministracion/actualizarIngrediente', $ingrediente]])!!}

			<h2>Espacio para la generaci&oacute;n de Reportes</h2>

			<div class="form-group">
				{!!Form::label('Seleccione un tipo de reporte:')!!}
				{!!Form::text('nombre_ingrediente',null,['class'=>'form-control'])!!}
			</div>

			{!!Form::submit('Generar reporte',['class'=>'btn btn-primary'])!!}

	{!!Form::close()!!}


@endsection
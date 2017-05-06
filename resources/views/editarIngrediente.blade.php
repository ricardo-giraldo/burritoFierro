@extends('layouts.plantillaInicioAdministracion')

@section('pantallaEditarIngrediente')

	{!!Form::model($ingrediente, ['route' => ['inicioAdministracion/actualizarIngrediente', $ingrediente]])!!}

			<h2>Editar la cantidad de un ingrediente</h2>

			<div class="form-group">
				{!!Form::label('Ingrediente:')!!}
				{!!Form::text('nombre_ingrediente',null,['class'=>'form-control'])!!}
			</div>

			<div class="form-group">
				{!!Form::label('Cantidad:')!!}
				{!!Form::text('cantidad',null,['class'=>'form-control'])!!}
			</div>

			{!!Form::submit('Editar',['class'=>'btn btn-primary'])!!}

	{!!Form::close()!!}

@endsection
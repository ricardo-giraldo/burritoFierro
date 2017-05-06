
@extends('layouts.plantillaInicioSesion')

@section('fomularioInicio')

	{!!Form::open(['route'=>'inicioSesion.store', 'method'=>'POST'])!!}

			<h2>Iniciar sesi&oacute;n en el Burrito Fierro</h2>

			<div class="form-group">
				{!!Form::text('email',null,['class'=>'form-control', 'placeholder'=>'Ingrese su correo'])!!}
				
			</div>
			<div class="form-group">
				{!!Form::password('password',['class'=>'form-control', 'placeholder'=>'Ingrese su contrasenia'])!!}
			</div>
			{!!Form::submit('Iniciar sesion',['class'=>'btn btn-primary'])!!}

	{!!Form::close()!!}
	

@endsection


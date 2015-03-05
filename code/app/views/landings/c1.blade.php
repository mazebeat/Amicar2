@extends('layouts.landing.cliente.master')

@section('title')
	Landing Cliente
@endsection

@section('text-style')
	<style>
		.lead-big {
			font-size: 24px;
			line-height: 24px;
		}

		.logo {
			margin-top: 10px;
		}

		.main {
			background: rgba(0, 0, 0, 0.6);
			padding: 10px;
		}

		.col-centered {
			float: none;
			margin: 0 auto;
		}
	</style>
@endsection

@section('content')
	@if(isset($messages))
		{{ HTML::ul($messages) }}
	@endif
	<h1 class="cover-heading">Estimado cliente.</h1>
	{{ Form::model($cliente, array('route' => array('clientes.update', $cliente->idCliente), 'method' => 'PUT', 'class' => 'form-inline lead-big', 'role' => 'form')) }}
	<p class="lead">
		Para poder facilitar el contacto por favor confirma o actualiza los siguientes datos:

	<div class="form-group">
		{{ Form::label('nombreCliente', 'Nombre:') }}
		{{ Form::text('nombreCliente', Input::old('nombreCliente'), array('placeholder' => '...', 'required')) }}
		{{ $errors->first('nombreCliente') }}
	</div>
	<div class="form-group">
		{{ Form::label('apellidoCliente', 'Apellidos:') }}
		{{ Form::text('apellidoCliente', Input::old('apellidoCliente'), array('placeholder' => '...', 'required')) }}
		{{ $errors->first('apellidoCliente') }}
	</div>
	<div class="form-group">
		{{ Form::label('fonoCliente', 'Celular:') }}
		{{ Form::input('tel', 'fonoCliente', Input::old('fonoCliente'), array('placeholder' => '+56 9 999 9999')) }}
		{{ $errors->first('fonoCliente') }}
	</div>
	<span class="hidden-xs"><br></span>
	<div class="form-group">
		{{ Form::label('emailCliente', 'Email:') }}
		{{ Form::email('emailCliente', Input::old('emailCliente'), array('placeholder' => 'cliente@email.cl')) }}
		{{ $errors->first('emailCliente') }}
	</div>
	</p>

	<p class="lead">
		<button type="submit" class="btn btn-lg btn-primary">Enviar Datos</button>
	</p>
	</form>
	{{ Form::close() }}
@endsection

@section('text-script')
@endsection

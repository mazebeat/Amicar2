@extends('layouts.landing.ejecutivo.master')

@section('title')
@endsection

@section('text-style')
	<style>
		.logo {
			margin-top: 10px;
		}

		.main {
			background: rgba(0, 0, 0, 0.6);
			padding: 10px;
		}

		.form-inline #locate {
			font-size: 20px;
		}

		.form-inline #locate option {
			color: #000;
			background: rgb(255, 255, 255);
			padding: 5px;
			font-size: 14px;
		}

		.col-centered {
			float: none;
			margin: 0 auto;
		}
	</style>
@endsection

@section('content')
	<h1 class="cover-heading">Estimado Ejecutivo</h1>

	{{ Form::model($ejecutivo, array('route' => array('ejecutivos.update', $ejecutivo->idEjecutivo), 'method' => 'PUT', 'class' => 'form-inline lead-big', 'role' => 'form')) }}
	<p class="lead">
		Te pedimos que por favor actualices la información respecto al local de atención en el que actualmente te encuentras.

	<div class="form-group">
		<label for="locales_idLocal1"> Local Actual:</label>
		{{ Form::select('locales_idLocal1', $locales, Input::old('locales_idLocal1', $ejecutivo->locales_idLocal1), array('id' => 'locales_idLocal1')) }}
	</div>
	</p>
	<p class="lead">
		<button type="submit" class="btn btn-lg btn-primary">Enviar Actualización</button>
	</p>
	{{ Form::close() }}
@endsection

@section('text-script')
@endsection
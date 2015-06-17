{{ Form::model($cliente, array('route' => array('clientes.update', $cliente->idCliente), 'method' => 'PUT', 'class' => '', 'role' => 'form')) }}
<div class="form-group">
	{{ Form::label('nombreCliente', 'Nombre:') }}
	{{ Form::text('nombreCliente', Input::old('nombreCliente'), array('placeholder' => '...', 'required', 'class' => 'form-control', 'readonly')) }}
	<span class="text-error">{{ $errors->first('nombreCliente') }}</span>
</div>

<div class="form-group">
	{{ Form::label('fonoCelular', 'Tel. Celular:') }}
	{{ Form::input('tel', 'fonoCelular', Input::old('fonoCelular'), array('placeholder' => '...', 'class' => 'form-control', 'maxlength' => '20')) }}
	<span class="text-error">{{ $errors->first('fonoCelular') }}</span>
</div>

<div class="form-group">
	{{ Form::label('fonoComercial', 'Tel. Comercial:') }}
	{{ Form::input('tel', 'fonoComercial', Input::old('fonoComercial'), array('placeholder' => '...', 'class' => 'form-control', 'maxlength' => '20')) }}
	<span class="text-error">{{ $errors->first('fonoComercial') }}</span>
</div>

<div class="form-group">
	{{ Form::label('fonoParticular', 'Tel. Particular:') }}
	{{ Form::input('tel', 'fonoParticular', Input::old('fonoParticular'), array('placeholder' => '...', 'class' => 'form-control', 'maxlength' => '20')) }}
	<span class="text-error">{{ $errors->first('fonoParticular') }}</span>
</div>

<div class="form-group">
	{{ Form::label('emailCliente', 'Email:') }}
	{{ Form::email('emailCliente', Input::old('emailCliente'), array('placeholder' => '...', 'required', 'class' => 'form-control')) }}
	<span class="text-error">{{ $errors->first('emailCliente') }}</span>
</div>

{{ Form::hidden('proceso', $proceso)  }}{{ Form::hidden('id', $id)  }}

<button type="submit" class="btn btn-block aa">Enviar Datos</button>{{ Form::close() }}
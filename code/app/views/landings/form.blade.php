{{ Form::model($cliente, array('route' => array('clientes.update', $cliente->idCliente), 'method' => 'PUT', 'class' => '', 'role' => 'form')) }}

<div class="form-group">
	{{ Form::label('nombreCliente', 'Nombre:') }}
	{{ Form::text('nombreCliente', Input::old('nombreCliente'), array('placeholder' => '...', 'required', 'class' => 'form-control')) }}
	{{ $errors->first('nombreCliente') }}
</div>

<div class="form-group">
	{{ Form::label('fonoCelular', 'Tel. Celular:') }}
	{{ Form::input('tel', 'fonoCelular', Input::old('fonoCelular'), array('placeholder' => '...', 'class' => 'form-control')) }}
	{{ $errors->first('fonoCelular') }}
</div>

<div class="form-group">
	{{ Form::label('fonoComercial', 'Tel. Comercial:') }}
	{{ Form::input('tel', 'fonoComercial', Input::old('fonoComercial'), array('placeholder' => '...', 'class' => 'form-control')) }}
	{{ $errors->first('fonoComercial') }}
</div>

<div class="form-group">
	{{ Form::label('fonoParticular', 'Tel. Particular:') }}
	{{ Form::input('tel', 'fonoParticular', Input::old('fonoParticular'), array('placeholder' => '...', 'class' => 'form-control')) }}
	{{ $errors->first('fonoParticular') }}
</div>

<div class="form-group">
	{{ Form::label('emailCliente', 'Email:') }}
	{{ Form::email('emailCliente', Input::old('emailCliente'), array('placeholder' => '...', 'required', 'class' => 'form-control')) }}
	{{ $errors->first('emailCliente') }}
</div>
<button type="submit" class="btn btn-block aa">Enviar Datos</button>
{{ Form::close() }}

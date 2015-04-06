@extends('layouts.landing.cliente.master')

@section('title')
	Bienvenido {{ $cliente->nombreCliente }}
@endsection

@section('text-style')
	<style>
		.lead-big {
			line-height: 30px;
			color: #e76113;
		}

		.center-block {
			float: none;
		}

		h1 small {
			color: #e76113;
		}

		h3 {
			color: #666666;
		}

		.aa, .aa:active, .aa:focus, .aa:visited, a.aa, a.aa:active, a.aa:focus, a.aa:visited {
			padding: 10px 6px;
			font-size: larger;
			font-weight: bold;
			background: #e76113;
			border: 1px solid #e76113;
			color: #ffffff !important;
			-webkit-border-radius: 5px;
			-moz-border-radius: 5px;
			border-radius: 5px;
			-webkit-box-shadow: 0px 5px 0px #de3214;
			-moz-box-shadow: 0px 5px 0px #de3214;
			box-shadow: 0px 5px 0px #de3214;
		}

		.aa:active, a.aa:active {
			-webkit-box-shadow: 0px 5px 0px #de3214;
			-moz-box-shadow: 0px 5px 0px #de3214;
			box-shadow: 0px 5px 0px #de3214;
			position: relative;
			top: 6px;
		}
	</style>
@endsection

@section('content')
	{{--@if(isset($messages))--}}
	{{--{{ HTML::ul($messages) }}--}}
	{{--@endif--}}

	@if((isset($campana) && $campana == 1) || !isset($campana))
		<div class="row text-center">
			<div class="center-block col-md-6">
				<h1 class="lead-big"><strong>EN AMICAR</strong><br/>
					<small>tenemos la couta perfecta para ti.</small>
				</h1>
				<h3 class="">Para agilizar nuestro contacto necesitamos que actualices tus datos.</h3>
			</div>
		</div>

		<div class="row">
			<div class="center-block col-md-4">
				@include('landings.form')
			</div>
		</div>
	@elseif(isset($campana) && ($campana == 2 || $campana == 3))
		<div class="row">
			<div class="col-md-8">
				<div class="row">
					<div class="col-md-11">
						<h1 class="lead-big"><strong>EN AMICAR</strong><br/>
							<small>tenemos la couta perfecta para ti.</small>
						</h1>
					</div>
					<div class="col-md-12 hidden-xs">
						@if($campana == 2)
							{{ HTML::image('images/parlante.png', '', array('class', 'img-responsive')) }}
						@else
							{{ HTML::image('images/gopro.png', '', array('class', 'img-responsive')) }}
						@endif
					</div>
					<div class="col-md-12 text-center visible-xs">
						@if($campana == 2)
							{{ HTML::image('images/parlante.png', '', array('class', 'img-responsive')) }}
						@else
							{{ HTML::image('images/gopro.png', '', array('class', 'img-responsive')) }}
						@endif
					</div>
					<div class="col-md-8">
						<h3 class="">Para agilizar nuestro contacto necesitamos que actualices tus datos.</h3>
					</div>
					<div class="col-md-8">
						@if($campana == 2)
							<h3 class="">No olvides que al adquirir tu vehículo recibirás de <strong>REGALO</strong> un increíble <strong>parlante X mini</strong></h3>
						@else
							<h3 class="">No olvide que al adquirir tu vehículo, estarás participando en el sorteo de una espectacular cámara <strong>Go Pro Hero 3 White Edition</strong></h3>
						@endif
					</div>
				</div>
			</div>
			<div class="col-md-4">
				@include('landings.form')
			</div>
		</div>
	@endif
@endsection

@section('text-script')
@endsection

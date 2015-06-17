@extends('layouts.landing.cliente.master')

@section('title')
	Hasta pronto!
@endsection

@section('text-style')
	<style>
		.lead-big {
			line-height: 30px;
			color: #666666;
		}

		.center-block {
			float: none;
		}

		h1 small {
			color: #666666;
		}

		h3 {
			color: #666666;
		}

		.parent {
			display: table;
			margin: 0 auto;
			min-height: 350px;
		}

		.child {
			display: table-cell;
			vertical-align: middle;
			display: table-cell;
			text-align: center;
			vertical-align: middle;
		}

		.content {
			display: inline-block;
			text-align: center;
		}
	</style>
@endsection

@section('content')
	<div class="row parent">
		<div class="child">
			<div class="content">
				<h2 class="lead-big">Su solicitud está siendo procesada.</h2>

				{{-- <h3 class=""><strong>¡MUCHAS GRACIAS POR TODO!</strong></h3> --}}
			</div>
		</div>
	</div>
@endsection

@section('text-script')@endsection

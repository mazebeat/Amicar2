@extends('layouts.landing.cliente.master')

@section('title')
	Gracias!
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
				<h1 class="lead-big"><strong>¡Muchas Gracias!</strong></h1>

				<h3 class="">Muy pronto nuestros ejecutivos te contactarán.</h3>
			</div>
		</div>
	</div>
@endsection

@section('text-script')@endsection

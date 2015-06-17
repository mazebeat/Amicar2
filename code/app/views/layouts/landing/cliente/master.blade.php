<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>@yield('title')</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->    <!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>    <![endif]-->
	@yield('text-style')
	<style>
		html {
			position: relative;
			min-height: 100%;
		}

		body {
			/* Margin bottom by footer height */
			margin-bottom: 60px;
		}

		.btn-link {
			color: #ffffff;
		}

		.btn-link img {
			margin-bottom: 5px;
		}

		.footer {
			position: absolute;
			bottom: 0;
			width: 100%;
			/* Set the fixed height of the footer here */
			height: 60px;
			background-color: #f5f5f5;
		}

		.footer1 {
			background-color: #e76113;
			padding: 8px 0;
		}

		.footer2 {
			color: #ffffff;
			background-color: #de3214;
			padding: 5px 0;
			font-size: smaller;
		}

	</style>
</head>
<body>

<div class="container">
	<header class="row" style="margin-top: 20px; margin-bottom: 20px;">
		<div class="col-md-12">
			<div class="logo">
				{{ HTML::image('images/logo.png', '', array('class' => 'img-responsive center-block')) }}
			</div>
		</div>
	</header>

	<div class="row" style="margin-top: 20px; margin-bottom: 20px;">
		<div class="col-md-12">
			@yield('content')
		</div>
	</div>
</div>

<div class="container-fluid footer">
	<footer class="row footer1">
		<div class="col-md-8 col-md-offset-2 ">
			<div class="row center-block text-center">
				<div class="col-xs-6 col-sm-3 col-md-3">
					<a href="#" class="btn btn-link" role="button">
						{{ HTML::image('images/icon_mano.png', '', array('class' => '', 'width' => '30', 'height' => '36')) }}<br/> www.amicar.cl </a>
				</div>
				<div class="col-xs-6 col-sm-3 col-md-3">
					<a href="#" class="btn btn-link" role="button">
						{{ HTML::image('images/icon_cel.png', '', array('class' => '', 'width' => '30', 'height' => '36')) }}<br/> (02) 249 51 700 </a>
				</div>
				<div class="col-xs-6 col-sm-3 col-md-3">
					<a href="#" class="btn btn-link" role="button">
						{{ HTML::image('images/icon_twitter.png', '', array('class' => '', 'width' => '30', 'height' => '36')) }}<br/> @amicarCL </a>
				</div>
				<div class="col-xs-6 col-sm-3 col-md-3">
					<a href="#" class="btn btn-link" role="button">
						{{ HTML::image('images/icon_facebook.png', '', array('class' => '', 'width' => '30', 'height' => '36')) }}<br/> /amicar.chile </a>
				</div>
			</div>
		</div>
	</footer>

	<div class="row footer2 text-center">
		<span>© AMICAR 2015. Todos los derechos reservados.</span>
	</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
</body>
</html>

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
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-md-6">
			<div class="center-block">...</div>
			<div class="logo">
				{{ HTML::image('images/landing/logo.png', '', array('class' => 'img-responsive')) }}
			</div>
		</div>
	</div>
	<div class="row">
		<div class="inner cover main">
			@yield('content')
		</div>
	</div>
	<div class="row">
		<div class="mastfoot">
			<div class="footer col-centered">
				{{ HTML::image('images/landing/footer.png', '', array('class' => 'img-responsive')) }}
			</div>
		</div>
	</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
</body>
</html>

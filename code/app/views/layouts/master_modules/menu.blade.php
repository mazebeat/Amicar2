<nav class="navbar navbar-default" role="navigation">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span>
				<span class="icon-bar"></span> <span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="{{ URL::to('dashboard') }}"> </a>
		</div>

		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li id="menuHome" class="{{ HTML::activeLink('dashboard') }}">
					<a href="{{ URL::to('dashboard') }}"><i class="fa fa-home fa-fw"></i> Inicio</a>
				</li>
				<li id="menuConsolidadoPorTipo" class="{{ HTML::activeLink('dashboard/consolidado/individual') }}">
					<a href="{{ URL::to('dashboard/consolidado/individual') }}"><i class="fa fa-area-chart fa-fw"></i> Consolidado</a>
				</li>
				<li id="menuBusquedaIndividual" class="{{ HTML::activeLink('dashboard/consulta/individual') }}">
					<a href="{{ URL::to('dashboard/consulta/individual') }}"><i class="fa fa-search fa-fw"></i> Consulta Individual</a>
				</li>
				<li id="menuInformes" class="{{ HTML::activeLink('dashboard/informes') }}">
					<a href="{{ URL::to('dashboard/informes') }}"><i class="fa fa-file-code-o fa-fw"></i> Informes</a>
				</li>
				<li id="menuAdmin" class="dropdown {{ HTML::activeState(array('dashboard/admin/usuarios', 'dashboard/admin/carga/planes')) }}">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cog fa-fw"></i> Administración
						<b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li>
							<a href="{{ URL::to('dashboard/admin/usuarios') }}"><i class="fa fa-users fa-fw"></i> Usuarios</a>
						</li>
						<li>
							<a href="{{ URL::to('dashboard/admin/carga/planes') }}"><i class="fa fa-database fa-fw"></i> Carga Planes</a>
						</li>
					</ul>
				</li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown" id="menuUsuario">
					<a href="javascript;" class="dropdown-toggle" data-toggle="dropdown">
						@if(!Config::get('api.demo'))
							{{--<i class="fa fa-user fa-lg fa-fw" style="color: #FFFFFF;"></i> {{ Str::upper(Auth::user()->nombre)  }}--}}
						@else
							<i class="fa fa-user fa-lg fa-fw" style="color: #FFFFFF;"></i> {{ Config::get('api.testUsername') }}
						@endif
						<b class="caret"></b> </a>
					<ul class="dropdown-menu">
						<li><a href="{{ URL::to('logout') }}"><i class="fa fa-sign-out fa-lg fa-fw"></i> Salir</a></li>
					</ul>
				</li>
				<li id="menuHelp">
					<a href="#" id="helpPopover" type="button" class=""> <i class="fa fa-question"></i> </a>
				</li>
			</ul>
		</div>
	</div>
</nav>

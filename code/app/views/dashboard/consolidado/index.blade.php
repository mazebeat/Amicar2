@extends('layouts.master')

@section('title')
	Inicio
@endsection

@section('content')
	<div ng-controller="consolidadoController">
		<div class="panel panel-default">
			<div class="panel-heading">
				Cuadro de Mando
                <span class="tools pull-right">
                <a class="fa fa-question" id="dashboardTour" href="javascript:"></a>
                <a class="fa fa-chevron-down" href="javascript:"></a>
                </span>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-md-4">
						<form class="form">
							<div class="form-group">
								<label class="" for="q">Seleccione un plan: </label> <select class="form-control">
									<option value="plan1">Plan n°1</option>
									<option value="plan2">Plan n°2</option>
									<option value="plan3">Plan n°3</option>
									<option value="plan4">Plan n°4</option>
									<option value="plan5">Plan n°5</option>
								</select>
							</div>
						</form>
					</div>
				</div>
				<div class="row">
					<div class="col-md-2 text-center legend" style="color:white;">
						<div class="row">
							<div class="col-md-12 col-xs-12 col-sm-6">
								<div class="panel" style="background-color:#374152;">
									<div class="symbol">
										{{--<i class="fa fa-gavel"></i>--}}
									</div>
									<div class="state-value">
										{{--<div class="value">230</div>--}}
										<div class="title">Cargo Fijo Planes y Bolsas</div>
									</div>
								</div>
							</div>
							<div class="col-md-12 col-xs-12 col-sm-6">
								<div class="panel" style="background-color:#4AB67F;">
									<div class="symbol">
										{{--<i class="fa fa-gavel"></i>--}}
									</div>
									<div class="state-value">
										{{--<div class="value">230</div>--}}
										<div class="title">Descuentos Cargo Fijo y trafico</div>
									</div>
								</div>
							</div>
							<div class="col-md-12 col-xs-12 col-sm-6">
								<div class="panel" style="background-color:#E70D2F;">
									<div class="symbol">
										{{--<i class="fa fa-gavel"></i>--}}
									</div>
									<div class="state-value">
										{{--<div class="value">230</div>--}}
										<div class="title">Aplicación Unidades Libres Planes</div>
									</div>
								</div>
							</div>
							<div class="col-md-12 col-xs-12 col-sm-6">
								<div class="panel" style="background-color:#86A6C2;">
									<div class="symbol">
										{{--<i class="fa fa-tags"></i>--}}
									</div>
									<div class="state-value">
										{{--<div class="value">3490</div>--}}
										<div class="title">Aplicación Unidades Libres Bolsas</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div id="actual" style="width: 100%; height: 400px; background-color: #FFFFFF;"></div>
					</div>
					<div class="col-md-4">
						<div id="detalle" style="width: 100%; height: 400px; background-color: #FFFFFF;"></div>
					</div>
				</div>
			</div>
		</div>

		<section class="panel">
			<header class="panel-heading custom-tab dark-tab">
				<ul class="nav nav-tabs">
					<li class="active">
						<a href="#hist" data-toggle="tab"><i class="fa fa-line-chart fa-lg"></i></a>
					</li>
					<li class="">
						<a href="#aulb" data-toggle="tab"><i class="fa fa-table fa-lg"></i></a>
					</li>
					<li class="">
						<a href="#aulp" data-toggle="tab"><i class="fa fa-table fa-lg"></i></a>
					</li>
					<li class="">
						<a href="#dcfyt" data-toggle="tab"><i class="fa fa-table fa-lg"></i></a>
					</li>
					<li class="">
						<a href="#cfpyb" data-toggle="tab"><i class="fa fa-table fa-lg"></i></a>
					</li>
				</ul>
			</header>
			<div class="panel-body">
				<div class="tab-content">
					<div class="tab-pane active" id="hist">
						<div id="historico" style="width: 100%; height: 400px; background-color: #FFFFFF;"></div>
					</div>
					<div class="tab-pane" id="aulb">
						<h3 class="text-center">Aplicación Unidades Libres Bolsas</h3>

						<div class="row">
							<div class="col-md-12">
								<div class="table-responsive">
									<table class="table table-hover table-list-search" id="uno">
										<thead>
										<tr>
											<th>#</th>
											<th style="width: 100px;">Cliente</th>
											<th>Contrato</th>
											<th>Plan</th>
											<th style="width: 55px;">Días Activos</th>
											<th style="width: 40px;">Prorrateo</th>
											<th style="width: 85px;">Min. Plan</th>
											<th style="width: 85px;">Min. Libres Prorrateados</th>
											<th style="width: 85px;">Min. Utilizados</th>
											<th style="width: 85px;">Min. Excedidos</th>
											<th style="width: 55px;">Estado</th>
											<th style="width: 55px;">Observaciones</th>
										</tr>
										</thead>
										<tbody>
										<tr>
											<td>1</td>
											<td>3.838.42.00.100235</td>
											<td>11238620</td>
											<td>Bolsa Promo 450 Min - 3 m</td>
											<td>19</td>
											<td>SI</td>
											<td>450</td>
											<td>276</td>
											<td>160</td>
											<td>0</td>
											<td>
												<h4><span class="label label-success">OK</span></h4>
											</td>
											<td>
												<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalComment">
													<i class="fa fa-comment-o"></i>
												</button>
											</td>
										</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<div class="tab-pane" id="aulp">
						<h3 class="text-center">Aplicación Unidades Libres Planes</h3>

						<div class="row">
							<div class="col-md-12">
								<div class="table-responsive">
									<table class="table table-hover table-list-search">
										<thead>
										<tr>
											<th>#</th>
											<th style="width: 100px;">Cliente</th>
											<th>Contrato</th>
											<th>Plan</th>
											<th style="width: 55px;">Días Activos</th>
											<th style="width: 40px;">Prorrateo</th>
											<th style="width: 85px;">Min. Plan</th>
											<th style="width: 85px;">Min. Libres Prorrateados</th>
											<th style="width: 85px;">Min. Utilizados</th>
											<th style="width: 85px;">Min. Excedidos</th>
											<th style="width: 55px;">Estado</th>
											<th style="width: 55px;">Observaciones</th>
										</tr>
										</thead>
										<tbody>
										<tr>
											<td>1</td>
											<td>110.100.140</td>
											<td>190</td>
											<td>1472 Multimedia Full 2 GB</td>
											<td>31</td>
											<td>SI</td>
											<td>1800</td>
											<td>1800</td>
											<td>17993</td>
											<td>7790</td>
											<td>
												<h4><span class="label label-warning">En revisión</span></h4>
											</td>
											<td>
												<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalComment">
													<i class="fa fa-comment-o"></i>
												</button>
											</td>
										</tr>
										<tr>
											<td>2</td>
											<td>110.100.179</td>
											<td>222</td>
											<td>77 Plus 80s</td>
											<td>31</td>
											<td>SI</td>
											<td>6000</td>
											<td>6000</td>
											<td>5641</td>
											<td>311</td>
											<td>
												<h4><span class="label label-success">OK</span></h4>
											</td>
											<td>
												<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalComment">
													<i class="fa fa-comment-o"></i>
												</button>
											</td>
										</tr>
										<tr>
											<td>3</td>
											<td>110.100.140</td>
											<td>7546046</td>
											<td>1082 Tarifa Unica Frec 100+100</td>
											<td>31</td>
											<td>SI</td>
											<td>1800</td>
											<td>1800</td>
											<td>17993</td>
											<td>7790</td>
											<td>
												<h4><span class="label label-warning">Pendiente</span></h4>
											</td>
											<td>
												<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalComment">
													<i class="fa fa-comment-o"></i>
												</button>
											</td>
										</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<div class="tab-pane" id="dcfyt">
						<h3 class="text-center">Descuentos Cargo Fijo y Tráfico</h3>

						<div class="row">
							<div class="col-md-12">
								<div class="table-responsive">
									<table class="table table-hover table-list-search">
										<thead>
										<tr>
											<th>#</th>
											<th>Cliente</th>
											<th>Contrato</th>
											<th>Detalle</th>
											<th>Plan o Bolsa</th>
											<th class="text-center">Valor Plan</th>
											<th class="text-center">Monto Dsct</th>
											<th style="width: 55px;">Estado</th>
											<th></th>
										</tr>
										</thead>
										<tbody>
										<tr>
											<td>1</td>
											<td>110.100.188</td>
											<td>4566639</td>
											<td>Dscto. Multimedia</td>
											<td>1076 Multimedia Red Total 100</td>
											<td class="text-center">$ 28.563</td>
											<td class="text-center">-$ 14.277</td>
											<td>
												<h4><span class="label label-success">OK</span></h4>
											</td>
											<td>
												<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalComment">
													<i class="fa fa-comment-o"></i>
												</button>
											</td>
										</tr>
										<tr>
											<td>2</td>
											<td>110.100.140</td>
											<td>190</td>
											<td>Dscto. Multimedia</td>
											<td>1053 Multimedia 300</td>
											<td class="text-center">$ 25.202</td>
											<td class="text-center">-$ 14.277</td>
											<td>
												<h4><span class="label label-info">On hold</span></h4>
											</td>
											<td>
												<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalComment">
													<i class="fa fa-comment-o"></i>
												</button>
											</td>
										</tr>
										<tr>
											<td>3</td>
											<td>110.100.140</td>
											<td>1751238</td>
											<td>Dscto. Multimedia</td>
											<td>1472 Multimedia Full 2 GB</td>
											<td class="text-center">$ 25.202</td>
											<td class="text-center">-$ 14.277</td>
											<td>
												<h4><span class="label label-success">OK</span></h4>
											</td>
											<td>
												<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalComment">
													<i class="fa fa-comment-o"></i>
												</button>
											</td>
										</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<div class="tab-pane" id="cfpyb">
						<h3 class="text-center">Cargo Fijo Planes y Bolsas</h3>

						<div class="row">
							<div class="col-md-12">
								<div class="table-responsive">
										<table class="table table-hover table-list-search">
										<thead>
										<tr>
											<th>#</th>
											<th>Cliente</th>
											<th>Contrato</th>
											<th>Plan o Bolsa</th>
											<th class="text-center">Días Cobrados</th>
											<th class="text-center">Cargo Fijo</th>
											<th style="width: 55px;">Estado</th>
										</tr>
										</thead>
										<tbody>
										<tr>
											<td>1</td>
											<td>110.100.140</td>
											<td>190</td>
											<td>1053 Multimedia 300</td>
											<td class="text-center">31</td>
											<td class="text-center">$585.048</td>
											<td>
												<h4><span class="label label-warning">En revisión</span></h4>
											</td>
											<td>
												<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalComment">
													<i class="fa fa-comment-o"></i>
												</button>
											</td>
										</tr>
										<tr>
											<td>2</td>
											<td>110.100.140</td>
											<td>190</td>
											<td>1053 Multimedia 300</td>
											<td class="text-center">31</td>
											<td class="text-center">$585.048</td>
											<td>
												<h4><span class="label label-success">OK</span></h4>
											</td>
											<td>
												<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalComment">
													<i class="fa fa-comment-o"></i>
												</button>
											</td>
										</tr>
										<tr>
											<td>3</td>
											<td>110.100.140</td>
											<td>190</td>
											<td>1053 Multimedia 300</td>
											<td class="text-center">31</td>
											<td class="text-center">$585.048</td>
											<td>
												<h4><span class="label label-success">OK</span></h4>
											</td>
											<td>
												<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalComment">
													<i class="fa fa-comment-o"></i>
												</button>
											</td>
										</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="modalComment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Deja tu observación...</h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12">
							<span class="pull-right">Fecha: <kbd>{{ \Carbon::now() }}</kbd></span>
						</div>
					</div>
					<div class="row">
						<div class="form">
							<div class="form-group">
								<div class="col-sm-12">
									<label id="userLabel" for="usuarioResponsable">Responsable </label>
									<input type="text" name="usuarioResponsable" id="usuarioResponsable" value="{{ Config::get('api.testUsername') }}" class="form-control" readonly/>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<label id="commentLabel" for="comment">Observaciones </label>
									<textarea class="form-control ckeditor" name="comment" placeholder="Observaciones..." maxlength="240" rows="7"></textarea>
									<span class="help-block"><p id="characterLeft" class="help-block">Has pasado el limite!</p></span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					<button class="btn btn-success" id="btnSubmit" name="btnSubmit" type="button">Enviar</button>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('file-style')
	{{ HTML::style('js/bootstrap-datepicker/css/datepicker.css') }}
	{{ HTML::style('js/bootstrap-datepicker/css/datepicker-custom.css') }}
@endsection

@section('text-style')
	<style>
		.table tbody tr td {
			vertical-align: middle;
			padding: 5px;
		}

		.legend .row .panel {
			height: 60px;
			margin-bottom: 5px;
		}
		.legend .row .panel:first-child {
			margin-top: 10px;
		}
		.legend .row .panel .state-value .title {
			vertical-align: middle;
			text-align: center;
			padding-top: 10px;
		}
	</style>
@endsection

@section('file-script')

@endsection

@section('text-script')
	<script type="text/javascript">
		AmCharts.makeChart("actual", {
			"type": "serial",
			"pathToImages": "http://cdn.amcharts.com/lib/3/images/",
			"categoryField": "category",
			"startDuration": 1,
			"categoryAxis": {
				"gridPosition": "start"
			},
			"colors": [
				"#374152",
				"#E70D2F"
			],
			"trendLines": [],
			"graphs": [
				{
					"balloonText": "Cantidad de <strong>[[title]]</strong> en  [[category]]: [[percents]]%",
					"fillAlphas": 1,
					"id": "AmGraph-1",
					"title": "Correctos",
					"type": "column",
					"valueField": "column-1"
				},
				{
					"balloonText": "Cantidad de <strong>[[title]]</strong> en  [[category]]: [[percents]]%",
					"fillAlphas": 1,
					"id": "AmGraph-2",
					"title": "Incorrectos",
					"type": "column",
					"valueField": "column-2"
				}
			],
			"guides": [],
			"valueAxes": [
				{
					"id": "ValueAxis-1",
					"title": "Cantidad"
				}
			],
			"allLabels": [],
			"balloon": {},
			"legend": {
				"useGraphSettings": true
			},
			"titles": [
				{
					"id": "Title-1",
					"size": 15,
					"text": "Febrero 2015"
				}
			],
			"dataProvider": [
				{
					"category": "Febrero",
					"column-2": "7",
					"column-1": "65"
				}
			],
			"pathToImages": "http://www.amcharts.com/lib/3/images/",
			"amExport": {
				"buttonTitle": "Guardar",
				"imageFileName": "amCharts",
				"buttonAlpha": 1,
				"exportJPG": true,
				"exportPNG": true,
				"exportSVG": true,
				"exportPDF": true,
				"userCFG": {
					menuItems: [{
						textAlign: 'center',
						icon: 'http://www.amcharts.com/lib/3/images/export.png',
						iconTitle: 'Save chart as an image',
						onclick: function () {
						},
						items: [{
							title: 'JPG',
							format: 'jpg'
						}, {
							title: 'PNG',
							format: 'png'
						}, {
							title: 'XLS',
							format: 'svg'
						}]
					}],
					removeImagery: true
				}
			}
		});
		AmCharts.makeChart("detalle", {
			"type": "pie",
			"pathToImages": "http://cdn.amcharts.com/lib/3/images/",
			"balloonText": "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>",
			"labelText": "[[percents]]% ",
			"innerRadius": "40%",
			"minRadius": 100,
			"colors": [
				"#374152",
				"#E70D2F",
				"#12DC49",
				"#86A6C2"
			],
			"titleField": "category",
			"valueField": "column-1",
			"allLabels": [],
			"balloon": {},
			"legend": {
				"align": "center", "equalWidths": false,
				"markerType": "circle"
			},
			"titles": [],
			"dataProvider": [
				{
					"category": "Cargo Fijo",
					"column-1": "10"
				},
				{
					"category": "Unidades Libres y Planes",
					"column-1": "40"
				},
				{
					"category": "Descuentos Cargos Fijos",
					"column-1": "20"
				},
				{
					"category": "Unidades Libres y Bolsas",
					"column-1": "30"
				}
			],
			"pathToImages": "http://www.amcharts.com/lib/3/images/",
			"amExport": {
				"buttonTitle": "Guardar",
				"imageFileName": "amCharts",
				"buttonAlpha": 1,
				"exportJPG": true,
				"exportPNG": true,
				"exportSVG": true,
				"exportPDF": true,
				"userCFG": {
					menuItems: [{
						textAlign: 'center',
						icon: 'http://www.amcharts.com/lib/3/images/export.png',
						iconTitle: 'Save chart as an image',
						onclick: function () {
						},
						items: [{
							title: 'JPG',
							format: 'jpg'
						}, {
							title: 'PNG',
							format: 'png'
						}, {
							title: 'XLS',
							format: 'svg'
						}]
					}],
					removeImagery: true
				}
			}
		});
		AmCharts.makeChart("historico", {
			"type": "serial",
			"pathToImages": "http://cdn.amcharts.com/lib/3/images/",
			"categoryField": "category",
			"colors": [
				"#374152",
				"#E70D2F"
			],
			"startDuration": 1,
			"categoryAxis": {
				"gridPosition": "start",
				"titleFontSize": 2
			},
			"trendLines": [],
			"graphs": [
				{
					"balloonText": "Porcentaje de <strong>[[title]]</strong> en  [[category]]: [[percents]]%",
//											"fillAlphas": 1,
					"id": "AmGraph-1",
					"stackable": false,
					"switchable": false,
					"title": "Correctos",
					"type": "line",
					"bullet": "round",
					"lineThickness": 2,
					"bulletSize": 10,
					"valueField": "Correctos"
				},
				{
					"balloonText": "Porcentaje de <strong>[[title]]</strong> en  [[category]]: [[percents]]%",
//											"fillAlphas": 1,
					"id": "AmGraph-2",
					"stackable": false,
					"switchable": false,
					"title": "Incorrectos",
					"type": "line",
					"bullet": "round",
					"lineThickness": 2,
					"bulletSize": 10,
					"valueField": "Incorrectos"
				}
			],
			"guides": [],
			"valueAxes": [
				{
					"id": "ValueAxis-1",
					"maximum": 0,
					"radarCategoriesEnabled": false,
					"stackType": "100%",
					"unit": "%",
					"autoGridCount": false,
					"title": "Porcentaje"
				}
			],
			"allLabels": [],
			"balloon": {},
			"legend": {
				"useGraphSettings": true
			},
			"titles": [
				{
					"id": "Title-1",
					"size": 15,
					"text": "Historial de Procesos 2015"
				}
			],
			"chartCursor": {
				"oneBalloonOnly": false
			},
			"dataProvider": [
				{
					"category": "Enero",
					"Correctos": 8,
					"Incorrectos": 5
				},
				{
					"category": "Febrero",
					"Correctos": "65",
					"Incorrectos": 7
				},
				{
					"category": "Marzo",
					"Correctos": 2,
					"Incorrectos": "32"
				},
				{
					"category": "Abril",
					"Correctos": "72",
					"Incorrectos": "1"
				},
				{
					"category": "Mayo",
					"Correctos": "86",
					"Incorrectos": "78"
				},
				{
					"category": "Junio",
					"Correctos": "2",
					"Incorrectos": "56"
				},
				{
					"category": "Julio",
					"Correctos": "3",
					"Incorrectos": "3",
					"column-1": "45",
					"column-2": "64"
				},
				{
					"category": "Agosto",
					"Correctos": "87",
					"Incorrectos": "24"
				},
				{
					"category": "Septiembre",
					"Correctos": "2",
					"Incorrectos": "8"
				},
				{
					"category": "Octubre",
					"Correctos": "34",
					"Incorrectos": "5"
				}
			],
			"pathToImages": "http://www.amcharts.com/lib/3/images/",
			"amExport": {
				"buttonTitle": "Guardar",
				"imageFileName": "amCharts",
				"buttonAlpha": 1,
				"exportJPG": true,
				"exportPNG": true,
				"exportSVG": true,
				"exportPDF": true,
				"userCFG": {
					menuItems: [{
						textAlign: 'center',
						icon: 'http://www.amcharts.com/lib/3/images/export.png',
						iconTitle: 'Save chart as an image',
						onclick: function () {
						},
						items: [{
							title: 'JPG',
							format: 'jpg'
						}, {
							title: 'PNG',
							format: 'png'
						}, {
							title: 'XLS',
							format: 'svg'
						}]
					}],
					removeImagery: true
				}
			}
		});
	</script>
@endsection

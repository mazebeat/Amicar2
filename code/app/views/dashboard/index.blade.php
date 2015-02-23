@extends('layouts.master')

@section('title')
	Inicio
@endsection

@section('content')
	<div ng-controller="adminController">
		<div class="panel panel-default">
			<div class="panel-heading">
				Estadisticas mensuales
                <span class="tools pull-right">
                <a class="fa fa-question" id="dashboardTour" href="javascript:"></a>
                <a class="fa fa-chevron-down" href="javascript:"></a>
                </span>
			</div>
			<div class="panel-body"></div>
		</div>
	</div>
@endsection

@section('file-style')
@endsection

@section('text-style')
	<style></style>
@endsection

@section('file-script')
@endsection

@section('text-script')
	<script type="text/javascript"></script>
@endsection

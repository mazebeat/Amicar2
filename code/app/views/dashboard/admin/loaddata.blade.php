@extends('layouts.master')

@section('title')
	Carga de Planes
@endsection

@section('content')
	<div ng-controller="cargadataController">
		<div class="panel panel-default">
			<div class="panel-heading">
				Carga de Planes
                <span class="tools pull-right">
                <a class="fa fa-question" id="dashboardTour" href="javascript:"></a>
                <a class="fa fa-chevron-down" href="javascript:"></a>
                </span>
			</div>
			<div class="panel-body">
				<div class="row">
					<form class="form-horizontal" role="form">
						<div class="col-xs-12 col-md-10 col-md-offset-1 col-sm-8 col-sm-offset-2">
							<div class="form-group">
								<label class="" for="q">Seleccione un plan </label>
								<!-- inputform -->
								<div class="input-group image-preview">
									<input type="text" class="form-control image-preview-filename" disabled="disabled">
				                <span class="input-group-btn">
				                    <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
					                    <span class="glyphicon glyphicon-remove"></span> Limpiar
				                    </button>
				                    <div class="btn btn-default image-preview-input">
					                    <span class="glyphicon glyphicon-folder-open"></span>
					                    <span class="image-preview-input-title">Examinar</span>
					                    <input type="file" accept="*/*" name="input-file-preview"/>
				                    </div>
				                </span>
								</div>
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-primary pull-right">
									<i class="fa fa-upload fa-fw"></i>Cargar
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('file-style')
@endsection

@section('text-style')
	<style>
		.container {
			margin-top: 20px;
		}

		.image-preview-input {
			position: relative;
			overflow: hidden;
			margin: 0px;
			color: #333;
			background-color: #fff;
			border-color: #ccc;
		}

		.image-preview-input input[type=file] {
			position: absolute;
			top: 0;
			right: 0;
			margin: 0;
			padding: 0;
			font-size: 20px;
			cursor: pointer;
			opacity: 0;
			filter: alpha(opacity=0);
		}

		.image-preview-input-title {
			margin-left: 2px;
		}
	</style>
@endsection

@section('file-script')
@endsection

@section('text-script')
	<script type="text/javascript">
		// Create the close button
		var closebtn = $('<button/>', {
			type: "button",
			text: 'x',
			id: 'close-preview',
			style: 'font-size: initial;',
		});
		closebtn.attr("class", "close pull-right");
		// Set the popover default content
		$('.image-preview').popover({
			trigger: 'manual',
			html: true,
			title: "<strong>Vista Previa</strong>" + $(closebtn)[0].outerHTML,
			content: "No hay imagenes",
			placement: 'bottom'
		});
		// Clear event
		$('.image-preview-clear').click(function () {
			$('.image-preview').attr("data-content", "").popover('hide');
			$('.image-preview-filename').val("");
			$('.image-preview-clear').hide();
			$('.image-preview-input input:file').val("");
			$(".image-preview-input-title").text("Browse");
		});
		// Create the preview image
		$(".image-preview-input input:file").change(function () {
			var img = $('<img/>', {
				id: 'dynamic',
				width: 250,
				height: 200
			});
			var file = this.files[0];
			var reader = new FileReader();
			// Set preview image into the popover data-content
			reader.onload = function (e) {
				$(".image-preview-input-title").text("Change");
				$(".image-preview-clear").show();
				$(".image-preview-filename").val(file.name);
				img.attr('src', e.target.result);
//				$(".image-preview").attr("data-content", $(img)[0].outerHTML).popover("show");
			}
			reader.readAsDataURL(file);
		});
	</script>
@endsection

		
	@for($i=1; $i<=4; $i++)

	<?php

		$currentMedia = !empty($sections) && array_key_exists($i-1, $sections) ? $sections[$i - 1] : null;

	?>

	<div class="portlet box blue">
		<div class="portlet-title">
			<div class="caption">
				<i class="fa fa-plus"></i> Bloque #{{$i}} de compos
			</div>
		</div>
		
		<div class="portlet-body form">
			<div class="form-body">						
				
				<div class="form-group">
				 	<label for="image" class="control-label col-md-3">Imagen<br/><small>JPG/PNG de max. 1139x636px</small>
				 		<br/><br/>
				 		<button type="button" id="loader-image{{$i}}" class="btn btn-primary">Examinar</button>
				 	</label>
				 	<div class="col-md-9">
						<div id="image{{$i}}" class="dropzone">
						</div>
						{!! Form::hidden('image'.$i, @$currentMedia['source'], ['id' => 'current_image'.$i, 'class' => 'image'.$i]) !!}
					</div>
				</div>

			  	<div class="form-group">
			  		 	{!! Form::label("title".$i, "Titulo", ["class" => "control-label col-md-3"]) !!}
			  		 	<div class="col-md-9">
						{!! Form::text("title[$i]", @$currentMedia['title'], ["class" => "form-control title$i", "id" => "title[$i]", "autocomplete" => "off"]) !!}
					</div>
			  	</div>

			  	<div class="form-group">
			  		 	{!! Form::label("subtitle".$i, "Subtitulo", ["class" => "control-label col-md-3"]) !!}
			  		 	<div class="col-md-9">
						{!! Form::text("subtitle[$i]", @$currentMedia['subtitle'], ["class" => "form-control subtitle$i", "id" => "subtitle".$i, "autocomplete" => "off"]) !!}
					</div>
			  	</div>

			  	<div class="form-group">
			  		 	{!! Form::label("description".$i, "Descripcion", ["class" => "control-label col-md-3"]) !!}
			  		 	<div class="col-md-9">
						{!! Form::textarea("section_description[$i]", @$currentMedia['description'], ["class" => "form-control description".$i, "id" => "description[$i]", "autocomplete" => "off", "rows" => "4"]) !!}
					</div>
			  	</div>
			  	<div class="form-group">
			  		 {!! Form::label("alignment".$i, "Alineación", ["class" => "control-label col-md-3"]) !!}
			  		 <div class="col-md-9">
			  		 	{!! Form::select("alignment[$i]", [
			  		 		""	=> "Seleccione la alineación",
			  		 		"izquierda" => "Izquierda",
			  		 		"derecha" 	=> "Derecha",
			  		 		"centrado" 	=> "Centrado"
			  		 	], @$currentMedia['alignment'], ["class" => "form-control alignment".$i]) !!}
					</div>
			  	</div>
		
				<div class="text-center">
					{!! Form::button("<i class='fa fa-check'></i> Grabar", ["type" => "button", "class" => "btn blue btnSaveBlock", "data-pos" => $i]) !!}

					{!! Form::button("<i class='fa fa-check'></i> Borrar", ["type" => "button", "class" => "btn red btnClearBlock", "data-pos" => $i]) !!}

					{!! Form::hidden('position'.$i, $i, ['id' => 'position'.$i ]) !!}

					{!! Form::hidden('id'.$i, @$currentMedia['id'], ['id' => 'id'.$i ]) !!}
				</div>
			</div>
		</div>
	</div>
	@endfor


@push('scripts')
	<script src="{{ asset('admin/assets/pages/productos/dropzone/dropzone.js') }}"></script>
	
	<script>	
		
		var product_id = {{$producto->id}};
		var idfile1 = {};
		var idfile2 = {};
		var idfile3 = {};
		var idfile4 = {};

		// IMAGEN 1 //

		var current_image1 = '';
		var image1 = new Dropzone('#image1', {
			'url': 'sectionUpload',
			'paramName': 'image1',
			//'autoProcessQueue': false,
			'addRemoveLinks': true,
			'dictRemoveFile': 'Eliminar imagen',
			'acceptedFiles': 'image/*',
			'maxFiles': 1,
			'headers': {
				'X-CSRF-TOKEN': $("input[name='_token']").val()
			},
			'dictDefaultMessage': 'Haga click aquí para subir la imagen',
			'clickable' : '#loader-image1',
			'previewTemplate': '<div class="dz-preview dz-file-preview"><img data-dz-thumbnail /><div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div></div>',
			'thumbnailMethod': 'contain',
			'thumbnailWidth': 600,
			'thumbnailHeight': 400,
			init: function() {
				myDropzone = this;

				this.on("success", function (file, responseText) {
					$("#current_image1").val(responseText);
			        idfile1 = {'id' : file.upload.uuid, 'image' : responseText};
			    });
			}
		});

		image1.on("complete", function(file) {
			console.log(file);
		});

		image1.on("addedfile", function(file, res) {
			if (current_image1) {
				this.removeFile(current_image1);
			}
			current_image1 = file;
			$('.dz-progress').hide();
		});

		image1.on('error', function(file, res) {
			var msg;

			if(res == 'You can not upload any more files.')
				msg = 'No puedes subir mas de una imagen.'

			$(".dz-error-message:last > span").text(msg);
		});

		var fileName = $('#current_image1').val();
		if (fileName) {
		    var mockFile = { name: fileName, size: 12345 };
			
			image1.emit("addedfile", mockFile);
			image1.emit("thumbnail", mockFile, "/storage/" + fileName);

			currentFile = mockFile;
		}

		image1.on("removedfile", function(file, res) {

			if(idfile1.image)
				var image = idfile1.image;
			else
				var image = $("input[name='image1']").val();
			
			$.ajax({
				url: 'deleteProductSectionImage',
				type: 'POST',
				dataType: 'json',
				data: {
					image: image,
					_token: $("input[name='_token']").val(),
				}
			})
			.done(function(data) {
				//console.log(data);
			})
			.fail(function(xhr, status, error) {
				console.log(xhr.responseText);  
				$("input[name='image[1]']").val('');
			});
		
		});

		// IMAGEN 2 //

		var current_image2 = '';
		var image2 = new Dropzone('#image2', {
			'url': 'sectionUpload',
			'paramName': 'image2',
			//'autoProcessQueue': false,
			'addRemoveLinks': true,
			'dictRemoveFile': 'Eliminar imagen',
			'acceptedFiles': 'image/*',
			'maxFiles': 1,
			'headers': {
				'X-CSRF-TOKEN': $("input[name='_token']").val()
			},
			'dictDefaultMessage': 'Haga click aquí para subir la imagen',
			'clickable' : '#loader-image2',
			'previewTemplate': '<div class="dz-preview dz-file-preview"><img data-dz-thumbnail /><div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div></div>',
			'thumbnailMethod': 'contain',
			'thumbnailWidth': 600,
			'thumbnailHeight': 400,
			init: function() {
				myDropzone = this;

				this.on("success", function (file, responseText) {
					$("#current_image2").val(responseText);
			        idfile2 = {'id' : file.upload.uuid, 'image' : responseText};
			    });
			}
		});

		image2.on("complete", function(file) {
			console.log(file);
		});

		image2.on("addedfile", function(file, res) {
			if (current_image2) {
				this.removeFile(current_image2);
			}
			current_image2 = file;
			$('.dz-progress').hide();
		});

		image2.on('error', function(file, res) {
			var msg;

			if(res == 'You can not upload any more files.')
				msg = 'No puedes subir mas de una imagen.'

			$(".dz-error-message:last > span").text(msg);
		});

		var fileName = $('#current_image2').val();
		if (fileName) {
		    var mockFile = { name: fileName, size: 12345 };
			
			image2.emit("addedfile", mockFile);
			image2.emit("thumbnail", mockFile, "/storage/" + fileName);

			currentFile = mockFile;
		}

		image2.on("removedfile", function(file, res) {

			if(idfile2.image)
				var image = idfile2.image;
			else
				var image = $("input[name='image2']").val();
			
			$.ajax({
				url: 'deleteProductSectionImage',
				type: 'POST',
				dataType: 'json',
				data: {
					image: image,
					_token: $("input[name='_token']").val(),
				}
			})
			.done(function(data) {
				//console.log(data);
			})
			.fail(function(xhr, status, error) {
				console.log(xhr.responseText);  
				$("input[name='image[2]']").val('');
			});
		
		});

		// IMAGEN 3 //

		var current_image3 = '';
		var image3 = new Dropzone('#image3', {
			'url': 'sectionUpload',
			'paramName': 'image3',
			//'autoProcessQueue': false,
			'addRemoveLinks': true,
			'dictRemoveFile': 'Eliminar imagen',
			'acceptedFiles': 'image/*',
			'maxFiles': 1,
			'headers': {
				'X-CSRF-TOKEN': $("input[name='_token']").val()
			},
			'dictDefaultMessage': 'Haga click aquí para subir la imagen',
			'clickable' : '#loader-image3',
			'previewTemplate': '<div class="dz-preview dz-file-preview"><img data-dz-thumbnail /><div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div></div>',
			'thumbnailMethod': 'contain',
			'thumbnailWidth': 600,
			'thumbnailHeight': 400,
			init: function() {
				myDropzone = this;

				this.on("success", function (file, responseText) {
					$("#current_image3").val(responseText);
			        idfile3 = {'id' : file.upload.uuid, 'image' : responseText};
			    });
			}
		});

		image3.on("complete", function(file) {
			console.log(file);
		});

		image3.on("addedfile", function(file, res) {
			if (current_image3) {
				this.removeFile(current_image3);
			}
			current_image3 = file;
			$('.dz-progress').hide();
		});

		image3.on('error', function(file, res) {
			var msg;

			if(res == 'You can not upload any more files.')
				msg = 'No puedes subir mas de una imagen.'

			$(".dz-error-message:last > span").text(msg);
		});

		var fileName = $('#current_image3').val();
		if (fileName) {
		    var mockFile = { name: fileName, size: 12345 };
			
			image3.emit("addedfile", mockFile);
			image3.emit("thumbnail", mockFile, "/storage/" + fileName);

			currentFile = mockFile;
		}

		image3.on("removedfile", function(file, res) {

			if(idfile3.image)
				var image = idfile3.image;
			else
				var image = $("input[name='image3']").val();
			
			$.ajax({
				url: 'deleteProductSectionImage',
				type: 'POST',
				dataType: 'json',
				data: {
					image: image,
					_token: $("input[name='_token']").val(),
				}
			})
			.done(function(data) {
				//console.log(data);
			})
			.fail(function(xhr, status, error) {
				console.log(xhr.responseText);  
				$("input[name='image[3]']").val('');
			});
		
		});

		// IMAGEN 4 //

		var current_image4 = '';
		var image4 = new Dropzone('#image4', {
			'url': 'sectionUpload',
			'paramName': 'image4',
			//'autoProcessQueue': false,
			'addRemoveLinks': true,
			'dictRemoveFile': 'Eliminar imagen',
			'acceptedFiles': 'image/*',
			'maxFiles': 1,
			'headers': {
				'X-CSRF-TOKEN': $("input[name='_token']").val()
			},
			'dictDefaultMessage': 'Haga click aquí para subir la imagen',
			'clickable' : '#loader-image4',
			'previewTemplate': '<div class="dz-preview dz-file-preview"><img data-dz-thumbnail /><div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div></div>',
			'thumbnailMethod': 'contain',
			'thumbnailWidth': 600,
			'thumbnailHeight': 400,
			init: function() {
				myDropzone = this;

				this.on("success", function (file, responseText) {
					$("#current_image4").val(responseText);
			        idfile4 = {'id' : file.upload.uuid, 'image' : responseText};
			    });
			}
		});

		image4.on("complete", function(file) {
			console.log(file);
		});

		image4.on("addedfile", function(file, res) {
			if (current_image4) {
				this.removeFile(current_image4);
			}
			current_image4 = file;
			$('.dz-progress').hide();
		});

		image4.on('error', function(file, res) {
			var msg;

			if(res == 'You can not upload any more files.')
				msg = 'No puedes subir mas de una imagen.'

			$(".dz-error-message:last > span").text(msg);
		});

		var fileName = $('#current_image4').val();
		if (fileName) {
		    var mockFile = { name: fileName, size: 12345 };
			
			image4.emit("addedfile", mockFile);
			image4.emit("thumbnail", mockFile, "/storage/" + fileName);

			currentFile = mockFile;
		}

		image4.on("removedfile", function(file, res) {

			if(idfile4.image)
				var image = idfile4.image;
			else
				var image = $("input[name='image4']").val();
			
			$.ajax({
				url: 'deleteProductSectionImage',
				type: 'POST',
				dataType: 'json',
				data: {
					image: image,
					_token: $("input[name='_token']").val(),
				}
			})
			.done(function(data) {
				//console.log(data);
			})
			.fail(function(xhr, status, error) {
				console.log(xhr.responseText);  
				$("input[name='image[4]']").val('');
			});
		
		});

		Dropzone.autoDiscover = false;
		
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': '{{ csrf_token() }}'
			}
		});	
		
		$('.btnSaveBlock').click(function(){

			var n = $(this).data('pos');
			var data = { 
				image: $('.image' + n).val(), 
				title:$('.title' + n).val(), 
				subtitle:$('#subtitle' + n).val(), 
				description:$('.description' + n).val(), 
				alignment:$('.alignment' + n).val(), 
				id:$('#id' + n).val(),
				position:$('#position' + n).val() 
			};
            $.ajax({
                url: '{{ url("/panel/productos/".$producto->id."/section") }}',
                type: 'POST',
                data: data,
            })
            .done(function(data) {
                toastr.success('Bloque grabado con éxito.');
            }).
            fail(function(xhr, status, error){
            	console.log(xhr.responseText);
                toastr.error('No fue posible guardar el bloque.');
            });

		});

		$('.btnClearBlock').click(function(){

			var n = $(this).data('pos');
			var id = $('#id' + n).val();
			var image = $('.image' + n).val();
			var title = $('.title' + n).val();
			
			$.ajax({
				url: '{{ url("/panel/productos/".$producto->id."/section/") }}/' + id,
				type: 'delete',
				data: {
					id: id,
					image: image,
					title: title,
					token: $('input[name="_token"]').val(),
				},
				success: function(result) {
					console.log(result);
					toastr.success('Bloque eliminado con éxito.');					
					$('.image' + n).val("");
					$('.title' + n).val("");
					$('#subtitle' + n).val("");
					$('.description' + n).val("");
					$('.alignment' + n).val("");
					$('#id' + n).val("");
					$('position' + n).val("");
				},
				error: function(error){
					toastr.error('No fue posible eliminar el bloque.');
				}
			});

			});

	</script>
@endpush

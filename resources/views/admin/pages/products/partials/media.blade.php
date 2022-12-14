	
<div class="form-group">
 	<label for="image" class="control-label col-md-3">Imagen promocional<br/><small>JPG/PNG 1328x946px</small>
 		<br/><br/>
 		<button type="button" id="loader-image_featured" class="btn btn-primary">Examinar</button>
 	</label>
 	<div class="col-md-9">
		<div id="image_featured" class="dropzone">
		</div>
		{!! Form::hidden('image_featured', @$currentMedia['image_featured'], ['id' => 'current_image_featured']) !!}
	</div>
</div>

<div class="form-group">
 	<label for="image" class="control-label col-md-3">Imagen back promocional<br/><small>JPG/PNG 1058x401px</small>
 		<br/><br/>
 		<button type="button" id="loader-image_featured_background" class="btn btn-primary">Examinar</button>
 	</label>
 	<div class="col-md-9">
		<div id="image_featured_background" class="dropzone">
		</div>
		{!! Form::hidden('image_featured_background', @$currentMedia['image_featured_background'], ['id' => 'current_image_featured_background']) !!}
	</div>
</div>

<div class="form-group">
 	<label for="image" class="control-label col-md-3">Imagen de preview<br/><small>JPG/PNG 331x210px</small>
 		<br/><br/>
 		<button type="button" id="loader-image_thumb" class="btn btn-primary">Examinar</button>
 	</label>
 	<div class="col-md-9">
		<div id="image_thumb" class="dropzone">
		</div>
		{!! Form::hidden('image_thumb', @$currentMedia['image_thumb'], ['id' => 'current_image_thumb']) !!}
	</div>
</div>

<div class="form-group">
 	<label for="image" class="control-label col-md-3">Galeria de fotos<br/><small>JPG/PNG 550x345px</small>
 		<br/><br/>
 		<button type="button" id="loader-galery" class="btn btn-primary">Examinar</button>
 	</label>
 	<div class="col-md-9">
		<div id="galeria" class="dropzone">
		</div>
	</div>
</div>
<!--
  	<div class="form-group">
  		 	{!! Form::label('image_featured_background', 'Imagen fondo destacada', ['class' => 'control-label col-md-3']) !!}
  		 	<div class="col-md-3">
  	    		<div id="image_featured_background" class="dropzone"></div>
  	    	</div>
  	</div>

    <div class="form-group">
    {!! Form::label('images', 'Imagenes slider', ['class' => 'control-label col-md-3']) !!}
    <div class="col-md-9">
        <div id="images" class="dropzone"></div>
      </div>
    </div>

    <div class="form-group">
        {!! Form::label('image_thumb', 'Imagen thumb', ['class' => 'control-label col-md-3']) !!}
        <div class="col-md-3">
            <div id="image_thumb" class="dropzone"></div>
          </div>
    </div>

  	<div class="form-group">
  		 	{!! Form::label('document', 'Documento PDF', ['class' => 'control-label col-md-3']) !!}
  		 	<div class="col-md-3">
  	    		<div id="document" class="dropzone"></div>
  	    </div>
  	</div>
	
	<div class="form-actions">
		<div class="row">
			<div class="col-md-offset-3 col-md-9">
				{!! Form::button('Continuar <i class="fa fa-angle-double-right"></i>', ['type' => 'submit', 'class' => 'btn blue', 'id' => 'submitFiles']) !!}
			</div>
		</div>
	</div>	
-->


@push('scripts')
	<script src="{{ asset('admin/assets/pages/productos/dropzone/dropzone.js') }}"></script>
	
    <script src="{{ asset('admin/assets/global/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
	<script>	
		
		var arr_image = [];
		var idfile_featured = {};
		var product_id = {{$producto->id}};

		var current_image_featured = '';
		var image_featured = new Dropzone('#image_featured', {
			'url': 'files',
			'paramName': 'image_featured',
			//'autoProcessQueue': false,
			'addRemoveLinks': true,
			'dictRemoveFile': 'Eliminar imagen',
			'acceptedFiles': 'image/*',
			'maxFiles': 1,
			'headers': {
				'X-CSRF-TOKEN': $("input[name='_token']").val()
			},
			'dictDefaultMessage': 'Haga click aqu?? para subir la imagen',
			'clickable' : '#loader-image_featured',
			'previewTemplate': '<div class="dz-preview dz-file-preview"><img data-dz-thumbnail /><div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div></div>',
			'thumbnailMethod': 'contain',
			'thumbnailWidth': 600,
			'thumbnailHeight': 400,
			init: function() {
				myDropzone = this;

				this.on("success", function (file, responseText) {
					$("#current_image_featured").val(responseText.source);
			        idfile_featured = { 'id': file.upload.uuid, 'image': responseText.source };
			    });
			}
		});

		image_featured.on("complete", function(file) {
			console.log(file);
		});

		image_featured.on("addedfile", function(file, res) {
			if (current_image_featured) {
				this.removeFile(current_image_featured);
			}
			current_image_featured = file;
			$('.dz-progress').hide();
		});

		image_featured.on("removedfile", function(file, res) {

			if(idfile_featured.image)  
				var image = idfile_featured.image;
			else
				var image = $("#current_image_featured").val(); 

			$.ajax({
				url: '/panel/productos/'+product_id+'/deleteFilesImage',
				type: 'POST',
				dataType: 'json',
				data: {
					product_id: product_id,
					image: image,
					_token: $("input[name='_token']").val(),
				}
			})
			.done(function(data) {
				console.log(data);
				$("#current_image_featured").val('');
			})
			.fail(function(xhr, status, error) {
				console.log(xhr.responseText);  
			});
		
		});

		image_featured.on('error', function(file, res) {
			var msg;

			if(res == 'You can not upload any more files.')
				msg = 'No puedes subir mas de una imagen.'

			$(".dz-error-message:last > span").text(msg);
		});

		var fileName = $('#current_image_featured').val();
		if (fileName) {
		    var mockFile = { name: fileName, size: 12345 };
			
			image_featured.emit("addedfile", mockFile);
			image_featured.emit("thumbnail", mockFile, "/storage/" + fileName);

			currentFile = mockFile;
		}

		////////// FEATURED //////////

		var idfile_featured_background = {};
		var current_image_featured_background = '';
		var image_featured_background = new Dropzone('#image_featured_background', {
			'url': 'files',
			'paramName': 'image_featured_background',
			//'autoProcessQueue': false,
			'addRemoveLinks': true,
			'dictRemoveFile': 'Eliminar imagen',
			'acceptedFiles': 'image/*',
			'maxFiles': 1,
			'headers': {
				'X-CSRF-TOKEN': $("input[name='_token']").val()
			},
			'dictDefaultMessage': 'Haga click aqu?? para subir la imagen',
			'clickable' : '#loader-image_featured_background',
			'previewTemplate': '<div class="dz-preview dz-file-preview"><img data-dz-thumbnail /><div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div></div>',
			'thumbnailMethod': 'contain',
			'thumbnailWidth': 600,
			'thumbnailHeight': 400,
			init: function() {
				myDropzone = this;

				this.on("success", function (file, responseText) {
					$("#current_image_featured_background").val(responseText.source);
			        idfile_featured_background = { 'id': file.upload.uuid, 'image': responseText.source };
			    });
			}
		});

		image_featured_background.on("complete", function(file) {
			console.log(file);
		});

		image_featured_background.on("addedfile", function(file, res) {
			if (current_image_featured_background) {
				this.removeFile(current_image_featured_background);
			}
			current_image_featured_background = file;
			$('.dz-progress').hide();
		});

		image_featured_background.on("removedfile", function(file, res) {

			if(idfile_featured_background.image)  
				var image = idfile_featured_background.image;
			else
				var image = $("#current_image_featured_background").val(); 

			$.ajax({
				url: '/panel/productos/'+product_id+'/deleteFilesImage',
				type: 'POST',
				dataType: 'json',
				data: {
					product_id: product_id,
					image: image,
					_token: $("input[name='_token']").val(),
				}
			})
			.done(function(data) {
				console.log(data);
				$("#current_image_featured_background").val('');
			})
			.fail(function(xhr, status, error) {
				console.log(xhr.responseText);  
			});
		
		});

		image_featured_background.on('error', function(file, res) {
			var msg;

			if(res == 'You can not upload any more files.')
				msg = 'No puedes subir mas de una imagen.'

			$(".dz-error-message:last > span").text(msg);
		});

		var fileName = $('#current_image_featured_background').val();
		if (fileName) {
		    var mockFile = { name: fileName, size: 12345 };
			
			image_featured_background.emit("addedfile", mockFile);
			image_featured_background.emit("thumbnail", mockFile, "/storage/" + fileName);

			current_image_featured_background = mockFile;
		}		

		////////// THUMBNAIL //////////

		var idfile_image_thumb = {};
		var current_image_thumb = '';
		var image_thumb = new Dropzone('#image_thumb', {
			'url': 'files',
			'paramName': 'image_thumb',
			//'autoProcessQueue': false,
			'addRemoveLinks': true,
			'dictRemoveFile': 'Eliminar imagen',
			'acceptedFiles': 'image/*',
			'maxFiles': 1,
			'headers': {
				'X-CSRF-TOKEN': $("input[name='_token']").val()
			},
			'dictDefaultMessage': 'Haga click aqu?? para subir la imagen',
			'clickable' : '#loader-image_thumb',
			'previewTemplate': '<div class="dz-preview dz-file-preview"><img data-dz-thumbnail /><div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div></div>',
			'thumbnailMethod': 'contain',
			'thumbnailWidth': 600,
			'thumbnailHeight': 400,
			init: function() {
				myDropzone = this;

				this.on("success", function (file, responseText) {
					$("#current_image_thumb").val(responseText.source);
			        idfile_image_thumb = { 'id': file.upload.uuid, 'image': responseText.source };
			    });
			}
		});

		image_thumb.on("complete", function(file) {
			console.log(file);
		});

		image_thumb.on("addedfile", function(file, res) {
			if (current_image_thumb) {
				this.removeFile(current_image_thumb);
			}
			current_image_thumb = file;
			$('.dz-progress').hide();
		});

		image_thumb.on("removedfile", function(file, res) {

			if(idfile_image_thumb.image)  
				var image = idfile_image_thumb.image;
			else
				var image = $("#current_image_thumb").val(); 

			$.ajax({
				url: '/panel/productos/'+product_id+'/deleteFilesImage',
				type: 'POST',
				dataType: 'json',
				data: {
					product_id: product_id,
					image: image,
					_token: $("input[name='_token']").val(),
				}
			})
			.done(function(data) {
				console.log(data);
				$("#current_image_thumb").val('');
			})
			.fail(function(xhr, status, error) {
				console.log(xhr.responseText);  
			});
		
		});

		image_thumb.on('error', function(file, res) {
			var msg;

			if(res == 'You can not upload any more files.')
				msg = 'No puedes subir mas de una imagen.'

			$(".dz-error-message:last > span").text(msg);
		});

		var fileName = $('#current_image_thumb').val();
		if (fileName) {
		    var mockFile = { name: fileName, size: 12345 };
			
			image_thumb.emit("addedfile", mockFile);
			image_thumb.emit("thumbnail", mockFile, "/storage/" + fileName);

			currentFile = mockFile;
		}

		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': '{{ csrf_token() }}'
			}
		});

		////// GALERIA //////

		var galeria = new Dropzone('#galeria', {
			'url': 'files',
			'paramName': 'image',
			'autoProcessQueue': true,
			'addRemoveLinks': true,
			'dictRemoveFile': 'Eliminar imagen',
			'acceptedFiles': 'image/*',
			'maxFiles': 10,
			'headers': {
				'X-CSRF-TOKEN': $("input[name='_token']").val()
			},
			'dictDefaultMessage': 'Haga click aqu?? para subir la imagen',
			'clickable' : '#loader-galery',
			'thumbnailMethod': 'contain',
			'thumbnailWidth': 120,
			'thumbnailHeight': 120,
			init: function() {

				this.on("success", function(file, response) {
					//console.log(file.xhr.response);
					file.previewElement.id = $.parseJSON(file.xhr.response).id;
					$(".dz-image img").last().attr('id', file.previewElement.id);
				});
			}
		});

		galeria.on("removedfile", function(file, response) {

			// Cuando hago el post a la url files, hago un return de los datos.
			if(file.id) {
				var id = file.id;  
				var image = file.image;
			}
			else{
				var id = JSON.parse(file.xhr.response).id;
				var image = JSON.parse(file.xhr.response).source;
			}
			
			$.ajax({
				url: 'files/'+id,
				type: 'DELETE',
				dataType: 'json',
				data: {
					image: image,
					id: id,
					_token: $("input[name='_token']").val(),
				}
			})
			.done(function(data) {
				console.log(data);
			})
			.fail(function(xhr, status, error) {
				console.log(xhr.responseText);  
			});
		
		});

		galeria.on("addedfile", function(file) {
			$('.dz-filename').hide();
			$('.dz-progress').hide();
			//console.log(file);
		});

		var medias = $.parseJSON('{!! !empty($producto) ? $producto->productsGallery : "[]" !!}');

		$(document).ready(function(){
			
			$.each(medias, function(i){
				var mockFile = {
					id: this.id,
					product_id : product_id,
					type: this.type, 
					status: Dropzone.ADDED, 
					image: this.source,
					url: storageUrl + "/" +this.source,
				};

				// Call the default addedfile event handler
				galeria.emit("addedfile", mockFile);

				// And optionally show the thumbnail of the file:
				galeria.emit("thumbnail", mockFile, storageUrl + "/" +this.source);
				
				galeria.files.push(mockFile);

				var tmp = galeria.files[galeria.files.length - 1];
				tmp.previewElement.id = this.id;  

			});

			$( "#sortable" ).disableSelection();

			$( "#galeria" ).sortable({
				items: '.dz-image-preview',
				update: function( e, index) {
					var mi_id = $(e.target).find('.id').val();
					var list = [];
					
					$.each($(this).find(".dz-image-preview"), function(i, el){
						var pos = i;
						var id = $(this).attr('id');
						console.log(id, pos);
						list.push({ id:id, position:pos });
						//var el_id = $(this.).find('.position').val(pos);
					})
					$.ajax({
					    url: '/panel/productos/' + product_id + '/files/ordenar',
					    type: 'post',
					    data: { media:list },
					    success: function(result) {
					        console.log(result);
					    },
					    error: function(error){
					        console.log(error);
					    }
					});
				}
			});
		});

		/*
		var image = new Dropzone('#images', {
			'url': '../files',
			'paramName': 'image',
			'autoProcessQueue': false,
			//'params': {
		    //    product_id: product_id  // Una forma de enviar parametros al post que realiza dropzone automaticamente al subir imagen.
		    //},
			'addRemoveLinks': true,
			'dictRemoveFile': 'Eliminar imagen',
			'acceptedFiles': 'image/*',
			'headers': {
				'X-CSRF-TOKEN': '{{ csrf_token() }}'
			},
			'dictDefaultMessage': 'Arrastra o haga click aqu?? para subir las imagenes',
		});

		image.on("sending",function(file,xhr,data){
		   	data.append("product_id", product_id);  // Otra forma de envio de parametros cuando dropzone hace el post al subir una imagen.
		});

		image.on("addedfile", function() {
			$('.dz-progress').hide();
		});

		var image_featured_background = new Dropzone('#image_featured_background', {
			'url': '../files',
			'paramName': 'image_featured_background',
			'autoProcessQueue': false,
			'addRemoveLinks': true,
			'dictRemoveFile': 'Eliminar imagen',
			'acceptedFiles': 'image/*',
			'maxFiles': 1,
			'headers': {
				'X-CSRF-TOKEN': '{{ csrf_token() }}'
			},
			'dictDefaultMessage': 'Arrastra o haga click aqu?? para subir la imagen destacada de fondo'
		});

		image_featured_background.on("sending",function(file,xhr,data){
		   	data.append("product_id", product_id);  // Otra forma de envio de parametros cuando dropzone hace el post al subir una imagen.
		});

		image_featured_background.on("addedfile", function() {
			$('.dz-progress').hide();
		});

		var image_thumb = new Dropzone('#image_thumb', {
			'url': '../files',
			'paramName': 'image_thumb',
			'autoProcessQueue': false,
			'addRemoveLinks': true,
			'dictRemoveFile': 'Eliminar imagen',
			'acceptedFiles': 'image/*',
			'maxFiles': 1,
			'headers': {
				'X-CSRF-TOKEN': '{{ csrf_token() }}'
			},
			'dictDefaultMessage': 'Arrastra o haga click aqu?? para subir la imagen thumb'
		});

		image_thumb.on("sending",function(file,xhr,data){
		   	data.append("product_id", product_id);  // Otra forma de envio de parametros cuando dropzone hace el post al subir una imagen.
		});

		image_thumb.on("addedfile", function() {
			$('.dz-progress').hide();
		});

		var documento = new Dropzone('#document', {
			'url': '../files',
			'paramName': 'document',
			'autoProcessQueue': false,
			'addRemoveLinks': true,
			'dictRemoveFile': 'Eliminar documento',
			'acceptedFiles': 'application/pdf',
			'maxFiles': 1,
			'headers': {
				'X-CSRF-TOKEN': '{{ csrf_token() }}'
			},
			'dictDefaultMessage': 'Arrastra o haga click aqu?? para subir el documento'
		});

		documento.on("sending",function(file,xhr,data){
		   	data.append("product_id", product_id);  // Otra forma de envio de parametros cuando dropzone hace el post al subir una imagen.
		});

		documento.on("addedfile", function() {
			$('.dz-progress').hide();
		});

	
		image_featured_background.on('error', function(file, res) {
			var msg;

			if(res == 'You can not upload any more files.')
				msg = 'No puedes subir mas de una imagen.'

			$(".dz-error-message > span").text(msg);
		});

		image_featured.on('error', function(file, res) {
			var msg;

			if(res == 'You can not upload any more files.')
				msg = 'No puedes subir mas de una imagen.'

			$(".dz-error-message > span").text(msg);
		});

		image_thumb.on('error', function(file, res) {
			var msg;

			if(res == 'You can not upload any more files.')
				msg = 'No puedes subir mas de una imagen.'

			$(".dz-error-message > span").text(msg);
		});

		documento.on('error', function(file, res) {
			var msg;

			if(res == 'You can not upload any more files.')
				msg = 'No puedes subir mas de un archivo.'

			$(".dz-error-message > span").text(msg);
		});
		*/

		Dropzone.autoDiscover = false;
		
		$("#submitFiles").on('click', function(){
			image.processQueue();
			image_featured.processQueue();
			image_featured_background.processQueue();
			image_thumb.processQueue();
			documento.processQueue();
		});

	</script>
@endpush
@extends('admin.layouts.app')

@push('styles')
	<link rel="stylesheet" href="{{ asset('admin/assets/pages/productos/dropzone/dropzone.min.css') }}">
@endpush

@section('content')

	<div class="tab-pane">
		<div class="portlet box blue">

			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-plus"></i> Agregar Sección Producto
				</div>
			</div>

			<div class="portlet-body form">

				<!-- BEGIN FORM-->
					{!! Form::open(["route" => ["admin.productos.section.store", $product], "class" => "form-horizontal", "id" => "formAdd", "enctype" => "multipart/form-data"]) !!}

						<div class="form-body">
						
							@include('admin.pages.sectionproducts.partials.form')

						</div>

					{!! Form::close() !!}
				<!-- END FORM-->
				
			</div>
		</div>
	</div>

@endsection

@push('scripts')
	<script src="{{ asset('admin/assets/pages/productos/dropzone/dropzone.js') }}"></script>

	<script>	
		/* Está hecho a las corridas. Cuando se tenga tiempo, arreglar esta mierda!!!!. */

		var product_id = {{$product}};
		var idfile1 = {};
		var idfile2 = {};
		var idfile3 = {};
		var idfile4 = {};

		var image1 = new Dropzone('#image1', {
			'url': '../sectionUpload',
			'paramName': 'image1',
			//'autoProcessQueue': false,
			/*'params': {
		        product_id: product_id  // Una forma de enviar parametros al post que realiza dropzone automaticamente al subir imagen.
		    },*/
			'addRemoveLinks': true,
			'maxFiles': 1,
			'dictRemoveFile': 'Eliminar imagen',
			'acceptedFiles': 'image/*',
			'headers': {
				'X-CSRF-TOKEN': '{{ csrf_token() }}'
			},
			'dictDefaultMessage': 'Arrastra o haga click aquí para subir la imagen',
			init: function() {
				myDropzone = this;

				// Esto hace un post al metodo 'sectionUplaod' y responseText es lo que devuelve el metodo, en este caso el nombre de la imagen encriptada por laravel y guardada en el storage.
				this.on("success", function (file, responseText) {
			        $("input[name='image[1]']").val(responseText);
			        idfile1 = {'id' : file.upload.uuid, 'image' : responseText};
			    });	
			}
		});

		image1.on("removedfile", function(file, res) {
			var idRemove = file.upload.uuid;

			if(idfile1.id == idRemove)
			{
				$.ajax({
					url: '../deleteProductSectionImage',
					type: 'POST',
					dataType: 'json',
					data: {
						image: idfile1.image,
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
			}	
		});

		image1.on("sending",function(file,xhr,data){
		   	data.append("product_id", product_id);  // Otra forma de envio de parametros cuando dropzone hace el post al subir una imagen.
		});

		image1.on("addedfile", function() {
			$('.dz-progress').hide();
		});

		image1.on('error', function(file, res) {
			var msg;

			if(res == 'You can not upload any more files.')
				msg = 'No puedes subir mas de un archivo.'

			$(".dz-error-message > span").text(msg);
		});

		var image2 = new Dropzone('#image2', {
			'url': '../sectionUpload',
			'paramName': 'image2',
			//'autoProcessQueue': false,
			/*'params': {
		        product_id: product_id  // Una forma de enviar parametros al post que realiza dropzone automaticamente al subir imagen.
		    },*/
			'addRemoveLinks': true,
			'maxFiles': 1,
			'dictRemoveFile': 'Eliminar imagen',
			'acceptedFiles': 'image/*',
			'headers': {
				'X-CSRF-TOKEN': '{{ csrf_token() }}'
			},
			'dictDefaultMessage': 'Arrastra o haga click aquí para subir la imagen',
			init: function() {
				myDropzone = this;

				this.on("success", function (file, responseText) {
			        $("input[name='image[2]']").val(responseText);
			        idfile2 = {'id' : file.upload.uuid, 'image' : responseText};
			    });	
			}
		});

		image2.on("removedfile", function(file, res) {
			var idRemove = file.upload.uuid;

			if(idfile2.id == idRemove)
			{
				$.ajax({
					url: '../deleteProductSectionImage',
					type: 'POST',
					dataType: 'json',
					data: {
						image: idfile2.image,
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
			}	
		});

		image2.on("sending",function(file,xhr,data){
		   	data.append("product_id", product_id);  // Otra forma de envio de parametros cuando dropzone hace el post al subir una imagen.
		});

		image2.on("addedfile", function() {
			$('.dz-progress').hide();
		});

		image2.on('error', function(file, res) {
			var msg;

			if(res == 'You can not upload any more files.')
				msg = 'No puedes subir mas de un archivo.'

			$(".dz-error-message > span").text(msg);
		});

		var image3 = new Dropzone('#image3', {
			'url': '../sectionUpload',
			'paramName': 'image3',
			//'autoProcessQueue': false,
			/*'params': {
		        product_id: product_id  // Una forma de enviar parametros al post que realiza dropzone automaticamente al subir imagen.
		    },*/
			'addRemoveLinks': true,
			'maxFiles': 1,
			'dictRemoveFile': 'Eliminar imagen',
			'acceptedFiles': 'image/*',
			'headers': {
				'X-CSRF-TOKEN': '{{ csrf_token() }}'
			},
			'dictDefaultMessage': 'Arrastra o haga click aquí para subir la imagen',
			init: function() {
				myDropzone = this;

				this.on("success", function (file, responseText) {
			        $("input[name='image[3]']").val(responseText);
			        idfile3 = {'id' : file.upload.uuid, 'image' : responseText};
			    });	
			}
		});

		image3.on("removedfile", function(file, res) {
			var idRemove = file.upload.uuid;

			if(idfile3.id == idRemove)
			{
				$.ajax({
					url: '../deleteProductSectionImage',
					type: 'POST',
					dataType: 'json',
					data: {
						image: idfile3.image,
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
			}	
		});

		image3.on("sending",function(file,xhr,data){
		   	data.append("product_id", product_id);  // Otra forma de envio de parametros cuando dropzone hace el post al subir una imagen.
		});

		image3.on("addedfile", function() {
			$('.dz-progress').hide();
		});

		image3.on('error', function(file, res) {
			var msg;

			if(res == 'You can not upload any more files.')
				msg = 'No puedes subir mas de un archivo.'

			$(".dz-error-message > span").text(msg);
		});

		var image4 = new Dropzone('#image4', {
			'url': '../sectionUpload',
			'paramName': 'image4',
			//'autoProcessQueue': false,
			/*'params': {
		        product_id: product_id  // Una forma de enviar parametros al post que realiza dropzone automaticamente al subir imagen.
		    },*/
			'addRemoveLinks': true,
			'maxFiles': 1,
			'dictRemoveFile': 'Eliminar imagen',
			'acceptedFiles': 'image/*',
			'headers': {
				'X-CSRF-TOKEN': '{{ csrf_token() }}'
			},
			'dictDefaultMessage': 'Arrastra o haga click aquí para subir la imagen',
			init: function() {
				myDropzone = this;

				this.on("success", function (file, responseText) {
			        $("input[name='image[4]']").val(responseText);
			        idfile4 = {'id' : file.upload.uuid, 'image' : responseText};
			    });	
			}
		});

		image4.on("removedfile", function(file, res) {
			var idRemove = file.upload.uuid;

			if(idfile4.id == idRemove)
			{
				$.ajax({
					url: '../deleteProductSectionImage',
					type: 'POST',
					dataType: 'json',
					data: {
						image: idfile4.image,
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
			}	
		});

		image4.on("sending",function(file,xhr,data){
		   	data.append("product_id", product_id);  // Otra forma de envio de parametros cuando dropzone hace el post al subir una imagen.
		});

		image4.on("addedfile", function() {
			$('.dz-progress').hide();
		});

		image4.on('error', function(file, res) {
			var msg;

			if(res == 'You can not upload any more files.')
				msg = 'No puedes subir mas de un archivo.'

			$(".dz-error-message > span").text(msg);
		});

		Dropzone.autoDiscover = false;

		/*$("#submitFile").on('click', function(){
			image1.processQueue();
			image2.processQueue();
			image3.processQueue();
			image4.processQueue();
		});*/

	</script>
@endpush